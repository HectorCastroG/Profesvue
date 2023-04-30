<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
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

        $clases = Clase::query()->with(['profesor', 'contenido'])
        ->filter(request(['buscar', 'contenido']))
        ->paginate(10)->withQueryString()->through(fn($clase)=>[
            'id'=>$clase->id,
            'title'=>$clase->title,
            'summary'=>$clase->summary,
            'pkey1'=>$clase->pkey1,
            'pkey2'=>$clase->pkey2,
            'pkey3'=>$clase->pkey3,
            'profesor'=>($clase->profesor ? $clase->profesor->user->name .' '. $clase->profesor->user->lastname : null),
            'signature'=>$clase->contenido->signature->nombre,
            'content'=>$clase->contenido->content

        ]);
        

        return Inertia::render('Clase/Index', [
            'clases' => $clases
        ]);
    }

    public function nuevo(){

        $request = Request::validate([
            'titulo'=> 'required',
            'cuerpo' => 'required',
            'signature_id'=>'required',
            'summary'=>'required'
        ]);



        Clase::create([
            'title'=>request('titulo'),
            'body' => request('cuerpo'),
            'profesor_id'=>auth()->user()->profesor->id,
            'signature_id'=>request('signature_id'),
            'summary'=>request('summary')
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

    public function update(Clase $clase){
    $request = Request::validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'signature_id' => 'required',
        'summary' => 'required'
    ]);

    $clase->update([
        'title' => $request['title'],
        'body' => $request['body'],
        'signature_id' => $request['signature_id'],
        'summary' => $request['summary']
    ]);

    return redirect('/');
    }


    public function destroy(Clase $clase){
        
        $clase->delete();
        return redirect('/inicio');
    }
}
