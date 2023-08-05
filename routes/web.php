<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ApprovalgaController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UsermanagementController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BypassController;
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

// Route::get('/', function () {
//     Route::get('/', [LoginController::class, 'login'])->name('login');
// });


Route::get('/', [LoginController::class, 'login'])->name('login');

Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::post('register/storenew', [RegisterController::class, 'storenew'])->name('register.storenew');

Route::get('forgetpassword', [RegisterController::class, 'forgetpassword'])->name('forgetpassword');

Route::post('sendemail', [RegisterController::class, 'sendemail'])->name('sendemail');

Route::get('sendemail/show/{id}', [RegisterController::class, 'feedbacksendmail'])->name('sendemail.feedback');

Route::post('actionchangepassword', [RegisterController::class, 'actionchangepassword'])->name('actionchangepassword');

// Route::get('Dashboard', [LDashboardController::class, 'login'])->name('login');



Route::get('car', [CarController::class, 'index'])->name('cars');

Route::get('car/addnew', [CarController::class, 'addnew'])->name('car.addnew');

Route::post('car/storenew', [CarController::class, 'storenew'])->name('car.storenew');

Route::get('car/delete/{id}', [CarController::class, 'delete'])->name('car.delete');

Route::get('car/edit/{id}', [CarController::class, 'edit'])->name('car.edit');

Route::post('car/storeedit', [CarController::class, 'storeedit'])->name('car.storeedit');

Route::get('car/search', [CarController::class, 'search'])->name('car.search');

Route::get('carrequest', [RequestController::class, 'index'])->name('carrequest');

Route::post('carrequest/main', [RequestController::class, 'main'])->name('carrequest.main');

Route::get('carrequest/history', [RequestController::class, 'history'])->name('carrequest.history');

Route::get('carrequest/ceckavaliabilty', [RequestController::class, 'caravaliablity'])->name('carrequest.caravaliablity');

Route::get('carrequest/return', [RequestController::class, 'returncar'])->name('carrequest.return');

Route::get('carrequest/ceckpayment', [RequestController::class, 'ceckpayment'])->name('carrequest.ceckpayment');

Route::get('carrequest/processpayment', [RequestController::class, 'processpayment'])->name('carrequest.prosespayment');

Route::get('approval', [ApprovalController::class, 'index'])->name('approval');

Route::get('approval/approve/{id}', [ApprovalController::class, 'approve'])->name('approval.approve');

Route::get('approval/delete/{id}', [ApprovalController::class, 'delete'])->name('approval.delete');

Route::get('approval/cancel/{id}', [ApprovalController::class, 'cancel'])->name('approval.cancel');

Route::post('approval/bulk', [ApprovalController::class, 'bulk'])->name('approval.bulk');

Route::get('approval/view/{id}', [ApprovalController::class, 'view'])->name('approval.view');

Route::get('approval/sendmail', [ApprovalController::class, 'sendmail'])->name('approval.sendmail');





Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('dashboard/approval', [DashboardController::class, 'approval'])->name('dashboard.approval');

Route::get('dashboard/printformulir/{id}', [DashboardController::class, 'printformulir'])->name('dashboard.printformulir');





Route::get('usr', [UsermanagementController::class, 'index'])->name('usr');

Route::post('usr/bulk', [UsermanagementController::class, 'bulk'])->name('usr.bulk');

Route::post('usr/approval1', [UsermanagementController::class, 'approval1'])->name('usr.approval1');

Route::post('usr/approval2', [UsermanagementController::class, 'approval2'])->name('usr.approval2');

Route::get('usr/search', [UsermanagementController::class, 'search'])->name('usr.search');

Route::get('pointer', [PointerController::class, 'index'])->name('pointer');

Route::get('carrequest/approveemail/{url}/{ac}/{id}', [BypassController::class, 'approveemail'])->name('bypass.email');

//route API login

Route::post('actionloginapi', [API\AuthController::class, 'login'])->name('api.actionlogin');
