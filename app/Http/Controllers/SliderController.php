<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SliderController extends Controller
{
    public function index(){
        return view('slider.slider');
    }

    public function list() {
        $data = array();
        $list = DB::table('slider')->get();

        foreach ($list as $row) {
            $val = array();
            $val[] ='<img  class="img-fluid rounded-sm" style="height: 120px; width: auto;" src="'.asset('images/'.$row->slider).'">';
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

            $save_path = "public/images";

            $this->validate($request, [
                'slider' => 'required|image|mimes:jpg,png,jpeg'
            ]);
    
            $data = $request->input('slider');
            $file = $request->file('slider');
            $photo =  time().$file->getClientOriginalName();
            $file->move('images',$photo);

            $query = DB::table('slider')->insert([
                "id" => 1,
                "slider" => $photo,
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
        if(empty($_FILES['slider']['name'])){
            $status = "Please choose a picture";
        }else{

            $save_path = "public/images";

            $this->validate($request, [
                'slider' => 'required|image|mimes:jpg,png,jpeg'
            ]);
    
            $data = $request->input('slider');
            $file = $request->file('slider');
            $photo =  time().$file->getClientOriginalName();
            $file->move('images',$photo);

            $query = DB::table('slider')->where('id','1')->update([
                "slider" => $photo,
            ]);
            if($query){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }

            // $query = DB::table('slider')->insert([
            //     "id" => 1,
            //     "slider" => $photo,
            // ]);
            
        }

        echo json_encode(array("status" => $status));

        
        
        // return response()->json(["callback" => 'success', "desc" => "Data terupdate"]);
    }

    

}
