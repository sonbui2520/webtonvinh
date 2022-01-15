<?php

namespace App\Http\Controllers;
use App\Model\donvi_benhvien;
use App\Model\nguoihiennmau_benhvien;
use App\Traits\importbv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExcelbenhvienController extends Controller
{   
    use importbv;
    public function import_show(){
        $donvi_benhviens=donvi_benhvien::orderBy('id', 'DESC')->get();
        return view('improt_benhvien',compact('donvi_benhviens'));
    }
        public function newdonvibv(Request $request){
        $namedonvibenhvien=donvi_benhvien::where("tendonvi",$request->uname)->get()->toArray();
        if(empty($namedonvibenhvien))
        {
            $donvi_benhvien= donvi_benhvien::create(
                [
                    "tendonvi"=>$request->uname,
                ]);
                return response()->json($donvi_benhvien);
        }
        else
         return response()->json(false);
    }

    public function import_stores( Request $request){ 
        $nguoihiennmau_benhviens=$this->importdl($request);
        $html=$this->XuatTableExcel($nguoihiennmau_benhviens);
        return response()->json($html);
    }    
   
}
