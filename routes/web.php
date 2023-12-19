<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstallController;
use App\Http\Controllers\Admin\PaginaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\SubcategoriaController;
use App\Http\Controllers\Admin\TiendaController;
use App\Http\Controllers\Admin\VariedadController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('usuario')->group( function () {
  Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');


  Route::get('pagina', [PaginaController::class,'index'])->name('pagina.index');
  Route::get('pagina/create', [PaginaController::class,'create'])->name('pagina.create');
  Route::post('pagina', [PaginaController::class,'store'])->name('pagina.store');
  Route::get('pagina/{id}', [PaginaController::class,'show'])->name('pagina.show');
  Route::get('pagina/{id}/edit', [PaginaController::class,'edit'])->name('pagina.edit');
  Route::put('pagina/{id}', [PaginaController::class,'update'])->name('pagina.update');


  Route::resource('productos', ProductoController::class);
  Route::get('producto/agotados', [ProductoController::class,'indexAgotados'])->name('productos.agotados');
  Route::get('producto/favoritos', [ProductoController::class,'indexFavoritos'])->name('productos.favoritos');
  Route::get('producto/eliminados', [ProductoController::class,'indexEliminados'])->name('productos.eliminados');
  Route::get('producto/dashboard', [ProductoController::class,'indexDashboard'])->name('productos.dashboard');

  Route::put('producto/favoritos', [ProductoController::class,'favoritoUpdate'])->name('productos.favoritos.update');
  Route::put('producto/price', [ProductoController::class,'priceUpdate'])->name('productos.price.update');

  Route::get('productos/{id}/variedades', [ProductoController::class,'variedades'])->name('productos.variedades');
  Route::get('productos/{id}/variedad/create', [VariedadController::class,'create'])->name('variedad.create');
  Route::post('productos/{id}/variedad/create', [VariedadController::class,'store'])->name('variedad.store');
  Route::get('productos/{id}/seo', [ProductoController::class,'seo'])->name('productos.seo');
  Route::put('productos/{id}/title', [ProductoController::class,'titleUpdate'])->name('productos.title.update');
  Route::get('productos/{id}/assets', [ProductoController::class,'assets'])->name('productos.assets');
  Route::put('productos/{id}/assets', [ProductoController::class,'assetsUpdate'])->name('productos.assets.update');
  Route::delete('productos/{id}/assets', [ProductoController::class,'assetsDelete'])->name('productos.assets.delete');

  Route::get('variedades/{id}/edit', [VariedadController::class,'edit'])->name('variedad.edit');
  Route::put('variedades/{id}', [VariedadController::class,'update'])->name('variedad.update');

  // Route::resource('clientes', 'Admin\TiendaController');
  Route::resource('usuarios', TiendaController::class);
  // Route::resource('servicios', 'Admin\CategoriaController');

  Route::resource('categorias', CategoriaController::class);
  Route::resource('subcategorias', SubcategoriaController::class);

  // @API
  Route::put('productos/{id}/variedad/changePosition', [VariedadController::class,'changePosition'])->name('variedad.changePosition');
  Route::put('pagina/changePosition', [PaginaController::class, 'changePosition'])->name('pagina.changePosition');
  Route::put('categoria/changePosition', [CategoriaController::class,'changePosition'])->name('categoria.changePosition');
  Route::put('subcategoria/changePosition', [SubcategoriaController::class,'changePosition'])->name('subcategoria.changePosition');

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

Route::get('acceso',[AuthController::class,'index'])->name('acceso');
Route::post('acceso',[AuthController::class,'login'])->name('acceso');

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::post('/',[HomeController::class,'find'])->name('home.find');
Route::get('blog/{code}',[HomeController::class,'blog'])->name('home.blog');
Route::get('producto/{code}',[HomeController::class,'producto'])->name('home.producto');
Route::get('categorias/{type}/{code}',[HomeController::class,'categoria'])->name('home.categoria');

// Route::get('productos/{code}/{sub_code}','HomeController@categoria')->name('home.subcategoria');

Route::post('producto/newsletter',[HomeController::class,'newsletter'])->name('home.newsletter');
Route::get('mantenimiento', [HomeController::class,'mantenimiento'])->name('home.mantenimiento');

Route::middleware('usuario')->group( function () {
  Route::get('edicion',[HomeController::class,'indexEdicion'])->name('home.index.edicion');
  Route::get('edicion/blog/{code}',[HomeController::class,'blogEdicion'])->name('home.blog.edicion');
});


// SITEMAP
Route::get('/sitemap.xml', [SitemapController::class,'index'])->name('sitemap.index');
Route::get('/sitemap.xml/categorias', [SitemapController::class,'categorias'])->name('sitemap.categorias');
Route::get('/sitemap.xml/subcategorias', [SitemapController::class,'subcategorias'])->name('sitemap.subcategorias');
Route::get('/sitemap.xml/productos', [SitemapController::class,'productos'])->name('sitemap.productos');
