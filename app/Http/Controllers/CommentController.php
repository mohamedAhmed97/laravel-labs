<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
class CommentController extends Controller
{   //create comment
    function create(request $request){
        comment::create([
            'comment'=>$request->comment,
            'blog_id'=>$request->blog,
            'commeidntable_id'=>$request->blog
        ]);
        return back();       
    }
}
