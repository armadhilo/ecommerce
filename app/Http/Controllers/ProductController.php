<?php

namespace App\Http\Controllers;

use App\Image_uploaded;
use Carbon\Carbon;
use Image;
use File;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Gambar;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data['category'] = DB::table('category')->get();
        return view('product.product',$data);
    }

    public function list() {
        $data = array();
        $list = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')->select('product.*','category.category_name')->whereNull('deleted_at')->orderByDesc('id')->get();
        
        foreach ($list as $row) {
            $val = array();
            $val[] = '<img class="img-fluid rounded-sm" style="height: 120px; width: auto;" src="'.asset('images/'.$row->image).'">';
            $val[] = $row->product_name;
            $val[] = $row->category_name;
            $val[] = substr($row->description,0,100).'...';
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Detail" onclick="detail_foto('."'".$row->id."'".', '."'".$row->product_name."'".')"><i class="fa fa-image"></i> Detail</a>&nbsp;'
                    . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="fa fa-pencil"></i> Edit</a>&nbsp;'
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
        if(!$request->hasfile('image')){
            $foto = "template/no_image.png";
        }else{
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
                    "isbn" => $request->isbn,
                    "nama_lengkap" => $request->nama_lengkap,
                    "jml_halaman" => $request->jml_halaman,
                    "penerbit" => $request->penerbit,
                    "status" => $request->status,
                    "image" => $foto,
                 ]);

        if($query){
            DB::table('users_log')->insert([
                "users_id" => session('id'),
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
        if($request->hasfile('image')){

            $pict = DB::table('product')->where('id',$request->id)->select('image')->first();
            
            $image_path = 'images/'.$pict->image;
            File::delete($image_path);

            $data = $request->input('image');
            $file = $request->file('image');
            $photo =  time().$file->getClientOriginalName();
            $file->move('images',$photo);

            $query = DB::table('product')->where('id',$request->id)->update([
                "image" => $photo
            ]);
        }

        $query = DB::table('product')->where('id',$request->id)->update([
            "category_id" => $request->category_id,
            "users_id" => session('id'),
            "product_name" => $request->product_name,
            "description" => $request->description,
            "pic" => $request->pic,
            "mitra" => $request->mitra,
            "isbn" => $request->isbn,
            "nidn" => $request->nidn,
            "nama_lengkap" => $request->nama_lengkap,
            "jml_halaman" => $request->jml_halaman,
            "penerbit" => $request->penerbit,
            "status" => '1',        
        ]);

        DB::table('users_log')->insert([
            "users_id" => session('id'),
            "action" => "UPDATE",
            "product_id" => $query,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        return response()->json(["callback" => 'success', "desc" => "Data terupdate"]);
    }


    public function delete($id)
    {
        $query = DB::table('product')->where('id',$id)->update(['deleted_at' => date("Y-m-d H:i:s")]);
        if($query){
            DB::table('users_log')->insert([
                "users_id" => session('id'),
                "action" => 'DELETE',
                "product_id" => $id,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);

            $pict = DB::table('product')->where('id',$id)->select('image')->first();
            $image_path = 'images/'.$pict->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }
}
