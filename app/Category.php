<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;   

class Category extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = ['name'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }

    public function posts(){
        return $this->hasMany('App\Post','category_id');
    }
}
