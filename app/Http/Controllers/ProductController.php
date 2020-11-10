<?php

namespace App\Http\Controllers;

use App\Image_uploaded;
use Carbon\Carbon;
use Image;
use File;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data['category'] = DB::table('category')->get();
        return view('product.product',$data);
    }

    public function list() {
        $data = array();
        $list = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')->select('product.*','category.category_name')->get();
        foreach ($list as $row) {
            $val = array();
            $val[] = '<img src="'.asset('images/'.$row->image).'" width="30%" height="30%">';
            $val[] = $row->product_name;
            $val[] = $row->category_name;
            $val[] = $row->description;
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="fa fa-pencil"></i> Edit</a>'
                    . '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="hapus('."'".$row->id."'".')"><i class="fa fa-trash"></i> Delete</a>'
                    . '</div>';
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function detail($id)
    {
        $query = DB::table('product')->where('id',$id)->first();

        if($query){
            return response()->json([
                "callback" => 'success',
                "data" => $query
            ]);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }

    public function store(Request $request)
    {
        $save_path = "public/images";

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $foto = 'coba.jpg';

        if($request->hasfile('image')){
            $data = $request->input('image');
            $file = $request->file('image');
            $photo =  time().$file->getClientOriginalName();
            $file->move('images',$photo);

            $foto = $photo;
        }
        
        $query = DB::table('product')->insertGetId([
                    "category_id" => $request->category_id,
                    "users_id" => session('id'),
                    "product_name" => $request->product_name,
                    "description" => $request->description,
                    "pic" => $request->pic,
                    "mitra" => $request->mitra,
                    "nidn" => $request->nidn,
                    "jml_halaman" => $request->jml_halaman,
                    "penerbit" => $request->penerbit,
                    "status" => '1',
                    "image" => $foto,
                 ]);

        if($query){
            DB::table('users_log')->insert([
                "users_id" => session('username'),
                "action" => 'INSERT',
                "product_id" => $query,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
            return response()->json(["callback" => 'success', "desc" => "Data tersimpan"]);
        }else{
            return response()->json(["callback" => 'fail', "desc" => "Data gagal ditambahkan"]);
        }
    }

    public function update(Request $request)
    {
        $foto = 'coba.jpg';

        if($request->hasfile('image')){
            $data = $request->input('image');
            $file = $request->file('image');
            $photo =  time().$file->getClientOriginalName();
            $file->move('images',$photo);

            $foto = $photo;
        }

        $query = DB::table('product')->update([
            "category_id" => $request->category_id,
            "users_id" => session('id'),
            "product_name" => $request->product_name,
            "description" => $request->description,
            "pic" => $request->pic,
            "mitra" => $request->mitra,
            "nidn" => $request->nidn,
            "jml_halaman" => $request->jml_halaman,
            "penerbit" => $request->penerbit,
            "status" => '1',   
            "image" => $foto,     
        ]);

        DB::table('users_log')->insert([
            "users_id" => session('username'),
            "action" => 'UPDATE',
            "product_id" => $query,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        return response()->json(["callback" => 'success', "desc" => "Data terupdate"]);
    }


    public function delete($id)
    {
        $query = DB::table('product')->update(['deleted_at' => \Carbon::now()]);
        if($query){

            DB::table('users_log')->insert([
                "users_id" => session('username'),
                "action" => 'DELETE',
                "product_id" => $id,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);

            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }
}
