<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Profesor;
use App\Models\User;
use App\Models\Clase;

class SalasController extends Controller
{
    public function misala(){

        $clase = Clase::with(['contenido'])->where('profesor_id', '=', auth()->user()->profesor->id)->get();

        return Inertia::render('Salas/Misala', [
            'user' => [
                'name' => auth()->user()->name,
                'lastname' => auth()->user()->lastname,
                'username'=> auth()->user()->username,
                'signatures' => auth()->user()->profesor->signature,
                'clases'=> $clase

            ]
        ]);
    }

    public function sala(User $user){

        if($user->profesor == null){
            return error_log('El usuario no es un profesor');
        }else{
            return Inertia::render('Salas/Sala', [
                'user'=>$user,
                'asignaturas'=>$user->profesor->signature,
                'clases'=>$user->profesor->clase
            ]);
        }

    }
}
