<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exceltonvinh extends Model
{
    protected $table = 'exceltonvinhs';
    protected $primaryKey = 'id_exceltonvinh';
    protected $fillable=['tenexeltonvinh','ID_dot','ID_vung'];
}
