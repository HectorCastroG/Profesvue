<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clase;
use App\Models\Signature;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'Signature_id',
        'user_id',
        'signature'

    ];

    public function scopeFilter($query, array $filters){
        

        $query->with('user')->when($filters['buscar']?? false, fn($query, $buscar)=>
            $query
                ->wherehas('user', fn($query) =>
                    $query
                        ->where('name', 'like', '%' . $buscar . '%')
                        ->orwhere('lastname', 'like', '%' . $buscar . '%')));

        $query->with('user')->when($filters['asignatura']?? false, fn($query, $asignatura)=>
            $query
                ->wherehas('signature', fn($query) =>
                    $query->where('nombre', 'like', '%' . $asignatura . '%')));
 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function clase(){
        return $this->hasMany(Clase::class);
    }

    public function signature(){
        return $this->belongsToMany(Signature::class);
    }
}
