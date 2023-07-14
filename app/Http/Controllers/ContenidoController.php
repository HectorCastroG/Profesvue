<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contenido;
use App\Models\Signature;

class ContenidoController extends Controller
{
    public function index(){

        $signatures = Signature::all();


 
        $contents = [];

        foreach ($signatures as $signature) {

            $ejecontenido = $signature->ejescontenidos();
            $contents[$signature->nombre] = $ejecontenido;
        }


        return Inertia::render('Contenido/Index', [
            'contenidos' => $contents,
          
        ]);

    }

}
