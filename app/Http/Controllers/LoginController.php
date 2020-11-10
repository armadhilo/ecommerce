<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }


    public function action(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = DB::table('users')->where('username',$username)->first();

        if($data){
            if(Hash::check($password, $data->password)){
                $request->session()->put('username', $data->username);
                $request->session()->put('nama', $data->nama);
                $request->session()->put('role', $data->role);

                if($data->role == '2'){
                    return response()->json(['status' => 'success']);
                }
            }else{
                return response()->json(['status' => 'fail']);
            }
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    public function logout(Request $request){

		$request->session()->forget('username');
		$request->session()->forget('nama');
		$request->session()->forget('role');
        
	    return redirect('/login')->with('success','Anda berhasil logout !');

	}
}
