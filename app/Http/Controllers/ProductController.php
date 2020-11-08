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
    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = storage_path('app/public/images');
    }


    public function index(){
        return view('product.product');
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
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        //JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($this->path)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($this->path);
        }

        $file = $request->file('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $canvas = Image::canvas(300, 300);
        $resizeImage  = Image::make($file)->resize(300, 300, function($constraint) {
            $constraint->aspectRatio();
        });
        $canvas->insert($resizeImage, 'center');
        $canvas->save($this->path);


        $query = DB::table('product')->insert([
                    "category_id" => $request->category_id,
                    "users_id" => session('username'),
                    "product_name" => $request->product_name,
                    "description" => $request->description,
                    "pic" => $request->pic,
                    "mitra" => $request->mitra,
                    "nidn" => $request->nidn,
                    "jml_halaman" => $request->jml_halaman,
                    "penerbit" => $request->penerbit,
                    "status" => '1',
                    "image" => $this->path,
                 ]);

        if($query){
            DB::table('users_log')->insert([
                "users_id" => session('username'),
                "action" => 'INSERT',
                "product_id" => $id,
                "created_at" => \Carbon::now(),
                "updated_at" => \Carbon::now(),
            ]);
            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }

    public function update(Request $request, $id)
    {
        //BELUM
    }


    public function delete($id)
    {
        $query = DB::table('product')->update(['deleted_at' => \Carbon::now()]);
        if($query){

            DB::table('users_log')->insert([
                "users_id" => session('username'),
                "action" => 'DELETE',
                "product_id" => $id,
                "created_at" => \Carbon::now(),
                "updated_at" => \Carbon::now(),
            ]);

            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }
}
