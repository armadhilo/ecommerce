<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Category;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    public function index(){
        return view('category.index');
//        $list =  DB::select("SELECT * FROM category WHERE idcategory='C00001';");
//        $name = $list[0]->category;
//        echo $list;
        
    }
    
    public function ajax_list() {
        $data = array();
        $list = M_Category::all();
//        $list =  DB::select("SELECT * FROM category");
        foreach ($list as $row) {
            $val = array();
            $val[] = $row->category;
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->idcategory."'".')"><i class="fa fa-pencil"></i> Edit</a>&nbsp;'
                    . '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$row->idcategory."'".')"><i class="fa fa-trash"></i> Delete</a>'
                    . '</div>';
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }
    
    public function save_category(Request $req) {
        
        $help = new Helpers();
        $obj = new M_Category();
        $count = DB::table("category")->where("category", $req->input('nama_kategori'))->count();
        if($count > 0){
            $status = "Data sudah ada";
        }else{
            $obj->idcategory = $help->autokode('C', 'idcategory', 'category');
            $obj->category = $req->input('nama_kategori');

            $simpan = $obj->save();
            if($simpan == 1){
                $status = "Tersmpan";
            }else{
                $status = "Gagal";
            }
        }
        echo json_encode(array("status" => $status));
    }
    
    public function edit($id) {
        $data = M_Category::where('idcategory',$id)->first();
        echo json_encode($data);
    }
    
    public function update_category(Request $req) {
        $update = M_Category::where('idcategory',$req->input('id'))->update([
            'category' => $req->input('nama_kategori'),
        ]);
        if($update == 1){
            $status = "Tersmpan";
        }else{
            $status = "Gagal";
        }
        echo json_encode(array("status" => $status));
    }
    
    public function hapus($id) {
        $hapus = M_category::where('idcategory',$id)->delete();
        if($hapus == 1){
            $status = "Terhapus";
        }else{
            $status = "Gagal";
        }
        echo json_encode(array("status" => $status));
    }
}
