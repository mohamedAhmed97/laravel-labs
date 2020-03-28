<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    //fillable array
    protected $fillable=[
        'name',
        'age',
        'books',
        'slug'
    ];
    
 
}
