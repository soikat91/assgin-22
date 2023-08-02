<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PromotionalMailController;
use App\Http\Middleware\TokenVerificationMiddleware;


Route::post('/user-registration',[UserController::class,'userRegistration']);
Route::post('/UserLogin',[UserController::class,'userLogin']);
Route::post('/sendOtpToEmail',[UserController::class,'sendOtpToEmail']);
Route::post('/otpVerify',[UserController::class,'otpVerify']);
Route::post('/setPassword',[UserController::class,'setPassword'])->middleware([TokenVerificationMiddleware::class]);

// profile route details
Route::get('/user-profile-details',[UserController::class,'getUser'])->middleware([TokenVerificationMiddleware::class]);
//profile update
Route::post('/profile-update',[UserController::class,'profileUpdate'])->middleware([TokenVerificationMiddleware::class]);

// pages
Route::get('/registration',[UserController::class,'registration']);
Route::get('/login',[UserController::class,'login']);
Route::get('/sendOtp',[UserController::class,'sendOtp']);
Route::get('/verifyOtp',[UserController::class,'verifyOtp']);
Route::get('/resetPassword',[UserController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
// after authtication 
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/profile',[UserController::class,'profile'])->middleware([TokenVerificationMiddleware::class]);



// logout route
Route::get('/logout',[UserController::class,'userLogOut']);


// page
Route::get('/customer',[CustomerController::class,'customer'])->middleware([TokenVerificationMiddleware::class]);

// customer route api
Route::get('/getCustomer',[CustomerController::class,'getCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-customer',[CustomerController::class,'createCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-customer',[CustomerController::class,'updateCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-customer',[CustomerController::class,'deleteCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/get-customer-id',[CustomerController::class,'getCustomerId'])->middleware([TokenVerificationMiddleware::class]);

// promotional mail route
Route::post('/promotional-customer-mail',[PromotionalMailController::class,'promotionalMail'])->middleware([TokenVerificationMiddleware::class]);
// page
Route::get('/promotion',[PromotionalMailController::class,'promotion'])->middleware([TokenVerificationMiddleware::class]);

