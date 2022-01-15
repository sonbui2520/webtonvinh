<?php

namespace App\Http\Controllers;

use App\Model\dottonvinh;
use App\Model\Vung;
use App\Traits\import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExceltonvinhController extends Controller
{
    use import;
    public function __construct()
    {
        if(!Session::get("user") != null)
        {
            return redirect()->route("taikhoan.login");
        }
    }
    public function index_tonvinh()
    {
        $vungs=Vung::all();
        $dottonvinhs=dottonvinh::orderBy('id', 'DESC')->get();
        return view('page.imprort_tonvinh',compact('vungs','dottonvinhs'));
    }
    public function xuly_tonvinh(Request $request)
    {
        $nguoitonvinhs=$this->importdl($request);
        $html=$this->XuatTableExcel($nguoitonvinhs);
        return response()->json($html);
    }


    public function xuat_tonvinh(Request $request)
    {

        // $path = $request->file('file')->getRealPath();
        // Excel::import(new IPexceltonvinh, $path,"hau");
        // return back();

    }

}
