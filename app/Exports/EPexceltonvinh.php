<?php

namespace App\Exports;
use App\Model\nguoitonhvinh;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class EPexceltonvinh implements FromView
{
    private $id_dot;
    public function __construct($id_dot)
    {
        $this->id_dot=$id_dot;
    }
  public function view(): View
  {
      $id_dot=$this->id_dot;
    $sql ="SELECT nguoitonhvinhs.*
            FROM exceltonvinhs
                INNER JOIN dottonvinhs  ON dottonvinhs.id = exceltonvinhs.ID_dot
                INNER JOIN nguoitonhvinhs  ON nguoitonhvinhs.ID_exeltonvinh = exceltonvinhs.id
            WHERE dottonvinhs.id=$id_dot and nguoitonhvinhs.xetlan2 <> 0";

      $data['list_tonvinh']= DB::select($sql);
      return view('page.fileexceltonvinh',$data);
  }
}
