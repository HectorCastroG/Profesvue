<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Signature;

class Clase extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'profesor_id',
        'signature_id'

    ];

    public function profesor(){
        return $this->belongsTo(Profesor::class);
    }

    public function signature(){
        return $this->belongsTo(Signature::class);
    }
}
