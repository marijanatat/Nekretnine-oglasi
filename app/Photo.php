<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Flyer;

class Photo extends Model
{
    protected $table="flyer_photos";
    protected $fillable=['photo'];
    public function photo()
    {
        return $this->belongsTo(Flyer::class);
    }
}
