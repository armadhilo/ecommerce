<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coba
 *
 * @author munil
 */
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helpers {
    
    public function autokode($depan, $kolom, $table) {
        $data = DB::select("select ifnull(MAX(substr(".$kolom.",2,5)),0) + 1 as jml from ".$table.";");
        $hasil = $data[0]->jml;
        if(strlen($hasil) == 1){
            $hasil = $depan. "0000" .$hasil;
        }else if(strlen($hasil) == 2){
            $hasil = $depan ."000". $hasil;
        }else if(strlen($hasil) == 3){
            $hasil = $depan. "00".$hasil;
        }else if(strlen($hasil) == 4){
            $hasil = $depan. "0".$hasil;
        }
        return $hasil;
    }
    
    public function TanggalWaktu() {
        date_default_timezone_set("Asia/Jakarta");
        return date("Y-m-d H:i:s");
    }
    
    public function getAll($table) {
        $hasil = DB::table($table)->get();
        return $hasil;
    }
    
     public function getAllQ($query) {
        $hasil = DB::select($query);
        return $hasil;
    }
    
    public function simpan($table, $data) {
        $simpan = DB::table($table)->insert($data);
        return $simpan;
    }
    
    public function update($table, $data, $kondisi) {
        $update = DB::table($table)->where($kondisi)->update($data);
        return $update;
    }
    
    public function hapus($table, $kondisi) {
        $hapus = DB::table($table)->where($kondisi)->delete();
        return $hapus;
    }
}
