<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class exel_benhvien extends Model
{
    protected $table = 'exel_benhviens';
    protected $primaryKey = 'id_exel_benhvien';
    protected $fillable=['tenexelbenhvien','ID_donvibenhvien'];
}
