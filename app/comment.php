<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //fillable
    protected $fillable=[
        'comment',
        'blog_id',
        'commeidntable_id'
    ];
    public function commeidntable()
    {
        return $this->morphTo();
    }
}
