<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $number_of_product = Product::count();
        $number_of_users = User::count();
        $number_of_codes = Code::count();

        return view('theme.default',compact('number_of_product','number_of_users','number_of_codes'));
    }
}
