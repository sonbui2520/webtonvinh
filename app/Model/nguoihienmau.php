<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class nguoihienmau extends Model
{
    protected $table = 'nguoihienmaus';
    protected $primaryKey = 'id_nguoihienmau';
    protected $fillable=[
    'hoten',
    'ngaysinh',
    'noilamviec',
    'sodienthoai',
    'diachi',
    'solanhien',
    'nhommau',
    'nhomRh',
    'Muc_5',
    'Muc_10',
    'Muc_15',
    'Muc_20',
    'Muc_30',
    'Muc_40',
    'Muc_50',
    'Muc_60',
    'Muc_70',
    'Muc_80',
    'Muc_90' ];
}
