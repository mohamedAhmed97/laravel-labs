<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\author;
use App\Http\Resources\AuthorResource;
class AuthorApi extends Controller
{
    public function show()
    {
        $authors=author::paginate(5);
        return AuthorResource::collection($authors);  
    }
}
