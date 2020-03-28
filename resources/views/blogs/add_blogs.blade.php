@extends('app')
@section('content')

    <!--form-->
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <!--name-->
        <div class="form-group">
        <label for="exampleInputName">Blog Title</label>
        <input type="text" class="form-control" name="title" id="exampleInputName" placeholder="Enter Title">
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <!--age-->
        <div class="form-group">
            <label>Blog Body</label>
            <input type="text" class="form-control" name="body" id="exampleInputAge"  placeholder="Enter age">
        @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>   
            </div>
        <!--submit-->
        <button type="submit" class="btn btn-primary btn-lg btn-block">Add Blog</button>
        
    </form>     
@endsection