<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainproductController extends Controller
{
    public function index(){
        return view('main_product.main_product');
    }
    
    public function product_detail(){
        return view('main_product.detail_product');
    }
}
