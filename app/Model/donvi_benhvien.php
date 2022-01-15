<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class donvi_benhvien extends Model
{
    protected $table = 'donvi_benhviens';
    protected $primaryKey = 'id_donvi_benhvien';
    protected $fillable=['tendonvi'];
}
