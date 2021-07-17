@extends('layouts.app')
@section('title', 'Product')
@section('content')

<form action="{{route('product.store')}}" enctype="multipart/form-data" method="POST" >
    @csrf
    <div class="container">
        <div class="form-group">
            <br><label for="exampleInputEmail1">ADD PRODUCT</label>
            <input type="file" name="image">
          </div>
    <div class="form-group">
      <label for="exampleInputEmail1">ADD PRODUCT</label>
      <input type="text" name="title" class="form-control"  placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
     <textarea name="body" class="form-control" ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
