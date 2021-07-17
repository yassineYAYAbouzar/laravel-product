<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product')->with('product', Product::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('image')) {
            $file = $request->image;
            $image_name =  time() . '_'. $file->getClientOriginalName();
            $file->move(public_path('uplode'),$image_name);
        }
        Product::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$image_name,
        ]);
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->has('image')) {
            $file = $request->image;
            $image_name =  time() . '_'. $file->getClientOriginalName();
            $file->move(public_path('uplode'),$image_name);
            $check = public_path('uplode').'/'.$product->image;
            if (is_file($check)) {
                unlink(public_path('uplode').'/'.$product->image);
            }
            $product->image = $image_name;
        }
        $product = Product::where('id',$product->id)->first();
        $product->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>   $image_name,
        ]);
        return redirect('product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
