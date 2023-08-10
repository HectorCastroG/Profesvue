<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profesor;
use App\Models\Post;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'lastname',
        'birthday',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function profesor(){
        return $this->hasOne(Profesor::class);
    }

    public function sesion(){
        return $this->belongsToMany(Sesion::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);

    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps(); // registrar marcas de tiempo de seguimiento
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id')
            ->withTimestamps(); 
    }
}
