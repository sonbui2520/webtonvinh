<?php
namespace App\Imports;

use App\Model\Exceltonvinh;
use App\Model\nguoitonhvinh;
use App\Model\Vung;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class IPexceltonvinh1 implements ToCollection
{
    public function collection(Collection $rows)
    {
        $ID_MAX_exceltonvinh= Exceltonvinh::max('id');
        foreach ($rows as $key=> $row)
        {
            $data_string=[$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]];
            $data_int=[$row[6],$row[7]];
           $bollen= array_map(function($data_int){
                if(!is_int($data_int))
                {
                    return $data_int;
                }
            },$data_int);
            $bollen1= array_map(function($data_string){
                if(!is_string($data_string))
                {
                    return $data_string;

                }
            },$data_string);
           if($bollen[0]==null && $bollen1[0]== null)
           {
                $nguoitonvinh= new nguoitonhvinh();
                $nguoitonvinh->hoten=$row[0];
                $nguoitonvinh->ID_exeltonvinh=$ID_MAX_exceltonvinh;
                $nguoitonvinh->ngaysinh=$row[1];
                $nguoitonvinh->sodienthoai=$row[2];
                $nguoitonvinh->diachi=$row[3];
                $nguoitonvinh->nhommau=$row[4];
                $nguoitonvinh->nhomRh=$row[5];
                $nguoitonvinh->muctonvinh=$row[6];
                $nguoitonvinh->solanhien=$row[7];
                $nguoitonvinh->save();
           }
           else
           {
                $nguoitonvinh= new nguoitonhvinh();
                $nguoitonvinh->hoten="";
                $nguoitonvinh->ID_exeltonvinh=$ID_MAX_exceltonvinh;
                $nguoitonvinh->ngaysinh="";
                $nguoitonvinh->sodienthoai="";
                $nguoitonvinh->diachi="";
                $nguoitonvinh->nhommau="";
                $nguoitonvinh->nhomRh="";
                $nguoitonvinh->muctonvinh=0;
                $nguoitonvinh->solanhien=0;
                $nguoitonvinh->loi=$key+1;
                $nguoitonvinh->save();
           }

        }
    }
}
?>
