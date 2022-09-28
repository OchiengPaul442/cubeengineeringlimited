<?php
use App\Http\Livewire\LoadMore;
use App\Http\Controllers\Auth;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\Uploads;
use Illuminate\Support\Facades\Route;

/*******************/
/*  Main Routes    */
/*******************/

// welcome screen
Route::get('/',[mainController::class,'welcome'])->name('welcome');
// home screen
Route::get('/home',[mainController::class,'index'])->name('home');
// terms screen
Route::get('/terms',[mainController::class,'terms'])->name('terms');
// privacy screen
Route::get('/privacy',[mainController::class,'privacy'])->name('privacy');

/*******************/
/*  Auth  Routes   */
/*******************/

// login screen
Route::get('/admin',[Auth::class,'index'])->name('Admin');
// login user
Route::post('/login',[Auth::class,'login'])->name('Admin.login');
// dashboard screen
Route::get('/dashboard',[Auth::class,'dashboard'])->name('Admin.dashboard');
// logout user
Route::get('/logout',[Auth::class,'logout'])->name('Admin.logout');
// profile
Route::resource('Auth', Auth::class);
// change password
Route::get('/change-password',[Auth::class,'changePassword'])->name('change-password');


/*******************/
/* Resource Routes */
/*******************/

// services
Route::resource('services', ServiceController::class);
// portfolio
Route::resource('portfolio', PortfolioController::class);
// faqs
Route::resource('FAQs', FAQsController::class);
// testimonials
Route::resource('testimonials', TestimonialController::class);
// messages
Route::resource('messages', MessagesController::class);
// timeline
Route::resource('timeline', TimelineController::class);


/*******************/
/* upload Route  */ 
/*******************/

// upload 
Route::post('/upload',[Uploads::class,'store'])->name('upload');

/*******************/
/* Other Routes    */ 
/*******************/

// load more
// Route::get('/load-more', LoadMore::class)->name('load-more');