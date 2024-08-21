<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControl;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserControl;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\MercadoPagoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [ProductController::class, 'index'])->name('index');

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
Route::post('/carrito', [ProductController::class, 'deleteCurrentCart'])->name('eliminar.carrito');

Route::get('/getProducto/{codigo_producto}', [ProductController::class, 'getProducto'])->middleware(['isAdmin']);

Route::post('/productos', [ProductController::class, 'verifyCart'])->name('añadir.al.carrito');


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

Route::get('/admin/pedidos/pendientes', [PedidosController::class, 'indexAdmin'])->name('admin.listado.pedidos.pendientes')->middleware(['isAdmin']);
Route::get('/admin/pedidos/historico', [PedidosController::class, 'indexAdmin'])->name('admin.listado.pedidos.historico')->middleware(['isAdmin']);

Route::get('/admin/estadocuenta', [VentasController::class, 'index'])->name('estado.cuenta')->middleware(['isAdmin']);

Route::get('/checkout', [ProductController::class, 'getCurrentCart'])->name('checkout')->middleware(['auth']);

Route::post('/checkout/crear', [PedidosController::class, 'create'])->name('pedido.crear')->middleware(['auth']);

Route::get('/checkout/pago', [MercadoPagoController::class, 'pay'])->name('checkout.pagar')->middleware(['auth', 'hasCarrito']);

Route::get('/checkout/pago/success', [MercadoPagoController::class, 'success'])->name('mercadopago.success')->middleware(['auth']);
Route::get('/checkout/pago/failure', [MercadoPagoController::class, 'failure'])->name('mercadopago.failed')->middleware(['auth']);
Route::get('/checkout/pago/pending', [MercadoPagoController::class, 'pending'])->name('mercadopago.pending')->middleware(['auth']);


Route::get('/pedidos', [PedidosController::class, 'index'])->name('listado.pedidos');

Route::post('/admin/pedidos/eliminar', [PedidosController::class, 'eliminar'])->name('pedido.eliminar');
Route::post('/admin/pedidos/entregar', [PedidosController::class, 'entregar'])->name('pedido.entregar');

Route::get('/getProductosPedido/{id_pedido}', [PedidosController::class, 'getProductosPedido'])->name('pedido.obtener.productos');






