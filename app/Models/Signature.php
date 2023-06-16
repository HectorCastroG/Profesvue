<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Clase;
use App\Models\Contenido;

class signature extends Model
{
    protected $fillable = [
        'nombre',
        'contenido'

    ];
    use HasFactory;

    public function ejescontenidos()
    {
        $contenidos = $this->contenido()->orderBy('eje')->get();

        $resultados = [];

        // Iterar sobre los contenidos y agruparlos por eje
        foreach ($contenidos as $contenido) {
            $eje_nombre = $contenido->eje;
            $contenido_nombre = $contenido->content;

            if (!array_key_exists($eje_nombre, $resultados)) {
                $resultados[$eje_nombre] = [];
            }

            $resultados[$eje_nombre][] = $contenido_nombre;
        }

        return $resultados;
    }

//    public function entregaContenidos($sign){
//        $signatures = $sign;
//
//
// 
//        $contents = [];
//
//        foreach ($signatures as $signature) {
//
//            $ejecontenido = $signature->ejescontenidos();
//            $contents[$signature->nombre] = $ejecontenido;
//        }
//    }
//
    

    public function contenido(){
            return $this->hasMany(Contenido::class);
    }

    public function profesor(){
        return $this->belongsToMany(Profesor::class);
    }

    public function clase(){
        return $this->hasOne(Clase::class);
    }
}
