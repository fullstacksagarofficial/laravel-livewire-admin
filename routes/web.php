<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Admin\Appointments\CreateAppointment;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Users\ListUsers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//auth
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');


Route::group(['middleware' => 'admin_auth'], function () {
    //dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    // logout 
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logged Out');
        return redirect('admin');
    });

    // --------------------------------------------------------------------------------------------------------------------------

    // view category 
    Route::get('admin/category', [CategoryController::class, 'index']);
    //add category 
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/addnow', [CategoryController::class, 'addnow'])->name('category.insert');
    //edit category 
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/editnow', [CategoryController::class, 'editnow'])->name('category.update');
    // delete category 
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    //status
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);

    // --------------------------------------------------------------------------------------------------------------------------

    
    Route::get('admin/users', ListUsers::class)->name('admin.users');

    // --------------------------------------------------------------------------------------------------------------------------

    Route::get('admin/appointments', ListAppointments::class)->name('admin.appointments');
    Route::get('admin/appointments/create', CreateAppointment::class)->name('admin.appointments.create');

});
