<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;

class IPexceltonvinh implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        print_r($row);
        echo "<br>";
            // kiểm tra dữ liệu
            // if(is_int($row[0]))
            // DB::transaction(function(array $row)
            // {
            //     $ID_MAX_exceltonvinh= Exceltonvinh::max('id');
            //     $nguoitonvinh= new nguoitonhvinh([
            //         "hoten"=>$row[0],
            //         "ID_exeltonvinh"=>$ID_MAX_exceltonvinh,
            //         "ngaysinh"=>$row[1],
            //         'sodienthoai'=>$row[2],
            //         "diachi"=>$row[3],
            //         "nhommau"=>$row[4],
            //         "nhomRh"=>$row[5],
            //         "muctonvinh"=>$row[6],
            //         "solanhien"=>$row[7],
            //     ]);
            //     if( !$nguoitonvinh )
            //     {
            //         throw new \Exception('User not created for account');
            //     }
            // });


    }

}
