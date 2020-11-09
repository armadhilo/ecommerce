<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function change_password(){
        return view('change_password.change_password');
    }

    public function edit_profile(){
        return view('edit_profile.edit_profile');
    }
}
