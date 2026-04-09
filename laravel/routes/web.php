<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('login'); });
Route::get('/login', function () { return view('login'); });
Route::get('/welcome', function () { return view('welcome'); });
Route::get('/personal', function () { return view('gestionAd'); });
Route::get('/registrar-admin', function () { return view('regitroAd'); });
Route::get('/productos', function () { return view('gestionPr'); });
Route::get('/agregar-producto', function () { return view('agregarPr'); });
Route::get('/editar-producto', function () { return view('editarPr'); });
Route::get('/pedidos', function () { return view('verPe'); });
Route::get('/editar-pedido', function () { return view('editarPe'); });
