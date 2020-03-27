@extends('app')
    @section('content')
        <!--title-->
        <div class="card">
            <h5 class="card-header">Blog</h5>
            <div class="card-body">
            <h5 class="card-title">Blog Title : {{$blog->title}}</h5>
            <p class="card-text">Blog Body : {{$blog->body}}</p>
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
    @endsection