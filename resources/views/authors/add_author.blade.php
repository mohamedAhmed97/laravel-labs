@extends('app')
@section('content')
<!--alert-->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
      @endif
    @endforeach
  </div>
<!--end alert-->  
<!--form-->
<form method="POST">
    @csrf
    <!--name-->
    <div class="form-group">
      <label for="exampleInputName">Author Name</label>
      <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter Name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your Name with anyone else.</small>
    </div>
    <!--age-->
    <div class="form-group">
        <label>Author Age</label>
        <input type="number" class="form-control" name="age" id="exampleInputAge"  placeholder="Enter age">
      </div>
      <!--books-->
      <div class="form-group">
        <label>Author Book's Number</label>
        <input type="number" class="form-control" name="books" placeholder="Enter Books Number">
        </div>
    <!--submit-->
     <button type="submit" class="btn btn-primary btn-lg btn-block">Add Author</button>
       
</form>     
@endsection