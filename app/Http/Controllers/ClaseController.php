<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Clase;
use App\Models\User;

class ClaseController extends Controller
{
    public function create(){

        return Inertia::render('Clase/Create', [
            'signatures' => auth()->user()->profesor->signature
        ]);
    }

    public function index(){

        return Inertia::render('Clase/Index', [
            'clases' => Clase::all()
        ]);
    }

    public function nuevo(Request $request){

        $request->validate([
            'titulo'=> 'required',
            'cuerpo' => 'required',
            'signature_id'=>'required'
        ]);

        Clase::create([
            'title'=>request('titulo'),
            'body' => request('cuerpo'),
            'profesor_id'=>auth()->user()->profesor->id,
            'signature_id'=>request('signature_id')
        ]);

        return redirect('/inicio');
    }

    public function show(User $user, Clase $clase){
        
        return Inertia::render('Clase/Show', [
            'user' => $user,
            'clase' =>$clase
        ]);

    }

    public function claseeditar(Clase $clase){

        return Inertia::render('Clase/Claseeditar', [
            'clase' => $clase,
            'signatures' => auth()->user()->profesor->signature


        ]);
    }

    public function update(Request $request, Clase $clase){

        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'signature_id'=>'required',

        ]);

         $clase->update($request->all());

        return redirect('/');

    }

    public function destroy(Clase $clase){
        
        $clase->delete();
        return redirect('/inicio');
    }
}
