<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConstanciaController extends Controller
{
    public function index()
    {
        $constancia = 'constancia.pdf';
        //DESCARGAR CONSTANCIA
        return response()->download($constancia);
    }
}
