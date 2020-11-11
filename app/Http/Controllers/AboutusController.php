<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class AboutusController extends Controller
{
    public function index(){
        return view('about_us.about_us');
    }

    public function contact_us(){
        return view('about_us.contact_us');
    }

}
