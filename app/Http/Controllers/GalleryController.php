<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(12);
        $title = 'product :';
        $codes = Code::all();

        return view('gallery',compact('products','codes','title')); 
    }

    public function search(Request $request)
    {
        $products = Product::where('title', 'like',"%{$request->keyword}%")->paginate(12);
        $title = 'Display search results for'.' '.$request->keyword;

        return view('gallery', compact('products','title'));
    }

    public function details(Product $product){

        $codes = Code::get('product_id');
        return view('products.details', compact('product','codes'));
    
    }
}


// @if ($book->authors->isNotEmpty())
// 		@foreach($book->authors as $author)$80.00
// 				{{ $loop->first ? ' ' : 'و' }}
// 				<a> {{ $author->name }} </a>
// 		@endforeach
// @endif

// يفيد هذا الكود بالمرور على جميع المؤلفين
