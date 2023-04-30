<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contenido;
use App\Models\Signature;

class ContenidoController extends Controller
{
    public function index(){


        return Inertia::render('Contenido/Index',[
            'contenidos' => Signature::with('contenido')->get()
        ]);
    }
}
