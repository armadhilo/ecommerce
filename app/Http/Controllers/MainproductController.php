<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainproductController extends Controller
{
    public function index(){
        return view('main_product.main_product');
    }
    
    public function product_detail(){
        return view('main_product.detail_product');
    }

    public function list(Request $request){
        
        $search = $request->search;
        $filter = $request->filter;

        $query = DB::table('product')->where([
            ['product_name', 'like', '%'.$search.'%'],
            ['category_id', 'like', '%'.$filter.'%']
        ])->get();

        return response()->json(['data' => $query]);
    }
}
