<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class CategoryController extends Controller
{
    public function index(){
        return view('category.category');
    }

    public function list() {
        $data = array();
        $list = DB::table('category')->orderByDesc('id')->get();

        foreach ($list as $row) {
            $val = array();
            $val[] = $row->category_name;
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="fa fa-pencil"></i> Edit</a>'
                    . '</div>';
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function store(Request $request){
        $query = DB::table('category')->insert([
            "id" => $request->id,
            "category_name" => $request->category_name,
        ]);

        if($query){
            return response()->json(["callback" => 'success', "desc" => "Data tersimpan"]);
        }else{
            return response()->json(["callback" => 'fail', "desc" => "Data gagal ditambahkan"]);
        }
    }

    public function detail($id)
    {
        $query = DB::table('category')->where('id',$id)->first();

        if($query){
            return response()->json([
                "callback" => 'success',
                "data" => $query
            ]);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }

    public function update(Request $request)
    {
        $query = DB::table('category')->where('id',$request->id)->update([
            "category_name" => $request->category_name,
        ]);
        
        return response()->json(["callback" => 'success', "desc" => "Data terupdate"]);
    }

    // public function delete($id)
    // {
    //     $query = DB::table('category')->update(['deleted_at' => \Carbon::now()]);
    //     if($query){
    //         return response()->json(["callback" => 'success']);
    //     }else{
    //         return response()->json(["callback" => 'fail']);
    //     }
    // }

}
