<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //fillable array
    protected $fillable=[
        'title','body','auth_id'
    ];
    //user
    public function author()
    {
        return $this->belongsTo('App\author','auth_id','id');
    }

}
