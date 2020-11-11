<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainproductController extends Controller
{
    public function index(Request $request){
        
        $data['slider'] = DB::table('slider')->whereNull('deleted_at')->orderByDesc('id')->limit(3)->get();
        // return view('main_product.main_product',$data);

        $search = $request->search;
        $filter = $request->filter;

        $data['isi'] = DB::table('product')->where([
            ['product_name', 'like', '%'.$search.'%'],
            ['category_id', 'like', '%'.$filter.'%'],
        ])->whereNull('deleted_at')->Paginate(3);

        if ($request->ajax()) {
            return view('main_product.presult', $data);
        }
  
        return view('main_product.main_product',$data);
    }
    
    public function product_detail($id){
        $data['product'] = DB::table('product')->where('id',$id)->first();
        return view('main_product.detail_product',$data);
    }

    public function list(Request $request){
        $search = $request->search;
        $filter = $request->filter;

        $data['isi'] = DB::table('product')->where([
            ['product_name', 'like', '%'.$search.'%'],
            ['category_id', 'like', '%'.$filter.'%'],
        ])->whereNull('deleted_at')->simplePaginate(3);

        if ($request->ajax()) {
            return view('main_product.presult', $data);
        }

        // return response()->json(['data' => $query]);
    }
}
