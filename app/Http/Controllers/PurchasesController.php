<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = auth()->user()->purchasesInCart;
        return view('purchases.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codes = Code::all();
        $products = Product::all();
        foreach ($codes as $code){
            $codes = $code->where(['product_user_id' => $id,'bought' => TRUE])->get();
            
        break;
        }
        foreach($codes as $code){
            foreach ($products as $product){
                $products_title = $product->where('id' , $code->product_id)->get();
               break;
              }
        break;
        }


        return view('purchases.show',compact('codes','products_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
