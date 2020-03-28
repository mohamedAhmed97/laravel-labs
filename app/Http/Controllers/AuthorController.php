<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\author;
use App\Http\Requests\StoreAuthorPost;
use Session;
class AuthorController extends Controller
{
    //show page of create author
    public function show()
    {
        return view('authors.add_author');
    }

    //function of create user
    public function create(StoreAuthorPost $requst)
    {
        author::create([
            'name'=>$requst->name,
            'age'=>$requst->age,
            'books'=>$requst->books
        ]);
        Session::flash('alert-success', 'User Added');
        return redirect()->route('blogs'); 

    }
}
