<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Clase;
use App\Models\User;

class Sesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'horainicio',
        'horacierre',
        'profesor_id'

    ];

    public function profesor(){
        return $this->belongsTo(Profesor::class);
    }

    public function clase(){
        return $this->belongsToMany(Clase::class);
    }

    public function user()
{
    return $this->belongsToMany(User::class);
}

}
