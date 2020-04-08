<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'] ;
    //

    public function user(){
        return $this->hasOne('App\User','photo_id');
    }

    public function post(){
        return $this->hasOne('App\Post','photo_id');
    }
}
