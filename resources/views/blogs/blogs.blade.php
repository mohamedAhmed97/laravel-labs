@extends('app')
@section('content')
    <div class="container mb-2">
        <a class="btn btn-primary" href="/authors/create" role="button">Add Author</a> 
        <a class="btn btn-primary" href="/blogs/create" role="button">Add Blog</a> 
    </div>
          
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)   
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td>{{$blog->title}}</td>
                <td>{{$blog->author->name}}</td>
                <!--view-->
                <td>
                     <a href="/blogs/{{$blog->id}}">
                        <button type="button" class="btn btn-primary">view</button>
                    </a>    
                </td>    
                <!--edit-->
                <td>
                    <a href="/blogs/{{$blog->id}}/edit">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>    
                </td>
                <!--Delete-->
                <td>
                    <a href="/blogs/{{$blog->id}}/delete">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>    
                </td>    
            </tr>
        @endforeach    
        </tbody>
    </table> 
    <!--pagination-->
    {{ $blogs->links() }}   
@endsection