<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterFormController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('login');
})->name('login-route');

Route::get('/registration', function () {
    return view('register');
})->name('register-route');

Route::post('/submit-registration', [RegisterFormController::class,'registration'])->name('submit-registration');
Route::post('/submit-login', [LoginController::class,'login'])->name('submit-login');


Route::middleware('verify_api_csrf')->group(function (){
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');

    Route::get('/welcome-dashboard', [LoginController::class,'home'])->name('dashboard-w');
    Route::get('/create-product', [LoginController::class,'createListView'])->name('create-product');
    Route::post('/save-new-product', [LoginController::class,'saveNewProduct'])->name('save-new-listing');
    Route::get('/edit-product/{id}', [LoginController::class,'editProduct'])->name('edit-listing');
    Route::delete('/delete-product/{id}', [LoginController::class,'deleteProduct'])->name('delete-listing');
    Route::put('/update-product', [LoginController::class,'updateProduct'])->name('update-listing');

});


