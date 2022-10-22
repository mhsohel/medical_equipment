<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes(['register' => false]);


Route::get('/',[FrontendController::class,'index'])->name('index');
Route::post('/qoute-submit',[FrontendController::class,'qouteSubmit'])->name('qoute.submit');
Route::get('/{menu}',[FrontendController::class,'singlePage'])->name('single-page');
