<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;

class MainproductController extends Controller
{
    public function index(Request $request){
        
        $search = $request->search_product;
        $filter = $request->category;
        
        $data['slider'] = DB::table('slider')->whereNull('deleted_at')->limit(3)->get();
        $data['category'] = DB::table('category')->get();
        
        $data['product'] = DB::table('product')->where([
            ['product_name', 'like', '%'.$search.'%'],
            ['category_id', 'like', '%'.$filter.'%']
        ])->whereNull('deleted_at')->paginate(6);
        
        return view('main_product.main_product',$data);
    }
    
    public function product_detail($id){
        $id = Crypt::decrypt($id);
        $data['product'] = DB::table('product')->where('id',$id)->first();

        $count = DB::table('product')->select('count')->where('id',$id)->first();
        $jumlah = $count->count;

        $jumlah += 1;

        DB::table('product')->where('id',$id)->update([
            "count" => $jumlah,
        ]);

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
