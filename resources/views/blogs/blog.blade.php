@extends('app')
    @section('content')
        <!--title-->
        <div class="card">
            <h5 class="card-header">Blog</h5>
            <div class="card-body">
            <h5 class="card-title">Blog Title : {{$blog->title}}</h5>
            <p class="card-text">Blog Body : {{$blog->body}}</p>
            <p class="card-text">Blog slug : {{$blog->slug}}</p>
            </div>
        </div>
        <!--end Title-->
        <br>
        <!--author-->
        <div class="card">
            <h5 class="card-header">Author name</h5>
            <div class="card-body">
            <h5 class="card-title">Name : {{$blog->author->name}}</h5>
            <p class="card-text">Books : {{$blog->author->books}}</p>
            </div>
        </div>
        <!--end author-->
        <!--comments-->
        <br>
        <div class="row">
            <div class="container">
                    <div class="card">
                        <div class="card-header">
                          Comments
                        </div>
                        <ul class="list-group list-group-flush">
                            <!--<li class="list-group-item">//comment</li>-->
                        </ul>
                    </div>
            </div>
        </div>    
        <!--end comments-->
        <br>
        <!--comment form--> 
        <div class="row">
            <div class="container">
                    <div class="card">
                        <div class="card-header">
                        Add Comment
                        </div>
                        <div class="container">
                            <form action="/comments/create" method="POST">
                                @csrf
                                <!--hidden input-->
                                <input type="hidden" name="blog" value="{{$blog->id}}">
                                <!--comment input-->
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Leave Comment</label>
                                    <input class="form-control" type="text" name="comment">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                             </form>
                        </div>
                    </div>
            </div>
        </div>
       
    @endsection