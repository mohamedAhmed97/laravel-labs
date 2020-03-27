<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\author;
use App\blog;
use Session;
class BlogController extends Controller
{
    //show page of add Blog
    public function show_create_page()
    {
        $authors=author::all();
        return view('blogs.add_blogs')->with('authors',$authors);
    }
    //create blog
    public function create(Request $request)
    {   
        blog::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'auth_id'=>$request->author
        ]);
        Session::flash('alert-success', 'Blog Added');
        return redirect()->route('blogs');     
    }
    //show page of all blogs
    public function show_blogs()
    {
        $blogs=blog::paginate(5);
        
        return view('blogs.blogs')->with('blogs',$blogs);
    }

    //show single blog
    public function show_blog(Request $request,$id)
    {   
        //get blog
        $blog=blog::find($id);
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
        $blog=blog::where('id',$id)->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'auth_id'=>$request->author
            ]);
        Session::flash('alert-success', 'Blog updated');
        return redirect()->route('blogs');       
    }
    
    //destroy
    public function destroy($id)
    {
        blog::find($id)->delete();
        Session::flash('alert-danger', 'Blog deleted');
        return redirect()->route('blogs');  
    }
}
