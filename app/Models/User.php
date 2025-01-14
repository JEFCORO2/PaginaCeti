<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
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
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relacion de user con publicaciones
    public function posts(){
        return $this->hasMany(Post::class);
    }

    //Almacenar los seguidores de un usuario
    public function seguidores(){
        return $this->belongsToMany(User::class, 'seguidors', 'user_id' , 'seguidor_id');
    }

    //Almacenar a las personas que seguimos
    public function seguidos(){
        return $this->belongsToMany(User::class, 'seguidors', 'seguidor_id' , 'user_id');
    }

    //Comprobar si un usuario ya sigue a otro
    public function estaSiguiendo(User $user){
        return $this->seguidores->contains($user->id);
    }
}
