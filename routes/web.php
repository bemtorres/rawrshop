<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InstallController;
use App\Http\Controllers\Admin\TiendaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('usuario')->group( function () {
  Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard.index');


  Route::get('pagina', 'Admin\PaginaController@index')->name('pagina.index');
  Route::get('pagina/create', 'Admin\PaginaController@create')->name('pagina.create');
  Route::post('pagina', 'Admin\PaginaController@store')->name('pagina.store');
  Route::get('pagina/{id}', 'Admin\PaginaController@show')->name('pagina.show');
  Route::get('pagina/{id}/edit', 'Admin\PaginaController@edit')->name('pagina.edit');
  Route::put('pagina/{id}', 'Admin\PaginaController@update')->name('pagina.update');


  Route::resource('productos', 'Admin\ProductoController');
  Route::get('producto/agotados', 'Admin\ProductoController@indexAgotados')->name('productos.agotados');
  Route::get('producto/favoritos', 'Admin\ProductoController@indexFavoritos')->name('productos.favoritos');
  Route::get('producto/eliminados', 'Admin\ProductoController@indexEliminados')->name('productos.eliminados');
  Route::get('producto/dashboard', 'Admin\ProductoController@indexDashboard')->name('productos.dashboard');

  Route::put('producto/favoritos', 'Admin\ProductoController@favoritoUpdate')->name('productos.favoritos.update');
  Route::put('producto/price', 'Admin\ProductoController@priceUpdate')->name('productos.price.update');

  Route::get('productos/{id}/variedades', 'Admin\ProductoController@variedades')->name('productos.variedades');
  Route::get('productos/{id}/variedad/create', 'Admin\VariedadController@create')->name('variedad.create');
  Route::post('productos/{id}/variedad/create', 'Admin\VariedadController@store')->name('variedad.store');
  Route::get('productos/{id}/seo', 'Admin\ProductoController@seo')->name('productos.seo');
  Route::put('productos/{id}/title', 'Admin\ProductoController@titleUpdate')->name('productos.title.update');
  Route::get('productos/{id}/assets', 'Admin\ProductoController@assets')->name('productos.assets');
  Route::put('productos/{id}/assets', 'Admin\ProductoController@assetsUpdate')->name('productos.assets.update');
  Route::delete('productos/{id}/assets', 'Admin\ProductoController@assetsDelete')->name('productos.assets.delete');

  Route::get('variedades/{id}/edit', 'Admin\VariedadController@edit')->name('variedad.edit');
  Route::put('variedades/{id}', 'Admin\VariedadController@update')->name('variedad.update');

  Route::resource('clientes', 'Admin\TiendaController');
  Route::resource('usuarios', 'Admin\TiendaController');
  // Route::resource('servicios', 'Admin\CategoriaController');

  Route::resource('categorias', 'Admin\CategoriaController');
  Route::resource('subcategorias', 'Admin\SubcategoriaController');

  // @API
  Route::put('productos/{id}/variedad/changePosition', 'Admin\VariedadController@changePosition')->name('variedad.changePosition');
  Route::put('pagina/changePosition', 'Admin\PaginaController@changePosition')->name('pagina.changePosition');
  Route::put('categoria/changePosition', 'Admin\CategoriaController@changePosition')->name('categoria.changePosition');
  Route::put('subcategoria/changePosition', 'Admin\SubcategoriaController@changePosition')->name('subcategoria.changePosition');

  Route::get('cache',function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return redirect()->route('dashboard.index')->with('succes', 'cache borrado');
  })->name('utils.sistema.cache');
});

// INSTALL
Route::get('install',[InstallController::class,'index'])->name('install.index');
Route::post('install',[InstallController::class,'store'])->name('install.store');

Route::get('acceso','Auth\AuthController@index')->name('acceso');
Route::post('acceso','Auth\AuthController@login')->name('acceso');


Route::get('/','HomeController@index')->name('home.index');
Route::post('/','HomeController@find')->name('home.find');
Route::get('blog/{code}','HomeController@blog')->name('home.blog');
Route::get('producto/{code}','HomeController@producto')->name('home.producto');
Route::get('categorias/{type}/{code}','HomeController@categoria')->name('home.categoria');

// Route::get('productos/{code}/{sub_code}','HomeController@categoria')->name('home.subcategoria');

Route::post('producto/newsletter','HomeController@newsletter')->name('home.newsletter');
Route::get('mantenimiento', 'HomeController@mantenimiento')->name('home.mantenimiento');

Route::middleware('usuario')->group( function () {
  Route::get('edicion','HomeController@indexEdicion')->name('home.index.edicion');
  Route::get('edicion/blog/{code}','HomeController@blogEdicion')->name('home.blog.edicion');
});


// SITEMAP
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.index');
Route::get('/sitemap.xml/categorias', 'SitemapController@categorias')->name('sitemap.categorias');
Route::get('/sitemap.xml/subcategorias', 'SitemapController@subcategorias')->name('sitemap.subcategorias');
Route::get('/sitemap.xml/productos', 'SitemapController@productos')->name('sitemap.productos');
