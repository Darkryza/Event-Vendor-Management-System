<?php

use App\Http\Controllers\applyEventController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\UserController;

// Route to index
Route::get('/', function () {
    return view('index');
})->name('home');

//Route for autherntication
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'registerPost']);
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/logout',[UserController::class, 'logout']);

// Route for user Homepage
Route::get('/admin_homepage', [pageController::class, 'adminPage']);
Route::get('/manager_homepage', [pageController::class, 'managerPage']);
Route::get('/vendor_homepage', [pageController::class, 'vendorPage']);

// Route for Admin
Route::get('/edituser/{user}', [pageController::class, 'edituser']);
Route::get('/adduser', [pageController::class, 'adduser']);

//Route for profile
Route::get('/profile', [pageController::class, 'profilePage']);
Route::get('/editProfile/{user}', [pageController::class, 'editProfilePage']);
Route::post('/editProfile/{user}', [profileController::class, 'editProfile']);

//Route for Events
Route::get('/addEvent', [pageController::class, 'addEventPage']);
Route::post('/addEvent', [EventController::class, 'addEvent']);
Route::get('/pageEvent/{event}',[pageController::class,'pageEvent']);
Route::get('/viewEvent/{event}', [pageController::class, 'viewEvent']);


//Route Edit Event
Route::get('/editEvent/{event}',[pageController::class,'editEventPage']);
Route::post('/editEvent/{event}',[EventController::class,'editEvent']);
Route::delete('/deleteEvent/{event}', [EventController::class, 'deleteEvent']);

//Route for ApplyEvent
Route::get('/applyEvent/{event}',[pageController::class,'applyEventPage']);
Route::post('/applyEvent/{event}/{user}',[applyEventController::class,'addApplyEvent']);

// Route for list applications
Route::get('/list-applications',[pageController::class, 'listApplicationPage']);