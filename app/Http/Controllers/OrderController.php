<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\user;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToOrder(Request $request)
    {
        $product = Product::find($request->id);

    
            
            //

        if(auth()->user()->ordersInCart->contains($product->id)) {
            $newQuantity = $request->quantity + auth()->user()->ordersInCart()->where('product_id', $product->id)->first()->pivot->quantity;
                
                // عدد الاكواد الخاصة بهذا المنتج
                $codes = Code::all();
                foreach ($codes as $code) {
                    $number_of_codes = $code->where('product_id','=', $request->id)->get()->count();
                    break;
                }
                //    تحقق من عدد الاكواد الموجودة في قاعدة البيانات
                if($newQuantity < $number_of_codes) {
                    auth()->user()->ordersInCart()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);
                
                }else {
                    session()->flash('warning_message','لم تتم اضافة الكتاب,لقد تجاوزت عدد النسخ الموجودة لدينا ,اقصى عدد موجود بامكانك حجزه من هذا الكتاب هو');

                }
          
            //  auth()->user()->ordersInCart()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);  
        }else {
            auth()->user()->ordersInCart()->attach($request->id, ['quantity' => $request->quantity]);
        }

        return back();


    }

    public function viewOrder()
    {
        $items = auth()->user()->ordersInCart;
        return view('order', compact('items'));
    }

    public function removeOne(Product $product)
    {
        $oldQuantity = auth()->user()->ordersInCart()->where('product_id', $product->id)->first()->pivot->quantity;

        if($oldQuantity > 1){
            auth()->user()->ordersInCart()->updateExistingPivot($product->id, ['quantity'=> --$oldQuantity]);
        }else {
            auth()->user()->ordersInCart()->detach($product->id);
        }

        return redirect()->back();
    }

    public function removeAll(Product $product)
    {
        auth()->user()->ordersInCart()->detach($product->id);

        return redirect()->back();
    }
}
