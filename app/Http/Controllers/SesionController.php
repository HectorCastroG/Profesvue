<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Models\Sesion;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;





//use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function create()
    {
        try {
            Request::validate([
                'fecha' => 'required|date',
                'horainicio' => 'required',
                'horacierre' => 'required',
                'checkedClases' => 'required',
            ]);

            $fecha = request('fecha');
            $horainicio = request('horainicio');
            $horacierre = request('horacierre');
            $profesorId = auth()->user()->profesor->id;

            // Verificar si el profesor ya tiene alguna sesión en el mismo periodo de tiempo
            $sesionExistente = DB::table('sesions')
                ->where('profesor_id', $profesorId)
                ->where(function ($query) use ($fecha, $horainicio, $horacierre) {
                    $query->where(function ($query) use ($fecha, $horainicio, $horacierre) {
                        $query->where('fecha', $fecha)
                            ->where('horainicio', '<=', $horainicio)
                            ->where('horacierre', '>=', $horainicio);
                    })->orWhere(function ($query) use ($fecha, $horainicio, $horacierre) {
                        $query->where('fecha', $fecha)
                            ->where('horainicio', '<=', $horacierre)
                            ->where('horacierre', '>=', $horacierre);
                    })->orWhere(function ($query) use ($fecha, $horainicio, $horacierre) {
                        $query->where('fecha', $fecha)
                            ->where('horainicio', '>=', $horainicio)
                            ->where('horacierre', '<=', $horacierre);
                    });
                })
                ->first();

            if ($sesionExistente) {
                return Redirect::back()->withErrors([
                    'horainicio' => 'El profesor ya tiene una sesión programada en el mismo periodo de tiempo.'
                ])->withInput();
            }

            $sesion = Sesion::create([
                'fecha' => request('fecha'),
                'horainicio' => request('horainicio'),
                'horacierre' => request('horacierre'),
                'profesor_id' => auth()->user()->profesor->id
            ]);

            foreach (request('checkedClases') as $clase) {
                $sesion->clase()->attach($clase);
            }

            return Redirect::route('calendar');

        } catch (ValidationException $e) {
            return Redirect::back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    } 

    public function sesion(Sesion $sesion){
        return Inertia::render('Sesiones/Sesion', [
            'sesion' => $sesion,
            'clases' =>$sesion->clase,
            'profesor' =>[
                'nombre' =>$sesion->profesor->user->name . ' ' . $sesion->profesor->user->lastname,
                'username'=>$sesion->profesor->user->username
            ],
            'inscritos'=>$sesion->user
        ]);
    }

    public function inscribir(Sesion $sesion)
    {
        $user = auth()->user();
    
        // Verificar si el usuario que quiere inscribirse es el creador de la sesión
        if ($sesion->profesor->user->id === $user->id) {
            return Redirect::back()->withErrors([
                'misesion' => 'No puedes inscribirte en tu propia sesion'
            ])->withInput();        
        }
    
        // Verificar si el usuario ya está inscrito en la sesión
        if ($sesion->user()->where('users.id', $user->id)->exists()) {
            return Redirect::back()->withErrors([
                'message' => 'El usuario ya está inscrito.'
            ])->withInput(); 
        }
    
        // Inscribir al usuario en la sesión
        $sesion->user()->attach($user->id);
        return Redirect::route('inicio');
    }
    

}
