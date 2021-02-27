<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => 'image',
            'description' => 'nullable',
            'instruction' => 'nullable',
            'notes' => 'nullable',
            'price' => 'numeric|required',
        ]);

        $product = new Product;
        $product->title = $request->title;
        $product->cover_image = $this->uploadImage($request->cover_image);
        $product->description = $request->description;
        $product->instruction = $request->instruction;
        $product->notes = $request->notes;
        $product->price = $request->price;

        $product->save();

        session()->flash('flash_message','Product added');
        return redirect(route('products.show',$product));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => 'image',
            'description' => 'nullable',
            'instruction' => 'nullable',
            'notes' => 'nullable',
            'price' => 'numeric|required',
        ]);

        $product->title = $request->title;
        if($request->has('cover_image')){
            Storage::disk('public')->delete($product->cover_image);
            $product->cover_image = $this->uploadImage($request->cover_image);
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->instruction = $request->instruction;
        $product->notes = $request->notes;
        $product->price = $request->price;

        $product->save();

        session()->flash('flash_message','The product has been modified successfully');

        return redirect(route('products.show',$product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->cover_image);

        $product->delete();

        session()->flash('flash_message','The product has been removed');
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }
}
