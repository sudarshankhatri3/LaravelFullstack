<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfController extends Controller
{
    //

    public function downloadInvoice(){
       $data = [
        'id' => '1234',
        'date' => now()->format('m/d/Y')
        ];

        $pdf = Pdf::loadView('/admin/report', $data);
        return $pdf->download('invoice.pdf');
    }
}
