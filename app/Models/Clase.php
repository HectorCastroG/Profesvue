<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Contenido;
use App\Models\Signature;

class Clase extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'summary',
        'pkey1',
        'pkey2',
        'pkey3',
        'profesor_id',
        'contenido_id'

    ];
    

    public function scopeFilter($query, array $filters){
        

        $query->when($filters['buscar']?? false, fn($query, $buscar)=>
            $query
                ->where('title', 'like', '%' . $buscar . '%')
                ->orwhere('body', 'like', '%' . $buscar . '%')
                ->orwhere('summary', 'like', '%' . $buscar . '%')
                ->orwhere('pkey1', 'like', '%' . $buscar . '%')
                ->orwhere('pkey2', 'like', '%' . $buscar . '%')
                ->orwhere('pkey3', 'like', '%' . $buscar . '%')

            );

        $query->when($filters['contenido']?? false, fn($query, $contenido)=>
            $query
                ->wherehas('contenido', fn($query) =>
                    $query->where('content', 'like', '%' . $contenido . '%')));
 
    }
    public function profesor(){
        return $this->belongsTo(Profesor::class);
    }

    public function contenido(){
        return $this->belongsTo(Contenido::class);
    }
}
