<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Signature;

class Contenido extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido',
        'eje',
        'signature_id'

    ];

    public function signature(){
        return $this->belongsTo(Signature::class);
    }

    public function clase(){
        return $this->hasMany(Clase::class);
    }
}
