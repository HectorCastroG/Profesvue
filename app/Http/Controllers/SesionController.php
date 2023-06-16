<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Models\Sesion;
use Inertia\Inertia;

//use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function create(){
        Request::validate([
            'fecha'=> 'required|date',
            'horainicio'=> 'required',
            'horacierre'=> 'required',
            'checkedClases'=>'required'
        ]);


        $sesion = Sesion::create([
            'fecha' => request('fecha'),
            'horainicio' => request('horainicio'),
            'horacierre'=>request('horacierre'),
            'profesor_id'=>auth()->user()->profesor->id

        ]);

        foreach (request('checkedClases') as $clase) {
            $sesion->clase()->attach($clase);
        }

        return Inertia::render('Calendar/Calendar');
    }

    public function sesion(){
        return Inertia::render('Sesiones/Sesion');
    }
}
