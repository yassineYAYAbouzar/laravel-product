@extends('layouts.app')
@section('title', 'Product')
@section('content')

<form action="{{route('product.update',$product->id)}}" enctype="multipart/form-data" method="POST" >
    @csrf
    @method('PUT')
    <div class="container">
        <div class="form-group">
            <br><label for="exampleInputEmail1">ADD PRODUCT</label>
            <input type="file" name="image">
          </div>
    <div class="form-group">
      <label for="exampleInputEmail1">ADD PRODUCT</label>
      <input type="text" name="title" value="{{$product->title}}" class="form-control"  placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
     <textarea name="body"  class="form-control" >value="{{$product->body}}"</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
