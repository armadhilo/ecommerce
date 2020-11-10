<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function change_password(){
        return view('change_password.change_password');
    }

    public function edit_profile(){
        return view('edit_profile.edit_profile');
    }

    public function actionChangePassword(Request $request){
        {
            $password = DB::table('users')->select('password')->where('id',session('id'))->first();
            if(Hash::check($request->old_pass, $password->password)){
                DB::table('users')->where('id',session('id'))->update([
                    "password" => Hash::make($request->new_pass),
                ]);

                return response()->json(["callback" => 'success']);
            }else{
                return response()->json(["callback" => 'password lama salah']);
            }
        }
    }
}
