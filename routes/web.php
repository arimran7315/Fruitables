<?php

use App\Http\Controllers\addComment;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\trackOrderController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

// user side
Route::get('/',[UserController::class,'clientSide'])->name('home');
Route::get('/logout',[UserController::class , 'logout'])->name('logout');

Route::get('/login', function(){
    return view('login');
})->name('loginPage');
Route::get('register', function(){
    return view('register');
})->name('register');

Route::post('/loginFunction' , [UserController::class , 'login'])->name('loginFunction');
Route::post('/registerFunction' , [UserController::class , 'register'])->name('registerFunction');
Route::post('/addComment', [addComment::class,'addComment'])->name('addComment');
Route::post('/ticketCreate', [TicketController::class,'createTicket'])->name('ticketCreate');
Route::post('/ticketStatus',[TicketController::class,'ticketStatus'])->name('ticketStatus');
Route::post('/trackOrder', [trackOrderController::class,'trackOrder'])->name('trackOrder');
Route::post('/product/shop', [searchController::class,'search'])->name('search');
Route::get('/support', function(){
    return view('support');
})->name('supportPage');

Route::get('/trackOrder' , function (){
    return view('trackOrder');
})->name('trackOrderPage');

Route::get('/editProfile', function(){
    return view('editProfile');
})->name('editProfile');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

// Admin Routes

Route::post('/OrderStatus', [trackOrderController::class, 'trackorder'])->name('trackOrder');
Route::get('/admin/index', [UserController::class, 'index'])->name('admin.index')->middleware(ValidUser::class);

Route::get('/admin/login' , function(){
    return view('admin.login');
})->name('admin.login');

Route::get('/admin/register' , function(){
    return view('admin.signup');
})->name('admin.register');

Route::resource('/retailer', RetailerController::class);
Route::resource('/cart', CartController::class);
Route::resource('/product', ProductController::class);

Route::get('/admin/profile', function(){
return view('admin.profile');
})->name('admin.profile');

Route::put('/admin/updateInquiry/{id}',[TicketController::class, 'updateTickets'])->name('admin.updateInquiry');

Route::get('/admin/confirmedInquiry',[TicketController::class, 'NewTickets'])->name('admin.confirmedInquiry');
Route::get('/admin/manageInquiry',[TicketController::class, 'manageTickets'])->name('admin.manageInquiry');


Route::get('/admin/completeTickets' , function(){
    return view('admin.completeTicket');
})->name('admin.completeTicket');

Route::get('/admin/completeTickets' ,[TicketController::class,'index'])->name('admin.completeTickets');

Route::post('/updateInformation', [UserController::class,'updateInformation'])->name('updateInformation');
Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::post('/updateImage', [UserController::class, 'updateImage'])->name('updateImage');