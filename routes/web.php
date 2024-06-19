<?php

use App\Http\Controllers\applyEventController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\UserController;
use App\Models\Event;

// Route to index
Route::get('/', function () {
    return view('index');
})->name('home');

//Route for autherntication
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'registerPost'])->name('register');
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/logout',[UserController::class, 'logout']);

// Route for user Homepage
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_homepage', [pageController::class, 'adminPage'])->name('admin_homepage');
});

Route::get('/manager_homepage', [pageController::class, 'managerPage']);
Route::get('/vendor_homepage', [pageController::class, 'vendorPage']);

// Route for Admin
Route::get('/viewUsers', [pageController::class, 'viewUsers'])->name('viewUsers');
Route::get('/adduser', [pageController::class, 'adduser'])->name('adduser');
Route::get('/edituser/{user}', [pageController::class, 'edituser']);
Route::post('deleteUser/{user}', [UserController::class, 'deleteuser'])->name('delete.user');

Route::get('/viewEvents', [pageController::class, 'viewEvents'])->name('viewEvents');
Route::get('/admin/addevent',[pageController::class,'addevent'])->name('admin.addevent');
Route::get('admin/editEvent/{event}',[pageController::class,'admin_editEvent'])->name('admin.editevent');

//Route for profile
Route::get('/profile', [pageController::class, 'profilePage']);
Route::get('/editProfile/{user}', [pageController::class, 'editProfilePage']);
Route::post('/editProfile/{user}', [profileController::class, 'editProfile'])->name('editProfile');

//Route for Events
Route::get('/addEvent', [pageController::class, 'addEventPage']);
Route::post('/addEvent', [EventController::class, 'addEvent'])->name('addEvent');
Route::get('/pageEvent/{event}',[pageController::class,'pageEvent'])->name('PageEvent');
Route::get('/viewEvent/{event}', [pageController::class, 'viewEvent']);


//Route Edit Event
Route::get('/editEvent/{event}',[pageController::class,'editEventPage']);
Route::post('/editEvent/{event}',[EventController::class,'editEvent'])->name('editEvent');
Route::delete('/deleteEvent/{event}', [EventController::class, 'deleteEvent'])->name('deleteEvent');

//Route for ApplyEvent
Route::get('/applyEvent/{event}',[pageController::class,'applyEventPage']);
Route::post('/applyEvent/{event}/{user}',[applyEventController::class,'addApplyEvent']);

// Route for list applications (Manager/Vendor)
Route::get('/list-applications/{event}',[pageController::class, 'listApplicationPage']);
Route::post('/approve/{application}',[applyEventController::class,'approve']);
Route::post('/reject/{application}',[applyEventController::class,'reject']);
Route::get('/viewReceipt/{event}/{application}',[pageController::class,'viewReceiptPage']);

Route::get('/vendorApplications/{user}', [pageController::class, 'vendorApplicationPage']);
Route::get('/editApplication/{application}',[pageController::class,'EditAppPage']);
Route::post('/editApplication/{application}',[applyEventController::class,'editApplyEvent']);
