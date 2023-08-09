<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Signature;
use App\Models\Profesor;
use App\Models\Sesion;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'signature_id',
        'profesor_id',
        'name',
        'informacion'

    ];

    public function profesor(){
        return $this->belongsTo(Profesor::class);
    }

    public function signature(){
        return $this->belongsTo(Signature::class);
    }

    public function sesion(){
        return $this->belongsToMany(Sesion::class);
    }
}
