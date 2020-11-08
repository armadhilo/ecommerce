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
                    redirect('admin/dashboard');
                }
            }else{
                return redirect('/login')->with('error','email / password anda salah 1');
            }
        }else{
            return redirect('/login')->with('error','email / password anda salah 2');
        }
    }
}
