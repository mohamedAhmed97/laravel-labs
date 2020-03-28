@extends('app')
@section('content')  
    <!--form-->
    <form method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!--name-->
        <div class="form-group">
        <label for="exampleInputName">Blog Title</label>
        <input type="text" class="form-control" value="{{$blog->title}}" name="title" id="exampleInputName" placeholder="Enter Title">
        </div>
        <!--age-->
        <div class="form-group">
            <label>Blog Body</label>
            <input type="text" class="form-control" value="{{$blog->body}}" name="body" id="exampleInputAge"  placeholder="Enter age">
        </div>
         <!--image-->
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
        </div>
        <!--books-->
        <div class="form-group">
            <label>Author Name</label>
            <select class="form-control" name="author">
                @foreach ($authors as $author)
                    @if ($blog->author->id==$author->id)
                        <option value="{{$author->id}}" selected>{{$author->name}}</option>
                    @else 
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endif
                    
                @endforeach
            </select>   
            </div>
        <!--submit-->
        <button type="submit" class="btn btn-primary btn-lg btn-block">Add Blog</button>
        
    </form>     
@endsection