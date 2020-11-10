<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainproductController extends Controller
{
    public function index(){
        $data['slider'] = DB::table('slider')->limit(3)->get();
        return view('main_product.main_product',$data);
    }
    
    public function product_detail($id){
        $data['product'] = DB::table('product')->where('id',$id)->first();
        return view('main_product.detail_product',$data);
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
