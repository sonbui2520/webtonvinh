<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class matkhau_doilai extends Model
{
    protected $table = 'matkhau_doilais';
    protected $primaryKey = 'id_matkhau_doilai';
    protected $fillable=['email','matkhaucu','matkhaumoi'];
}
