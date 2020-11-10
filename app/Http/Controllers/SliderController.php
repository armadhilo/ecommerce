<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use File;
use App\Gambar;

class SliderController extends Controller
{
    public function index(){
        return view('slider.slider');
    }

    public function list() {
        $data = array();
        $list = DB::table('slider')->whereNull('deleted_at')->orderByDesc('id')->get();

        foreach ($list as $row) {
            $val = array();
            $val[] ='<img  class="img-fluid rounded-sm" style="height: 120px; width: auto;" src="'.asset('images/slider/'.$row->slider).'">';
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="fa fa-pencil"></i> Edit</a>&nbsp;'
                    . '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="hapus('."'".$row->id."'".')"><i class="fa fa-trash"></i> Delete</a>'
                    . '</div>';
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function store(Request $request){
      
        if(empty($_FILES['slider']['name'])){
            $status = "Please choose a picture";
        }else{

            $save_path = "images/slider";

            $this->validate($request, [
                'slider' => 'required|image|mimes:jpg,png,jpeg'
            ]);
    
            $data = $request->input('slider');
            $file = $request->file('slider');
            $photo =  time().$file->getClientOriginalName();
            $file->move($save_path,$photo);

            $query = DB::table('slider')->insert([
                "slider" => $photo,
                "created_at" => date("Y-m-d H:i:s"),
            ]);
            if($query){
                $status = "Data tersimpan";
            }else{
                $status = "Data gagal tersimpan";
            }
        }

        echo json_encode(array("status" => $status));
    }

    public function detail($id){
        $query = DB::table('slider')->where('id',$id)->first();

        if($query){
            return response()->json([
                "callback" => 'success',
                "data" => $query
            ]);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }

    public function update(Request $request){

        dd($request);
        if(!$request->hasfile('slider')){
            return response()->json(["callback" => 'add image please']);
        }
        
        $data = $request->input('slider');
        $file = $request->file('slider');
        $photo =  time().$file->getClientOriginalName();
        $file->move('images/slider',$photo);
        $foto = $photo;

        $query = DB::table('slider')->where('id',$request->id)->update([
            "slider" => $foto
        ]);

       return response()->json([
           "status" => 'Data Tersimpan',
       ]);
    }


    public function delete($id)
    {
        $query = DB::table('slider')->where('id',$id)->update(['deleted_at' => date("Y-m-d H:i:s")]);
        if($query){
            $pict = DB::table('slider')->where('id',$id)->select('image')->first();
            $image_path = 'images/slider/'.$pict->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }
    

}
