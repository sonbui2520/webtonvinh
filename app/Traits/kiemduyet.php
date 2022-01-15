<?php
namespace App\Traits;

use App\Model\nguoihienmau;
use Illuminate\Support\Facades\DB;

trait kiemduyet
{
    public function formatdatatonvinh($ds)
    {
        $data=[];
        foreach ($ds as $item) {
            $dl=nguoihienmau::where('hoten',$item->hoten)
            ->where('ngaysinh',$item->ngaysinh)
            ->where('nhommau',$item->nhommau)->get()->toArray();
            if(count($dl)>0) $data[]=[$item,$dl];
        };
        $i=0;
        foreach ($data as $item) {
            $mau="";$maxmuc=0;$string="";$denghi=$item[0]->muctonvinh;$solanhien=$item[1][0]['solanhien'];
            $muc=[ 5=>$item[1][0]['Muc_5'],10=>$item[1][0]['Muc_10'],15=>$item[1][0]['Muc_15'],
            20=>$item[1][0]['Muc_20'],30=>$item[1][0]['Muc_30'],40=>$item[1][0]['Muc_40'],50=>$item[1][0]['Muc_50']
            ,60=>$item[1][0]['Muc_60'],70=>$item[1][0]['Muc_70'],80=>$item[1][0]['Muc_80'],90=>$item[1][0]['Muc_90']
           ];
           foreach ($muc as $key => $value) {
            if($value!=null)
            {
                if($string=="") $string.=$key; else
                $string.=','.$key;
                $maxmuc=$key;
            }
            else break;
        }
        // $denghi=15;$solanhien=14;$maxmuc=10;
        if($denghi<=$solanhien && $maxmuc<$denghi)
        {
            if($maxmuc<20) $maxmuc1=$maxmuc+5;else $maxmuc1=$maxmuc+10;
            if($maxmuc1<$denghi) $mau="yellow";else $mau="green";
        }
        if($maxmuc>=$denghi || $denghi>$solanhien) $mau="red";
        // them vào mảng

            $data[$i][0]->mau=$mau;
            $data[$i][1][0]['stringdexuat']=$string;
            $i++;
        }
        return $data;


    }


    public function htmltonvinh($data)
    {
        $html="";
        $i=0;
        foreach ($data as $item)
        {
            $i++;
            // người tôn vinh
            $id_tonvinh=$item[0]->id;
            $hoten_tonvinh=$item[0]->hoten;
            $ngaysinh_tonvinh=$item[0]->ngaysinh;
            $sdt_tonvinh=$item[0]->sodienthoai;
            $diachi_tonvinh=$item[0]->diachi ;
            $nhomRH_tonvinh=$item[0]->nhomRh;
            $nhommau_tonvinh=$item[0]->nhommau;
            $solanhien_tonvinh=$item[0]->solanhien;
            $muctonvinh=$item[0]->muctonvinh;
            $selecttonvinh=$this->htmlMuctonvinh($muctonvinh);
            $mau=$item[0]->mau;
            $htmlmau=$this->mauTonvinh($mau);

            //nguoi hienmau
            $sdt_hienmau=$item[1][0]['sodienthoai'];
            $diachi_hienmau= $item[1][0]['diachi'];
            $nhomRh_hienmau=$item[1][0]['nhomRh'];
            $nhommau_hienmau=$item[1][0]['nhommau'];
            $solanhien_hienmau=$item[1][0]['solanhien'] ;
            $dexuat=$item[1][0]['stringdexuat'];
            $html.=
       " <tr style='text-align: center' id='sid$id_tonvinh'>
            <th scope='row'> $i </th>
            <td>$hoten_tonvinh</td>
            <td> $ngaysinh_tonvinh</td>
            <td>$sdt_tonvinh</td>
            <td>$diachi_tonvinh</td>
            <td>$nhomRH_tonvinh</td>
            <td> $nhommau_tonvinh</td>
            <td > $solanhien_tonvinh</td>
            <td >
                <div class='td_dexuat'>
                 <select class='form-control select_dexuat'  id='selecttonvinh$id_tonvinh' >
                        $selecttonvinh
                   </select>

                    $htmlmau



                </div>
                <td></td>
            <td style='text-align: center'>
                <div class='form-check'>
                    <input type='checkbox' name='checktonvinh' class='form-check-input' value='$id_tonvinh' >
                    <label class='form-check-label' for='exampleCheck1'></label>
                </div>
            </td>
        </tr>
        <tr style='text-align: center'  id='data$id_tonvinh'>
            <th scope='row' ><img src='https://www.svgrepo.com/show/22204/database.svg' alt='' srcset=''></th>
            <td></td>
            <td></td>
            <td>$sdt_hienmau</td>
            <td>$diachi_hienmau</td>
            <td>$nhomRh_hienmau</td>
            <td>$nhommau_hienmau</td>
            <td>$solanhien_hienmau</td>
            <td></td>
            <td style='text-align: center'>

                $dexuat

            </td>
            <td>
                <input class='btn btn-primary' type='submit' onclick='applytonvinh($id_tonvinh)' value='Apply'>
            </td>
        </tr>
       ";

        }
        return $html;
    }
    private function htmlMuctonvinh($muctonvinh)
    {
        switch ($muctonvinh) {
            case 5:
                return " <option selected=true>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>30</option>";
            case 10:
                return "<option >5</option>
                        <option selected=true>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>30</option>";
            case 15:
                return "<option >5</option>
                        <option >10</option>
                        <option selected=true>15</option>
                        <option>20</option>
                        <option>30</option>";
            case 20:
                return " <option >5</option>
                        <option >10</option>
                        <option >15</option>
                        <option selected=true>20</option>
                        <option>30</option>";
            case 30:
                return "  <option >5</option>
                            <option >10</option>
                            <option >15</option>
                            <option >20</option>
                            <option selected=true>30</option>";
            default:
                break;
        }
    }
    private function mauTonvinh($mau)
    {
        switch ($mau) {
            case 'yellow':
                return "<div class='nut_dexuat yellow'></div>";
            case "red" :
                return " <div class='nut_dexuat red'></div>";
            case "green":
                return " <div class='nut_dexuat green'></div>";


            default:
                break;
        }
    }
    public function truyvanvungdot($id_dot,$id_vung)
    {
        if($id_dot ==0 && $id_vung==0)
        {
            $ds=DB::table('exceltonvinhs')
            ->join("nguoitonhvinhs",'nguoitonhvinhs.ID_exeltonvinh','=',"exceltonvinhs.id")
            ->where('xetlan1',0)
            ->get()->toArray();
        }
        if($id_dot !=0 && $id_vung!=0)
        {

            $ds=DB::table('exceltonvinhs')->where('ID_vung',$id_vung)->where('ID_dot',$id_dot)
            ->join("nguoitonhvinhs",'nguoitonhvinhs.ID_exeltonvinh','=',"exceltonvinhs.id")
            ->where('xetlan1',0)
            ->get()->toArray();
        }
        if($id_dot !=0 && $id_vung==0)
        {

            $ds=DB::table('exceltonvinhs')->where('ID_dot',$id_dot)
            ->join("nguoitonhvinhs",'nguoitonhvinhs.ID_exeltonvinh','=',"exceltonvinhs.id")
            ->where('xetlan1',0)
            ->get()->toArray();
        }
        if($id_dot ==0 && $id_vung!=0)
        {

            $ds=DB::table('exceltonvinhs')->where('ID_vung',$id_vung)
            ->join("nguoitonhvinhs",'nguoitonhvinhs.ID_exeltonvinh','=',"exceltonvinhs.id")
            ->where('xetlan1',0)
            ->get()->toArray();
        }
        return $ds;
    }

}
?>
