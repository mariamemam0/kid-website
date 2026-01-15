<?php

use App\Http\Controllers\Admin\KidController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/register',[AuthController::class,'showRegister'])->name('register.form');

Route::post('/register',[AuthController::class,'register'])->name('register');


Route::get('/login',[AuthController::class,'showLogin'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');


Route::get('/email/verify',function(){
     return view('auth.verify_email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}',function( EmailVerificationRequest $request){
$request->fulfill();
return redirect('/');
})->middleware('auth','signed')->name('verification.verify');

Route::post('/email/verification-notification',function(Request $request){
$request->user()->sendEmailVerificationNotification();
return back()->with('message','Verification email sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//


Route::get('/create',[KidController::class,'create']);
Route::post('/store',[KidController::class,'store']);
Route::get('kids',[KidController::class,'index']);
Route::get('kid/{kid}',[KidController::class,'show']);
