<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControl;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserControl;
use App\Http\Controllers\PedidosController;

//Route::get('/', function () {
    //return view('index');
//});



Route::get('/index', [ProductController::class, 'index'])->name('index');

Route::post('/index', [AuthControl::class, 'process'])->name('process.user');

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('/register', function () {
    return view('register');
}) -> name('register');

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

Route::get('/carrito', [ProductController::class, 'getCurrentCart']);

Route::get('/getProducto/{codigo_producto}', [ProductController::class, 'getProducto'])->middleware(['isAdmin']);

Route::post('/productos', [ProductController::class, 'verifyCart'])->name('añadir.al.carrito');

Route::post('/carrito', [ProductController::class, 'deleteCurrentCart'])->name('eliminar.carrito');

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

Route::get('/admin/listado', [ProductController::class, 'indexAdmin'])->name('admin.listado.productos')->middleware(['isAdmin']);

Route::post('/admin/listado/modificar', [ProductController::class, 'modificar'])->name('producto.modificar')->middleware(['isAdmin']);

Route::post('/admin/listado/eliminar', [ProductController::class, 'eliminar'])->name('producto.eliminar')->middleware(['isAdmin']);

Route::get('/admin/usuarios', [UserControl::class, 'index'])->name('admin.listado')->middleware(['isAdmin']);

Route::post('/admin/usuarios', [UserControl::class, 'cambiarTipo'])->name('admin.cambiar.usuario')->middleware(['isAdmin']);

Route::get('/admin/pedidos', [PedidosController::class, 'indexAdmin'])->name('admin.listado.pedidos')->middleware(['isAdmin']);

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::post('/checkout/crear', [PedidosController::class, 'create'])->name('pedido.crear');



