<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;


use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\ProfileController;

use App\Http\Controllers\Backend\SettingController;


use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenudescriptionController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\QuoteController;
use App\Http\Controllers\Backend\SliderController;

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');


Route::resource('settings', SettingController::class);
Route::post('logoupdate', [SettingController::class, 'sitelogo'])->name('logoupdate');

//   Roles && Users

   Route::resource('roles',RoleController::class);
   Route::resource('users',UserController::class);

// Module Management

Route::resource('modules',ModuleController::class);

// Permission Management

Route::resource('permissions',PermissionController::class);

// Profile
Route::get('profile/', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile/', [ProfileController::class, 'update'])->name('profile.update');

// Security
Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('profile.password.change');
Route::post('profile/security', [ProfileController::class, 'updatePassword'])->name('profile.password.update');


// Backups
Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');


// ...................setup Mamagement........................................... //
Route::resource('sliders',SliderController::class);
Route::resource('menus',MenuController::class);
Route::resource('menudescriptions',MenudescriptionController::class);
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);
Route::resource('quotes',QuoteController::class);
Route::get('mark-read',[QuoteController::class,'markRead'])->name('mark.read');
