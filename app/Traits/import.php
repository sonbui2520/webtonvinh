<?php
    namespace App\Traits;

use App\Imports\IPexceltonvinh1;
use App\Model\dottonvinh;
use App\Model\dsxulytonvinh;
use App\Model\Exceltonvinh;
use App\Model\nguoitonhvinh;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
trait import
    {
        public function importdl(Request $request)
        {
            $dottonvinh=dottonvinh::where("id",$request->id_dottonvinh)->get();
            $exceltonvinh=new Exceltonvinh();
            $exceltonvinh->tenexeltonvinh=$dottonvinh[0]->tendot_tonvinh." ".$request->vung;
            $exceltonvinh->ID_dot=$dottonvinh[0]->id;
            $exceltonvinh->ID_vung=$request->vung;
            $exceltonvinh->save();
            $path=$_FILES['filetonvinh']['tmp_name'];
            Excel::import(new IPexceltonvinh1, $path);
            $ID_exceltonvinh=$exceltonvinh->id_exceltonvinh;
            $nguoitonvinhs=nguoitonhvinh::where('ID_exeltonvinh',$ID_exceltonvinh)->where("loi",0)->get();
            $nguoitonvinh_loi=nguoitonhvinh::where('ID_exeltonvinh',$ID_exceltonvinh)->where("loi","!=",0)->get();
            return [$nguoitonvinhs,$nguoitonvinh_loi];
        }
        public function XuatTableExcel($datanguoitonvinh)
        {
            $count=count($datanguoitonvinh[0]);
            $count_loi=count($datanguoitonvinh[1]);
          $HTML=" <div class='col' id='tabletonvinh'>
                <div class='card'>
                    <div class='card-header' style='text-align: right'>
                        <button type='button' class='btn btn-primary' onclick='xoa()' >
                            x
                          </button>
                    </div>
                    <div class='card-header' style='text-align: center'>
                        <h4>Bảng danh sách vừa import</h4>
                        <h6>Số người vừa được import :  $count </h6>
                        <h6>Số người import lỗi :  $count_loi </h6>
                    </div>";

                 $html_table1="<div class='card-body'>
                        <table class='table' id='accountTable'>
                            <thead class='thead-dark'>
                              <tr>
                                <th scope='col' >ID</th>
                                <th scope='col'>Họ tên</th>
                                <th scope='col'>Ngày sinh</th>
                                <th scope='col'>Số điện thoại</th>
                                <th scope='col'>Địa chỉ</th>
                                <th scope='col'>Nhóm máu</th>
                                <th scope='col'>Nhóm RH</th>
                                <th scope='col'>Mức tôn vinh</th>
                                <th scope='col'>Số lần hiến</th>
                              </tr>
                            </thead>
                            <tbody>";
                                $i=0; $table1_tr="";
                                foreach ($datanguoitonvinh[0] as $item)
                            {
                                $i++;
                                $table1_tr .= "<tr>
                                    <th scope='row'> $i </th>
                                    <td> $item->hoten </td>
                                    <td> $item->ngaysinh </td>
                                    <td> $item->sodienthoai </td>
                                    <td> $item->diachi </td>
                                    <td> $item->nhommau </td>
                                    <td> $item->nhomRh </td>
                                    <td> $item->muctonvinh </td>
                                    <td> $item->solanhien </td>
                                </tr>";
                            }

                        $table1_cuoi=  "</tbody>
                          </table>
                    </div>";

                    $html_table2="<div class='card-body'>
                    <table class='table' id='accountTable'>
                        <thead class='thead-dark'>
                          <tr>
                            <th scope='col' >STT</th>
                            <th scope='col'>Thông tin lỗi</th>
                          </tr>
                        </thead>
                        <tbody>";
                            $i=0; $table2_tr="";
                            foreach ($datanguoitonvinh[1] as $item)
                        {
                            $i++;
                            $table2_tr .= "<tr>
                                <th scope='row'> $i </th>
                                <td>Dòng thứ $item->loi trong file excel không đúng định dạng improt</td>
                            </tr>";
                            nguoitonhvinh::where("id",$item->id)->delete();
                        }

                    $table2_cuoi=  "</tbody>
                      </table>
                </div>";

                $html_cuoi="<div class='container'>
                        <div class='row'>
                          <div class='col text-center' id='page'>

                          </div>
                        </div>
                      </div>
                </div>

            </div>";
            $table1=$html_table1.$table1_tr.$table1_cuoi;
            $table2=$html_table2.$table2_tr.$table2_cuoi;
            $html_than=$table1.$table2;

                return $HTML.$html_than.$html_cuoi;
        }
    }
?>
