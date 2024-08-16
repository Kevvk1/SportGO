<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControl;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
}) -> name('index');

Route::get('/productos', [ProductController::class, 'index']);

Route::post('/index', [AuthControl::class, 'process'])->name('process.user');

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    $request->session()->flash('email_verification_message', 'Inicia sesión para verificar tu correo electrónico');

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify'); 


Route::get('/email-verification', function () {
    return view('email-verification');
})->middleware('auth', 'not-verified')->name('verification.notice');


Route::post('/email-verification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    $mail = $request->user()->email;

    return back()->withSuccess('Correo de verificación enviado a '.$mail."!");

})->middleware(['auth', 'throttle:6,1', 'not-verified'])->name('verification.send');


Route::post('/logout', [AuthControl::class, 'logoutUser'])->name('logout.user')->middleware(['auth']);


Route::get('/error', function () {
    return view('error');
})->name('error');

Route::fallback(function(){
    return view('error');
});

Route::get('/admin/index', function () {
    return view('admin/index');
})->name('admin')->middleware(['isAdmin']);

Route::get('/admin/cargar', function () {
    return view('admin/cargar');
})->name('admin.cargar')->middleware(['isAdmin']);

Route::post('/admin/cargar', [ProductController::class, 'cargar'])->name('producto.cargar')->middleware(['isAdmin']);