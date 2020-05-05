<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Flyer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;
// use Image;


class Photo extends Model
{
    protected $table = "flyer_photos";
    //protected $guarded=[];
    //ne sme biti /images/phptps, mora biti relativna putanja
    protected $baseDir = "images/photos";
    protected $fillable = ['name', 'thumbnail_path', 'path'];

    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }

    public static function named($name)
    {
        $photo = new static;
        return $photo->saveAs($name);
    }

    public function saveAs($name)
    {
        //formatira string , bice current time-name
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn/%s", $this->baseDir, $this->name);
        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);
        //    Image::make($this->path)
        //    ->fit(200)
        //    ->save($this->thumbnail_path);
        $this->makeTumbnail();
        return $this;
    }

    protected function makeTumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }
}
