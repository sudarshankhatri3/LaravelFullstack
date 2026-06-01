<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;     
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class EsewaController extends Controller{

    //step 1:Initiate payemnt -redirect user to esewa 
    public function initiatePayment(Request $request,$orderId){

        $order=Order::findOrFail($orderId);

        $payment=Payment::create([
            'user_id'=>Auth::id(),
            'order_id'=>$order->id,
            'amount'=>$order->total_amount,
            'payment_method'=>'esewa',
            'status'=>'pending',
            'transaction_id'=>'TXN-'.uniqid()
        ]);

        $data=[
            'amt'=>$order->total_amount,
            'psc'=>0,
            'pdc'=>0,
            'txAmt'=>0,
            'tAmt'=>$order->total_amount,
            'pid'=>$payment->transaction_id,
            'scd'=>config('services.esewa.merchant_id'),
            'su'=>config('services.esewa.success_url'),
            'fu'=>config('services.esewa.failure_url')
        ];

        // redirect to esewa payment page with form post
        return view('esewa.redirect',[
            'data'=>$data,
            'payment_url'=>config('services.esewa.payment_url')
        ]);

    }

    // step 2:Handle sucess callback from esewa
    public function paymentSucess(Request $request){

        $refId=$request->query('refId');  //esewa reference ID
        $oid=$request->query('oid');   // transaction_id
        $amt=$request->query('amt');

        // find the payment record 
        $payment=Payment::where('transaction_id',$oid)->firstOrFail();

        // step 3:Verify payment with esewa
        $verified=$this->verifyPayment($refId,$oid,$amt);

        if($verified){
            // Update payment record
            $payment->update([
                'status'=>'completed',
                'transaction_id'=>$refId,
                'paid_at'=>now()
            ]);

            // update order status
            $payment->order->update(['status'=>'processing']);
            return redirect()->route('order.sucess',$payment->order_id)->with('sucess','Payment sucessful!');
        }else{
            // verification failed
            $payment->update(['status'=>'failed']);
            return redirect()->route('order.failure',$payment->order_id)->with('error','Payment verification failed');
        }
    }


    // step 4:Handle failure callback from esewa

    public function paymentFailure(Request $request){
        $oid=$request->query('pid');

        $payment=Payment::where('transaction_id',$oid)->first();

        if($payment){
            $payment->update(['status'=>'failed']);
            $payment->order->update(['status'=>'cancelled']);

        }

        return redirect()->route('order.failure')->with('Error','Payment failed . Please try again');
    }


    // step 5:verify payment with esewa server
    private function verifyPayment($refId,$oid,$amt){
        try{
            $response=Http::asForm()->post(config('services.esewa.verify_url'),[
                'amt'=>$amt,
                'rid'=>$refId,
                'pid'=>$oid,
                'scd'=>config('services.esewa.merchant_id')

            ]);
            // esewa returns xml response
            $xml=simplexml_load_string($response->body());
            return isset($xml->response_code) && strtolower((string)$xml->response_code)==='success';
        }catch(Exception $e){
            Log::error('esewa verification error:'.$e->getMessage());
            return false;
        }
    }

}

