<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Sesion;
use App\Models\Plan;

class PlanController extends Controller
{
    public function misplanes(){

        $signatures = auth()->user()->profesor->signature;
        $planes = Plan::with(['signature', 'sesion'])->where('profesor_id', '=', auth()->user()->profesor->id)->get();
        $sesiones=Sesion::with(['clase'])->where('profesor_id', '=', auth()->user()->profesor->id)->get();

        return Inertia::render('Planes/Misplanes', [
            'planes' => $planes,
            'sesiones'=> $sesiones,
            'signatures'=>$signatures,
        ]);
    }

    public function create(){
        $request = Request::validate([
            'name' => 'required',
            'informacion' => 'required',
            'signature_id'=>'required',
            'checkedSesions' => 'required'
        ]);

        $plan = Plan::create([
            'name' => request('name'),
            'informacion' => request('informacion'),
            'signature_id' =>request('signature_id'),
            'profesor_id' => auth()->user()->profesor->id,
        ]);

        foreach(request('checkedSesions')as $sesion){
            $plan->sesion()->attach($sesion);
        }
    }


    public function show(Plan $plan){

        $sesion = $plan->sesion->load(['clase.contenido']);
        return Inertia::render('Planes/Show',[
            'plan' => [
                'nombre'=>$plan->name,
                'informacion'=>$plan->informacion,
                'signature'=>$plan->signature->nombre, 
                'sesion'=>$sesion,
                'profesor'=>[
                    'name' =>$plan->profesor->user->name,
                    'lastname' =>$plan->profesor->user->lastname

                ]
            ]
        ]);
    }

    public function planeditar(Plan $plan){
        $sesion = [];

        foreach($plan->sesion->load(['clase.contenido']) as $sesions){
            array_push($sesion, $sesions->id);
        }
        $signatures = auth()->user()->profesor->signature;
        $sesiones=Sesion::with(['clase'])->where('profesor_id', '=', auth()->user()->profesor->id)->get();

        return Inertia::render('Planes/Editar',[
            'plan' => [
                'id'=>$plan->id,
                'nombre'=>$plan->name,
                'informacion'=>$plan->informacion,
                'signature'=>$plan->signature->id, 
                'sesion'=>$sesion,
                'profesor'=>[
                    'name' =>$plan->profesor->user->name,
                    'lastname' =>$plan->profesor->user->lastname

                ]
            ],
            'signatures'=>$signatures,
            'sesiones'=>$sesiones

        ]); 
    }

    public function update(Plan $plan){
        $request = Request::validate([
            'name' => 'required',
            'informacion' => 'required',
            'signature_id'=>'required',
            'checkedSesions' => 'required|array'
        ]);

        $plan->update([
            'name' => $request['name'],
            'informacion' => $request['informacion'],
            'signature_id' =>$request['signature_id']
        ]);

        $plan->sesion()->sync(request('checkedSesions'));
    }

    public function destroy(Plan $plan){
        $plan->delete();
        return redirect('/misplanes');

    }
}
