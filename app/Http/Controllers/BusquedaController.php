<?php

namespace App\Http\Controllers;

use App\Models\Busquedas;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    public function index()
    {
        $busquedas = Busquedas::all();
        return response()->json($busquedas);
    }
}
