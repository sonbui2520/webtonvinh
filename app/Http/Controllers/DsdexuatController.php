<?php

namespace App\Http\Controllers;

use App\sql\sql;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DsdexuatController extends Controller{
    public function __construct()
    {
        if(!Session::get("user") != null)
        {
            return redirect()->route("taikhoan.login");
        }
    }
    public function index(){
        $sqlds = new sql();
        $datadiachi = $sqlds->selectdistinct('diachi');
        $dsdexuats  = $sqlds->selectdsdexuat();
        return view('page.dsdexuat',compact('datadiachi','dsdexuats'));
    }
    public function xulyindex(Request $request){
        $sqlds = new sql();
        $diachi = $request -> diachi;
        $muc = $request -> muc;
        $datadiachi = $sqlds->selectdistinct('diachi');
        $dsdexuats = $sqlds->xulyselectdsdexuat($diachi,$muc);
        return view('page.dsdexuat',compact('datadiachi','dsdexuats'));

    }
    public function editdsdexuat(Request $request)
    {
        $muc = $request -> muc;
        $id_nguoitonvinh = $request -> id_nguoitonvinh;
        DB::update("UPDATE nguoitonhvinhs SET newmuctonvinh = $muc where id = $id_nguoitonvinh");
        return redirect()->route('dsdexuat.index');
        echo '<script language="javascript">alert("Đã sửa thành công");</script>';
    }
}
