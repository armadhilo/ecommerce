<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class UsersController extends Controller
{
    public function index(){

        $data['users'] = DB::table('users')->get();

        return view('users.users',$data);
    }

    public function list() {
        $data = array();
        $list = DB::table('users')->get();
        foreach ($list as $row) {
            $val = array();
            $val[] = $row->username;
            $val[] = $row->nama;
            $val[] = $row->no_hp;
            $val[] = $row->alamat;
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="fa fa-pencil"></i> Edit</a>'
                    . '</div>';
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function detail($id)
    {
        $query = DB::table('users')->where('id',$id)->first();

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
        $query = DB::table('users')->insert([
                    "username" => $request->username,
                    "password" =>  Hash::make($request->username),
                    "nama" => $request->nama,
                    "no_hp" => $request->telepon,
                    "alamat" => $request->alamat,
                    "role" => '2',
                 ]);

        if($query){
            return response()->json(["callback" => 'success', "desc" => "Data tersimpan"]);
        }else{
            return response()->json(["callback" => 'fail', "desc" => "Data gagal ditambahkan"]);
        }
    }

    public function update(Request $request)
    {
        $query = DB::table('users')->where('id',$request->id)->update([
            "nama" => $request->nama,
            "no_hp" => $request->telepon,
            "alamat" => $request->alamat,
        ]);

        return response()->json(["callback" => 'success', "desc" => "Data terupdate"]);
    }

    public function delete($id)
    {
        $query = DB::table('users')->update(['deleted_at' => \Carbon::now()]);
        if($query){
            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }
}
