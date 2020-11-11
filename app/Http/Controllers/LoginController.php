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
                $request->session()->put('id', $data->id);
                $request->session()->put('username', $data->username);
                $request->session()->put('nama', $data->nama);
                $request->session()->put('role', $data->role);

<<<<<<< HEAD
                return response()->json(['status' => 'success']);
    
=======
                    return response()->json(['status' => 'success']);
>>>>>>> 0cace2da4a08996f7ae1f4cb2e9f7dfca1652597
            }else{
                return response()->json(['status' => 'fail']);
            }
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    public function logout(Request $request){

        $request->session()->forget('username');
        $request->session()->forget('id');
		$request->session()->forget('nama');
		$request->session()->forget('role');
        
	    return redirect('/login')->with('success','Anda berhasil logout !');

	}
}
