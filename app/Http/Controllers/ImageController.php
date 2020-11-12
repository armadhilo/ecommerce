<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if(!$request->hasfile('image')){
            return response()->json(["callback" => 'fail', "desc" => 'add image please']);
        }
        
        $data = $request->input('image');
        $file = $request->file('image');
        $photo =  time().$file->getClientOriginalName();
        $file->move('images',$photo);
        $foto = $photo;

        $query = DB::table('product_image')->insert([
            "product_id" => $request->product_id,
            "image" => $foto,
        ]);

        if($query){
            return response()->json(["callback" => 'success', "desc" => "Data tersimpan"]);
        }else{
            return response()->json(["callback" => 'fail', "desc" => "Data gagal ditambahkan"]);
        }
    }

    public function update(Request $request)
    {
        if($request->hasfile('image')){

            $pict = DB::table('product_image')->where('id',$request->id)->select('image')->first();
            
            $image_path = 'images/'.$pict->image;
            File::delete($image_path);

            $data = $request->input('image');
            $file = $request->file('image');
            $photo =  time().$file->getClientOriginalName();
            $file->move('images',$photo);

            $query = DB::table('product_image')->where('id',$request->id)->update([
                "image" => $photo
            ]);
        }else{
            return response()->json(["callback" => 'fail', "desc" => 'add image please']);
        }
    }

    public function detail($id)
    {
        $query = DB::table('product_image')->where('product_id',$id)->whereNull('deleted_at')->get();
        if($query){
            return response()->json([
                "callback" => 'success',
                "data" => $query
            ]);
        }else{
            return response()->json(["callback" => 'fail',"desc" => "Tidak ada data yang ditampilkan"]);
        }
    }

    public function delete($id)
    {
        $query = DB::table('product_image')->where('id',$id)->update([
            "deleted_at" => date('Y-m-d H:i:s'),
        ]);

        if($query){
            $pict = DB::table('product_image')->where('id',$id)->select('image')->first();
            $image_path = 'images/'.$pict->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            return response()->json(["callback" => 'success',"desc" => "Data berhasil dihapus"]);
        }else{
            return response()->json(["callback" => 'fail',"desc" => "Data gagal dihapus"]);
        }
    }
}
