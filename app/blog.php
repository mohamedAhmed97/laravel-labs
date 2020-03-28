<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class blog extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    //fillable array
    protected $fillable=[
        'title','body','auth_id','image'
    ];
    //user
    public function author()
    {
        return $this->belongsTo('App\author','auth_id','id');
    }

    //realtion of comments
    public function comments()
    {
        return $this->morphMany('App\comment', 'commeidntable');
    }


}
