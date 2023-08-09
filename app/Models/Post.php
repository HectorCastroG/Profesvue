<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'pkey1',
        'pkey2',
        'discusion',
        'user_id',
        'privacy'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
