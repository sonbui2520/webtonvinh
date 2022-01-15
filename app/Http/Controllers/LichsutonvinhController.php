<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LichsutonvinhController extends Controller{
    public function index(){
        // $nguoitonvinhs = nguoitonhvinh::all();
        $dsnguoitonhvinhs  = DB::select("SELECT  * FROM  nguoitonhvinhs WHERE xetlan2 != 0  ");
       return view('page.lichsutonvinh',compact('dsnguoitonhvinhs'));
    }
    public function xuliindex(Request $request){

         $nam = $request -> nam;

        if($nam == 'null'){
            $dsnguoitonhvinhs  = DB::select("SELECT  * FROM  nguoitonhvinhs WHERE xetlan2 != 0");
         }
        else{
             $dsnguoitonhvinhs  = DB::select("SELECT * FROM  nguoitonhvinhs WHERE YEAR(created_at) = $nam And xetlan2 != 0  And newmuctonvinh is not null ");
      }
        return view('page.lichsutonvinh',compact('dsnguoitonhvinhs','nam'));

    }

}
