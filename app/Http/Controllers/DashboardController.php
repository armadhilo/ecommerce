<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }

    public function chart()
    {
        $label_mostClick = [];
        $data_mostClick = [];

        $label_product = [];
        $data_product = [];
        
        $query = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')->select('count','product_name')->orderByDesc('count')->limit(10)->get();
        foreach($query as $item){
            array_push($label_mostClick,$item->product_name);
            array_push($data_mostClick,$item->count);
        }

        $query2 = DB::select( DB::raw("SELECT COUNT(category_id) AS hitung, category_name FROM product as a JOIN category as b ON a.category_id = b.id GROUP BY category_id ORDER BY hitung DESC"));
        foreach($query2 as $item){
            array_push($label_product,$item->category_name);
            array_push($data_product,$item->hitung);
        }

        return response()->json([
            "labelClick" => $label_mostClick,
            "dataClick" => $data_mostClick,
            "labelProduct" => $label_product,
            "dataProduct" => $data_product,
        ]);
    }
}
