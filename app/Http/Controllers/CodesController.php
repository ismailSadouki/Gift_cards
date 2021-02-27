<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Product;
use Illuminate\Http\Request;

class CodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Code::get('product_id');
        $products = Product::all();
        return view('admin.codes.index',compact('codes','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.codes.create', compact('products'));
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
            'product' => 'required',
            'code' => 'required',
            'code2' => 'nullable',
            'code3' => 'nullable',
            'code4' => 'nullable',
        ]);
        $code = new Code;  
        $code->product_id = $request->product;
        $code->code = $request->code;
        $code->save();
       
        $code_numbers = array('code2','code3','code4','code5');
 
        foreach($code_numbers as $code_number)
        {
            if($request->$code_number){
                $code = new Code;  
                $code->product_id = $request->product;
                $code->code = $request->$code_number;
                $code->save();
            }
        }

        session()->flash('flash_message','The codes have been added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);

        #  يجلب هذا السكريبت الاكواد الخاصة بهذا المنتج  
        
        $codes = Code::all();
        foreach ($codes as $code){
            $codes = $code->where(['product_id' => $product->id,'bought' => FALSE])->get();
        break;
        }
        


        return view('admin.codes.show',compact('product','codes'));
        
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
    public function destroy(Code $code)
    {
        $code->delete();
        session()->flash('flash_message','The codes has been removed');
        return back();
    }
}
