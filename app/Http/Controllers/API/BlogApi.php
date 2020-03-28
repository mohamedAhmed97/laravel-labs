<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\blog;
use Carbon\Carbon;
use App\Http\Resources\BlogResource;
use App\Http\Requests\StoreBlogPost;
class BlogApi extends Controller
{
    //show
    public function show()
    {
      $blogs=blog::paginate(5);
      return BlogResource::collection($blogs);

    }
    //store
    public function store(StoreBlogPost $request)
    {
      $imagename=$request->file('image').Carbon::now(); 
      $path = $request->file('image')->storeAs(
          'avatars',$imagename);
      blog::create([
          'title'=>$request->title,
          'body'=>$request->body,
          'auth_id'=>$request->author,
          'slug'=>$request->title,
          'image'=>$imagename
      ]);
      return json_encode("Status :200");
    }
    //show_single_blog
    public function show_blog($id)
     {
       $blog=blog::find($id);
       return new BlogResource($blog);
 
     }
}
