@extends('app')
@section('content')

    <!--form-->
    <form method="POST">
        @csrf
        <!--name-->
        <div class="form-group">
        <label for="exampleInputName">Blog Title</label>
        <input type="text" class="form-control" name="title" id="exampleInputName" placeholder="Enter Title">
        </div>
        <!--age-->
        <div class="form-group">
            <label>Blog Body</label>
            <input type="text" class="form-control" name="body" id="exampleInputAge"  placeholder="Enter age">
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