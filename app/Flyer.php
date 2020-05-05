<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;
use App\User;

use Illuminate\Database\Schema\Builder;


class Flyer extends Model
{
    protected $guarded=[];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ownedBy(User $user)
    {
        return $this->user_id==$user()->id;
    }

    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();
    }


    // public static function scopeLocatedAt($query,$zip, $street)
    // {
    //     $street=str_replace('-',' ',$street);
    //     return $query->where(compact('zip','street'));
    // }

    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }
   

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function scopeCheep($query)
    {
        return $query->where('price', '<', 5000);
    }

    public function path()
    {
     return $this->zip .'/'. str_replace('','-',$this->street);
    }
    
}
