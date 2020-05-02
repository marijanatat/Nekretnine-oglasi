<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

use Illuminate\Database\Schema\Builder;


class Flyer extends Model
{
    protected $guarded=[];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopeLocatedAt($query,$zip, $street)
    {
        $street=str_replace('-',' ',$street);
        return $query->where(compact('zip','street'));
    }

    public function getPriceAttribute($price)
    {
       return "$". number_format($price);
    }
}
