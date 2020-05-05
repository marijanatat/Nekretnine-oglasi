<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Flyer;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function owns($relation)
    {
        return $relation->user_id==$this->id;
    }

    public function publish(Flyer $flyer)
    {
        return $this->flyers()->save($flyer);
    }
    public function flyers()
    {
        return $this->hasMany(Flyer::class);
    }
}