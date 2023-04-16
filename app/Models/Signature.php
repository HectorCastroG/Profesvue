<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Clase;

class signature extends Model
{
    protected $fillable = [
        'nombre'

    ];
    use HasFactory;

    public function profesor(){
        return $this->belongsToMany(Profesor::class);
    }

    public function clase(){
        return $this->hasOne(Clase::class);
    }
}
