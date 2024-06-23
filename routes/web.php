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

Route::get('/manager_homepage', [pageController::class, 'managerPage'])->name('manager_homepage');
Route::get('/vendor_homepage', [pageController::class, 'vendorPage'])->name('vendor_homepage');

// Route for Admin
Route::get('/viewUsers', [pageController::class, 'viewUsers'])->name('viewUsers');
Route::get('/adduser', [pageController::class, 'adduser'])->name('adduser');
Route::get('/edituser/{user}', [pageController::class, 'edituser']);
Route::post('deleteUser/{user}', [UserController::class, 'deleteuser'])->name('delete.user');

Route::get('/viewEvents', [pageController::class, 'viewEvents'])->name('viewEvents');
Route::get('/admin/addevent',[pageController::class,'addevent'])->name('admin.addevent');
Route::post('/admin/addEvent', [EventController::class, 'Admin_AddEvent'])->name('Admin_AddEvent');
Route::get('/admin/editEvent/{event}',[pageController::class,'admin_editEvent'])->name('admin.editevent');

Route::get('/reviewEvent/{event}',[pageController::class, 'reviewEvent'])->name('reviewEvent');
Route::post('/approve/{event}', [EventController::class, 'approve'])->name('approve');
Route::post('/reject/{event}', [EventController::class, 'reject'])->name('reject');

Route::get('/viewApplications', [pageController::class, 'admin_viewApplications'])->name('Admin.viewApplications');

// Route for manager
Route::get('/manager-listEvents',[pageController::class, 'manager_listEvent'])->name('manager-listEvents');
Route::get('/manager-listApplications',[pageController::class, 'manager_listApplications'])->name('manager-listApplications');


//Route for profile
Route::get('/profile', [pageController::class, 'profilePage']);
Route::get('/editProfile/{user}', [pageController::class, 'editProfilePage']);
Route::post('/editProfile/{user}', [profileController::class, 'editProfile'])->name('editProfile');

//Route for Events
Route::get('/addEvent', [pageController::class, 'addEventPage'])->name('addEvent');
Route::post('/addEvent', [EventController::class, 'addEvent'])->name('addEvent');
Route::get('/pageEvent/{event}',[pageController::class,'pageEvent'])->name('pageEvent');
Route::get('/viewEvent/{event}', [pageController::class, 'viewEvent']);


//Route Edit Event
Route::get('/editEvent/{event}',[pageController::class,'editEventPage'])->name('editEvent');
Route::post('/editEvent/{event}',[EventController::class,'editEvent'])->name('editEvent');
Route::delete('/deleteEvent/{event}', [EventController::class, 'deleteEvent'])->name('deleteEvent');

//Route for ApplyEvent
Route::get('/applyEvent/{event}',[pageController::class,'applyEventPage']);
Route::post('/applyEvent/{event}/{user}',[applyEventController::class,'addApplyEvent']);
Route::get('/editApplication/{application}',[pageController::class,'EditAppPage'])->name('editApplication');
Route::post('/editApplication/{application}',[applyEventController::class,'editApplyEvent'])->name('editApplication');
Route::delete('/deleteApplyEvent/{application}', [applyEventController::class, 'deleteApplyEvent'])->name('deleteApplyEvent');

// Route for list applications (Manager/Vendor)
Route::get('/list-applications/{event}',[pageController::class, 'listApplicationPage'])->name('listApplicationManager');
Route::post('/approveApp/{application}',[applyEventController::class,'approve']);
Route::post('/rejectApp/{application}',[applyEventController::class,'reject']);
Route::get('/viewReceipt/{event}/{application}',[pageController::class,'viewReceiptPage']);
Route::get('/viewVendor/{application}', [pageController::class, 'viewVendor'])->name('viewVendor');

Route::get('/vendorApplications/{user}', [pageController::class, 'vendorApplicationPage'])->name('listApplicationVendor');

