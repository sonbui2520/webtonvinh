<?php

namespace App\Imports;
use App\Model\exel_benhvien;
use App\Model\nguoihiennmau_benhvien;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class Import_model implements ToCollection
{

    public function collection(Collection $rows)
    {
         $ID_MAX_excelbenhvien = exel_benhvien::max('id');
         foreach ($rows as  $row)
        {
            $data_string=[$row[0],$row[1],$row[2],$row[3],$row[4],$row[6],$row[7]];
            $data_int=[$row[5]];
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
                 $nguoihien_maubenhvien = new nguoihiennmau_benhvien();
                 $nguoihien_maubenhvien->hoten=$row[0];
                 $nguoihien_maubenhvien->ngaysinh=$row[1];
                 $nguoihien_maubenhvien->noilamviec=$row[2];
                 $nguoihien_maubenhvien->sodienthoai=$row[3];
                 $nguoihien_maubenhvien->diachi=$row[4];
                 $nguoihien_maubenhvien->solanhien=$row[5];
                 $nguoihien_maubenhvien->nhommau=$row[6];
                 $nguoihien_maubenhvien->nhomRh=$row[7];
                 $nguoihien_maubenhvien->ID_exelbenhvien=$ID_MAX_excelbenhvien;
                 $nguoihien_maubenhvien->save();
            }

            else
            {
                $nguoihien_maubenhvien= new nguoihiennmau_benhvien();
                $nguoihien_maubenhvien->hoten="";
                $nguoihien_maubenhvien->ngaysinh="";
                $nguoihien_maubenhvien->noilamviec="";
                $nguoihien_maubenhvien->sodienthoai="";
                $nguoihien_maubenhvien->diachi="";
                $nguoihien_maubenhvien->solanhien=0;
                $nguoihien_maubenhvien->nhommau="";
                $nguoihien_maubenhvien->nhomRh="";
                $nguoihien_maubenhvien->ID_exelbenhvien=$ID_MAX_excelbenhvien;
                $nguoihien_maubenhvien->save();
            }

         }
    }
}
