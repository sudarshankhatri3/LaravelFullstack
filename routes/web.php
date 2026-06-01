<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ForgetPasswordLinkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\AdminControllers;

Route::get('/', function () {
    return view('common/landingPage');
});


// route for login and signup
Route::prefix('common')->group(function(){
    // route for get and post of login
    Route::get('/login',function(){
        return view('common.login');
    })->name('common.login');
    
    Route::post('/login',[LoginController::class,'login'])->name('common.loginPost');

    // route for get and post of signup
    Route::get('/signup',function(){
        return view('common.signup');
    })->name('common.signup');

    Route::post('/signup',[RegisterController::class,'register'])->name('common.signupPost');

});


//send link for Forget password
Route::get('/common/sendLink',[ForgetPasswordLinkController::class,'create']);
Route::post('/common/sendLink',[ForgetPasswordLinkController::class,'store']);


//  Routes for admin------------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    // // Add active user to admin panel
    Route::get('/admin/dashboard',[DashboardController::class,'create']);

    //View category
    Route::get('/admin/viewCategory',[CategoryController::class,'index']);

    // Add category by admin
    Route::get('/admin/category',[CategoryController::class,'create']);
    Route::post('/admin/category',[CategoryController::class,'store']);

    
    
    // manage the product 
    Route::get('/admin/manageProduct',[DashboardController::class,'handleProduct']);

    // manage the inquiry
    Route::get('/admin/dashboard',[InquiryController::class,'index']);
    Route::patch('/admin/dashboard/{id}',[InquiryController::class,'processing']);
    Route::patch('/admin/dashboard/{id}',[InquiryController::class,'resolved']);
    // Route::get('/admin/dashboard',[AdminControllers::class,'index']);

   
    

    // Route::post('/vendor/category',[CategoryController::class,'store']);
});

// Routes for  vendor 
Route::middleware(['auth','vendor'])->group(function () {
    // vendor ,admin can authenticate the dashboard
    Route::get('/vendor/dashboard',function(){
        return view('vendor.dashboard');
    });
    //get to add the product 
    Route::get('/vendor/addProduct',[ProductController::class,'vendorCreate']);
    Route::post('/vendor/addProduct',[ProductController::class,'store']);

    //Add the vendor product
    Route::get('/vendor/manageProduct',[ProductController::class,'index']);
    Route::delete('/vendor/manageProduct/{id}', [ProductController::class ,'destroy']);

    // update the product 
    Route::get('/vendor/manageProduct/edit/{id}',[ProductController::class,'edit']);
    Route::put('/vendor/addProduct/{id}',[ProductController::class,'update']);

    // Routes for profile
    Route::get('/profile/viewProfile',[ProfileController::class,'index']);
    Route::get('/profile/customizeProfile',function(){
        return view('/profile/makeProfile');
    });
    Route::post('/profile/customizeProfile',[ProfileController::class,'store']);
});



// Routes for  customer 
Route::middleware(['auth','customer'])->group(function(){
    // Route to get the product
    Route::get('/customer/product',[ProductController::class,'customerCreate']);
    Route::get('/customer/singleProduct/{id}',[ProductController::class,'show']);

    // order the product
    Route::get('/customer/orderList',[OrdersController::class,'index']);
    Route::post('/customer/orderList',[OrdersController::class,'store']);


    // inquiry of customer 
    Route::get('/customer/inquiry',[InquiryController::class,'create']);
    Route::post('/customer/inquiry',[InquiryController::class,'store']);



    // Add to cart route
    Route::get('customer/cartList',[CartController::class,'create']);
    // Route::post('customer/addCartList',[CartController::class,'store']);


    // Route for payment gateway
    Route::post('/esewa/pay/{orderId}',  [EsewaController::class, 'initiatePayment'])->name('esewa.pay');
    Route::get('/esewa/success',         [EsewaController::class, 'paymentSuccess'])->name('esewa.success');
    Route::get('/esewa/failure',         [EsewaController::class, 'paymentFailure'])->name('esewa.failure');


    


});

// Route for logout
Route::post('/vendor/logOut',[LogOutController::class,'destory']);
Route::post('/admin/logout',[LoginController::class,'destory']);