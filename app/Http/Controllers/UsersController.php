<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){

        $data['users'] = DB::table('users')->get();

        return view('users.users',$data);
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
                    "no_hp" => $request->no_hp,
                    "alamat" => $request->alamat,
                    "role" => $request->role,
                 ]);

        if($query){
            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
    }

    public function update(Request $request, $id)
    {
        $query = DB::table('users')->where('id',$id)->update([
            "nama" => $request->nama,
            "no_hp" => $request->no_hp,
            "alamat" => $request->alamat,
            "role" => $request->role,
        ]);

        if($query){
            return response()->json(["callback" => 'success']);
        }else{
            return response()->json(["callback" => 'fail']);
        }
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
