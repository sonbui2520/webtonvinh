<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class dottonvinh extends Model
{
    protected $table = 'dottonvinhs';
    protected $primaryKey = 'id_dottonvinh';
    protected $fillable=['tendot_tonvinh'];
}
