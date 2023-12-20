<?php

use App\Http\Controllers\Admin\TiendaController;
use Illuminate\Support\Facades\Route;

Route::middleware('usuario')->prefix('admin/tienda')->name('tienda.')->group( function () {

  Route::get('/',[TiendaController::class,'index'])->name('index');
  Route::put('/',[TiendaController::class,'update'])->name('update');
  Route::get('integracion',[TiendaController::class,'integracion'])->name('integracion');
  Route::get('rrss',[TiendaController::class,'rrss'])->name('rrss');
  Route::put('rrss',[TiendaController::class,'rrssUpdate'])->name('rrss');
  Route::put('rrss_enabled',[TiendaController::class,'rrssUpdateEnabled'])->name('rrss.enabled');

  Route::get('chat',[TiendaController::class,'chat'])->name('chat');
  Route::put('chat',[TiendaController::class,'chatUpdate'])->name('chat.update');

  Route::get('web',[TiendaController::class,'web'])->name('web');
  Route::put('web',[TiendaController::class,'webUpdate'])->name('web.update');
  Route::put('web_enabled',[TiendaController::class,'webUpdateEnabled'])->name('web.update.enabled');
  Route::get('footer',[TiendaController::class,'footer'])->name('footer');
  Route::put('footer',[TiendaController::class,'footerUpdate'])->name('footer.update');

  Route::get('theme',[TiendaController::class,'theme'])->name('theme');
  Route::put('theme',[TiendaController::class,'themeUpdate'])->name('theme.update');

  Route::get('assets',[TiendaController::class,'assets'])->name('assets');
  Route::put('assets',[TiendaController::class,'assetsUpdate'])->name('assets');
  Route::put('title',[TiendaController::class,'titleUpdate'])->name('title.update');
  Route::get('seo',[TiendaController::class,'seo'])->name('seo');
  Route::put('seo',[TiendaController::class,'seoUpdate'])->name('seo.update');
  Route::get('pay',[TiendaController::class,'pay'])->name('pay');
  Route::put('pay',[TiendaController::class,'payUpdate'])->name('pay.update');
  Route::get('pro',[TiendaController::class,'pro'])->name('pro');
  Route::put('pro',[TiendaController::class,'proUpdate'])->name('pro.update');

  Route::get('codigo',[TiendaController::class,'codigo'])->name('codigo');
  Route::put('codigo/js',[TiendaController::class,'codigoJs'])->name('codigo.js');
  Route::put('codigo/css',[TiendaController::class,'codigoCss'])->name('codigo.css');
  Route::get('mantenimiento',[TiendaController::class,'mantenimiento'])->name('mantenimiento');
  Route::put('mantenimiento',[TiendaController::class,'mantenimientoUpdate'])->name('mantenimiento.update');
});
