<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/register',[RegisterController::class,'store']);



// route for post Blog
Route::get('/postBlog',function(){
    return view('postBlog');
});
Route::post('/postBlog',[BlogController::class,'store']);


?>
