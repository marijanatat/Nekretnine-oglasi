<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Flyer extends Model
{
    protected $guarded=[];
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
