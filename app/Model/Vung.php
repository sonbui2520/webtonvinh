<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vung extends Model
{
    protected $table = 'vungs';
    protected $primaryKey = 'id_vung';
    protected $fillable=['tenkhuvuc' ];
}
