<?php
    namespace App\Traits;

use App\Imports\Import_model;
use App\Model\donvi_benhvien;
use App\Model\exel_benhvien;
use App\Model\nguoihiennmau_benhvien;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
trait importbv
    {
        public function importdl(Request $request)
        {
            $donvi_benhvien=donvi_benhvien::where("id",$request->id_donvi_benhvien)->get();
            $exel_benhviens=new exel_benhvien();
            $exel_benhviens->tenexelbenhvien=$donvi_benhvien[0]->tendonvi;
            $exel_benhviens->ID_donvibenhvien=$donvi_benhvien[0]->id;
            $exel_benhviens->save();
            $path=$_FILES['filebenhvien']['tmp_name'];
            Excel::import(new Import_model, $path);
            $ID_exelbenhvien=$exel_benhviens->id_exel_benhvien;
            return [$ID_exelbenhvien];

        }

        public function XuatTableExcel($databenhvien)
        {
            $count=count($databenhvien[0]);
            $count_loi=count($databenhvien[1]);
          $HTML="<div class='col' id='tablebenhvien'>
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
                                <th scope='col'>Nơi làm việc</th>
                                <th scope='col'>Số điện thoại</th>
                                <th scope='col'>Địa chỉ</th>
                                <th scope='col'>Số lần hiến</th>
                                <th scope='col'>Nhóm máu</th>
                                <th scope='col'>Nhóm RH</th>

                              </tr>
                            </thead>
                            <tbody>";
                                $i=0; $table1_tr="";
                                foreach ($databenhvien[0] as $item)
                            {
                                $i++;
                                $table1_tr .= "<tr>
                                    <th scope='row'> $i </th>
                                    <td> $item->hoten </td>
                                    <td> $item->ngaysinh </td>
                                    <td> $item->noilamviec </td>
                                    <td> $item->sodienthoai </td>
                                    <td> $item->diachi </td>
                                    <td> $item->solanhien </td>
                                    <td> $item->nhommau </td>
                                    <td> $item->nhomRh </td>
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
                            foreach ($databenhvien[1] as $item)
                        {
                            $i++;
                            $table2_tr .= "<tr>
                                <th scope='row'> $i </th>
                                <td>Dòng thứ $item->loi trong file excel không đúng định dạng improt</td>
                            </tr>";
                            nguoihiennmau_benhvien::where("id",$item->id)->delete();
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
