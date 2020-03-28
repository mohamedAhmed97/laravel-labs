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
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
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
                <td>
                   
                    <img src="{{storage_path().'/app/avatars/'.$blog->image}}">
                    </td>
                <td>{{$blog->created_at->format('d-m-Y')}}</td>
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
                    <form action="/blogs/{{$blog->id}}/delete" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>    
            </tr>
        @endforeach    
        </tbody>
    </table> 
    <!--pagination-->
    {{ $blogs->links() }}   
@endsection