<?php

namespace App\Http\Controllers\Contabilidad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CajaController extends Controller
{

  function index() {
    return view('contabilidad.caja.index');
  }
}
