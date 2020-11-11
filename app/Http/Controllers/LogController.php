<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class LogController extends Controller
{
    public function index(){
        return view('log.log');
    }

    public function list() {
        $data = array();
        $list = DB::table('users_log')->orderByDesc('id')->get();

        foreach ($list as $row) {
            $val = array();
            $val[] = $row->category_name;
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

}
