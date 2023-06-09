<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
//use Illuminate\Http\Request;
use Inertia\Inertia;
use Termwind\Components\Dd;
use App\Models\Profesor;
use App\Models\Signature;
use App\Models\User;


use function PHPSTORM_META\map;

class ProfesorController extends Controller
{
    public function index(){

        $profesores = Profesor::query()
            ->with(['signature', 'user'=>function ($query) {
                $query->select('id', 'name', 'lastname', 'username', 'email');
            }])->filter(request(['asignatura', 'buscar']))->paginate(10)->withQueryString()->through(fn($profesor) => [
                    'id'=>$profesor->id,
                    'name'=>$profesor->user->name,
                    'lastname'=>$profesor->user->lastname,
                    'username'=>$profesor->user->username,
                    'email'=>$profesor->user->email,
                    'signature'=>$profesor->signature->pluck('nombre')
                ]
            );   
        


        return Inertia::render('Profesor/Index',[
            'profesores'=>$profesores
        ]);

    }


    public function create(){

        if(auth()->user()->profesor == null){
            return Inertia::render('Profesor/Create',[
                'signatures'=>Signature::all(),
            ]);
        }else{
            return redirect('/inicio')->with('errorcito', 'errorcito');
        }
    }

    public function crear(){
        $signature = Request::validate([
            'signature'=>'required'
        ]);

        $profesor = Profesor::create([
            'user_id'=>auth()->user()->id
        ]);

        $usario = User::find(auth()->user()->id);
        $usario->teacher = true;
        $usario->save(); 


        $profesor->signature()->attach($signature);
        return redirect('/inicio')->with('excelente', 'eres todo un profesor');
    }
}
