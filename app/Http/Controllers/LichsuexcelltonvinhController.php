<?php

namespace App\Http\Controllers;

use App\Model\dottonvinh;
use App\Model\Exceltonvinh;
use App\Model\nguoihienmau;
use App\Model\nguoitonhvinh;
use App\Model\Vung;
use App\Traits\kiemduyet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\EPexceltonvinh;
use Illuminate\Support\Facades\Session;

class LichsuexcelltonvinhController extends Controller
{

    use kiemduyet;
    public function __construct()
    {
        if(!Session::get("user") != null)
        {
            return redirect()->route("taikhoan.login");
        }
    }
   public function index_kiemduyet()
   {
        $vungs=Vung::all();
        $dots= dottonvinh::orderBy('id', 'DESC')->get();
        $ds= DB::table('nguoitonhvinhs')->where('xetlan1',0)
        ->get()->toArray();
        $data = $this->formatdatatonvinh($ds);
        return view("page.kiemduyet",compact('vungs','dots','data'));
   }
   function getbyvungdot($id_vung,$id_dot)
   {
        $ds= $this->truyvanvungdot($id_dot,$id_vung);
        $data=$this->formatdatatonvinh($ds);
        $html=$this->htmltonvinh($data);
        return response()->json(['html'=>$html]);
   }
    public function xulyimport_one(Request $request)
    {
        DB::table('nguoitonhvinhs')->where('id',$request->id)
        ->update(['newmuctonvinh'=>$request->mucsetup,'xetlan1'=>1]);
        return response()->json(['id'=>$request->id]);
    }
    public function xulyimport_check(Request $request)
    {
        $arrcheckbox=explode(",",$request->arrcheckbox);
        $arropption=explode(",",$request->arropption);
        foreach ($arrcheckbox as $key => $value) {
            DB::table('nguoitonhvinhs')->where('id',$value)
            ->update(['newmuctonvinh'=>$arropption[$key],'xetlan1'=>1]);
        }
            return response()->json(['arrcheckbox'=>$arrcheckbox]);
    }
    public function xuatfileindex()
    {
        $dots= dottonvinh::orderBy('id', 'DESC')->get();
        $id_dot= dottonvinh::max("id");
       $sql ="SELECT nguoitonhvinhs.*
        FROM exceltonvinhs
            INNER JOIN dottonvinhs  ON dottonvinhs.id = exceltonvinhs.ID_dot
            INNER JOIN nguoitonhvinhs  ON nguoitonhvinhs.ID_exeltonvinh = exceltonvinhs.id
        WHERE dottonvinhs.id=$id_dot and nguoitonhvinhs.xetlan2 <> 0";
        $data= DB::select($sql);
        return view('xuatfiletonvinh', compact("dots",'data',"id_dot"));
    }
    public function tiemkiemxuatfiletonvinh(Request $request)
    {
        $id_dot=$request->id_dot;
        $dots= dottonvinh::orderBy('id', 'DESC')->get();

       $sql ="SELECT nguoitonhvinhs.*
        FROM exceltonvinhs
            INNER JOIN dottonvinhs  ON dottonvinhs.id = exceltonvinhs.ID_dot
            INNER JOIN nguoitonhvinhs  ON nguoitonhvinhs.ID_exeltonvinh = exceltonvinhs.id
        WHERE dottonvinhs.id=$id_dot and nguoitonhvinhs.xetlan2 <> 0";
        $data= DB::select($sql);
        return view('xuatfiletonvinh', compact("dots",'data',"id_dot"));
    }
    public function exporttonvinh($id_dot)
    {
       return Excel::download(new EPexceltonvinh($id_dot),'exportexceltonvinh.xlsx');
    }
    public function newdottonvinh(Request $request)
    {
        $namedottonvinh=dottonvinh::where("tendot_tonvinh",$request->uname)->get()->toArray();
        if(empty($namedottonvinh))
        {
            $dotonvinh= dottonvinh::create(
                [
                    "tendot_tonvinh"=>$request->uname,
                ]);
                return response()->json($dotonvinh);
        }
        else
         return response()->json(false);

    }

    public function kiemduyettonvinhlancuoi()
    {
        // lấy về id excel mới nhất
        $id_excel=Exceltonvinh::max('id');
        // lấy về ds người tôn vinh lần 1
        $ds=Db::table('nguoitonhvinhs')->where('xetlan1',1)->get();
        // updae nguoi ton vinh lan2= ngay tháng năm hiện tại
        $dateHT=getdate();
        $stringdate=$dateHT['mday']."/".$dateHT['mon']."/".$dateHT['year'];
        Db::table('nguoitonhvinhs')->where('xetlan1',1)->update(['xetlan2'=>$stringdate]);
        // update mức tôn vinh table nguoi hiến máu
        foreach ($ds as $key => $value) {
            // duyệt cập nhật mức tương ứng
            switch ($value->newmuctonvinh) {
                case 5:
                    nguoihienmau::where('hoten',$value->hoten)
                    ->where('ngaysinh',$value->ngaysinh)
                    ->where('nhommau',$value->nhommau)
                    ->update(["Muc_5"=>date_create()->format('Y-m-d H:i:s')]);
                    break;
                case 10:
                    nguoihienmau::where('hoten',$value->hoten)
                    ->where('ngaysinh',$value->ngaysinh)
                    ->where('nhommau',$value->nhommau)
                    ->update(["Muc_10"=>date_create()->format('Y-m-d H:i:s')]);
                break;
                case 15:
                    nguoihienmau::where('hoten',$value->hoten)
                    ->where('ngaysinh',$value->ngaysinh)
                    ->where('nhommau',$value->nhommau)
                    ->update(["Muc_15"=>date_create()->format('Y-m-d H:i:s')]);
                break;
                case 20:
                    nguoihienmau::where('hoten',$value->hoten)
                    ->where('ngaysinh',$value->ngaysinh)
                    ->where('nhommau',$value->nhommau)
                    ->update(["Muc_20"=>date_create()->format('Y-m-d H:i:s')]);
                break;
                case 30:
                    nguoihienmau::where('hoten',$value->hoten)
                    ->where('ngaysinh',$value->ngaysinh)
                    ->where('nhommau',$value->nhommau)
                    ->update(["Muc_30"=>date_create()->format('Y-m-d H:i:s')]);
                break;
                case 40:
                    nguoihienmau::where('hoten',$value->hoten)
                    ->where('ngaysinh',$value->ngaysinh)
                    ->where('nhommau',$value->nhommau)
                    ->update(["Muc_40"=>date_create()->format('Y-m-d H:i:s')]);
                break;
                default:
                    echo "Mức bạn cần update vượt quá 40";
                    die();
                    break;
            }
        }
        echo "<script type='text/javascript'>alert('Bạn đã lưu thành công');</script>";
        return redirect()->route("trangchu");
    }



}
