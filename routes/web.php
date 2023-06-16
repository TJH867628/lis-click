<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ConferencesController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\FullpaperController;
use App\Http\Controllers\submissionStatusController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[MainPageController::class,'index']);
Route::post('/',[MainPageController::class,'button']);
Route::get('/registration',[RegistrationController::class,'index']);
Route::post('/registration',[RegistrationController::class,'store']);
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'check']);
Route::get('/homePage',[HomePageController::class,'index']);
Route::post('/homePage',[HomePageController::class,'logout']);
Route::get('/mainPage',[MainPageController::class,'index']);
Route::get('/index',[Controller::class,'index']);
Route::get('/registerAdmin',[RegisterAdminController::class,'index']);
Route::post('/registerAdmin',[RegisterAdminController::class,'store']);
Route::get('/adminHomePage',[AdminController::class,'index']);
Route::get('/superAdminHomePage',[SuperAdminController::class,'index']);
Route::get('/adminList',[SuperAdminController::class,'adminList'])->name('adminList');
Route::get('/logout',[LogoutController::class,'logout']);
Route::get('/conferencesInfo',[ConferencesController::class,'conferencesInfo']);
Route::get('/conferencesDownload',[ConferencesController::class,'conferencesDownload']);
Route::get('/faq',[FaqController::class,'index']);
Route::get('/faqVisitor',[FaqController::class,'visitor']);
Route::get('/publicationInfo',[PublicationController::class,'index']);
Route::get('/fullpaper',[FullpaperController::class,'index']);
Route::post('/fullpaper',[FullpaperController::class,'storeFullpaper']);
Route::get('/account',[AccountController::class,'index']);
Route::post('/updateProfile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
Route::post('/updatePassword',[AccountController::class,'updatePassword'])->name('account.updatePassword');
Route::get('/participantsList',[SuperAdminController::class,'participantsList']);
Route::get('/forgotPassword',[ForgotPasswordController::class,'index']);
Route::post('/forgotPassword',[ForgotPasswordController::class,'sendOTP']);
Route::get('/confirmOTP', [ForgotPasswordController::class,'indexConfirmOTP'])->name("confirmOTP");
Route::post('/confirmOTP', [ForgotPasswordController::class,'confirmOTP']);
Route::get('/changePassword', [ForgotPasswordController::class,'indexChangePassword']);
Route::post('/changePassword', [ForgotPasswordController::class,'changePassword']);
Route::get('/submissionStatus', [submissionStatusController::class,'index']);
Route::get('downloadSubmission/{filename}',  [submissionStatusController::class,'download'])->name('downloadSubmission');
Route::get('downloadJurnal/{filename}',  [PublicationController::class,'download'])->name('downloadJurnal');


