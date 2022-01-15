<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class nguoitonhvinh extends Model
{
    protected $table = 'nguoitonhvinhs';
    protected $primaryKey = 'id_nguoitonhvinh';
    protected $fillable=[
    'ID_exeltonvinh',
    'hoten',
    'ngaysinh',
    'sodienthoai',
    'diachi',
    'nhommau',
    'nhomRh' ,
    'muctonvinh',
    'solanhien',];
    public static function getExport()
    {
        $data = DB::table('nguoitonhvinhs')->where("xetlan2","<>",0)->select('ID_exeltonvinh',
        'hoten','ngaysinh','sodienthoai','diachi','nhommau','nhomRh','muctonvinh','solanhien')-> get()->toArray();
         return $data;
    }
}
