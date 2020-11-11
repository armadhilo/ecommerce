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
        $list = DB::table('users_log as a')
                    ->join('users as b', 'a.users_id', '=', 'b.id')
                    ->join('product as c', 'a.product_id', '=', 'c.id')
                    ->select('a.*', 'b.username','b.nama', 'c.product_name')
                    ->orderByDesc('id')->get();

        foreach ($list as $row) {
            $val = array();
            $val[] = $row->username;
            $val[] = $row->nama;
            $val[] = $row->action;
            $val[] = $row->product_name;
            $val[] = $row->created_at;
            $val[] = $row->updated_at;
            $data[] = $val;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

}
