<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\author;
use App\blog;
use App\Http\Requests\StoreBlogPost;
use Session;
use Carbon\Carbon;
class BlogController extends Controller
{
    //show page of add Blog
    public function show_create_page()
    {
        $authors=author::all();
        return view('blogs.add_blogs')->with('authors',$authors);
    }
    //create blog
    public function create(StoreBlogPost $request)
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
        Session::flash('alert-success', 'Blog Added');
        return redirect()->route('blogs');     
    }
    //show page of all blogs
    public function show_blogs()
    {
        $blogs=blog::paginate(5);
        //dd(Carbon::createFromDate(19,10,97)."\n");
        return view('blogs.blogs')->with('blogs',$blogs);
    }

    //show single blog
    public function show_blog(request $request,$id)
    {   
        //get blog
        $blog=blog::find($id);
        //dd($blog->comments);
        //view
        return view('blogs.blog')->with('blog',$blog);
    }

    //show edit blog page
    public function show_edit_page($id)
    {   //get blog
        $blog=blog::find($id);
        //get authors
        $authors=author::all();
        //view
        return view('blogs.edit_blog')->with('blog',$blog)->with('authors',$authors);
    }
    //edit blog 
    public function update_blog(Request $request,$id)
    {   //get blog
        $blog=blog::find($id);
        //delete image
        $postion=storage_path().'/app/avatars/'.$blog->image;
        //Storage::delete($postion);
        unlink($postion);
        //upload new image
        $imagename=$request->file('image').Carbon::now(); 
        $path = $request->file('image')->storeAs(
            'avatars',$imagename);
        //update
        $blog->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'auth_id'=>$request->author,
            'image'=>$imagename
            ]);
        Session::flash('alert-success', 'Blog updated');
        return redirect()->route('blogs');       
    }
    
    //destroy
    public function destroy($id)
    {   
        $blog=blog::find($id);
        $postion=storage_path().'/app/avatars/'.$blog->image;
        //Storage::delete($postion);
        unlink($postion);
        $blog->delete();
        Session::flash('alert-danger', 'Blog deleted');
        return redirect()->route('blogs');  
        
    }
}
