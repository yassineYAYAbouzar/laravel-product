@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <h1>Product</h1>
    <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
    <div class="row col-sm-8">
    @foreach ($product as $pro)
    <div class="col-sm-4">
        <div class="card">
            <img src="{{ asset('uplode/' . $pro->image)}} " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $pro->title}}</h5>
              <p class="card-text">{{Str::limit( $pro->body, 100)}}</p>
              <a href="/post/{{ $pro->slug}}" class="btn btn-info">show</a>
              <a href="{{route('product.edit',$pro->id)}}" class="btn btn-info">edit</a>
            </div>
          </div>
        </div>
    @endforeach

    </div>
    {{ $product->links() }}
@endsection
