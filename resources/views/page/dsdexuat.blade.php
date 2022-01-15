<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/timkiem.css') }}" >

@extends('block.index')
@section('title')
    <title>DANH SÁCH CÁC ĐỀ XUẤT TÔN VINH</title>
@endsection
@section('title_page')
    DANH SÁCH ĐỀ XUẤT
@endsection
@section('content')

<h1 style="display: flex;justify-content: center">DANH SÁCH CÁC ĐỀ XUẤT TÔN VINH</h1>

<form action="{{ route('dsdexuat.xuliindex') }}" method="post">
    @csrf
    <div style="margin-right: -35px; display: flex;justify-content: center" class="select">
        <select style="margin-right: 10px" name="diachi" class="form-select" aria-label="Default select example">
            <option value= "null" selected>--Địa chỉ--</option>
            @foreach ($datadiachi as $key => $vla)
                <option value="{{ $datadiachi[$key]->diachi }}">{{ $datadiachi[$key]->diachi }}</option>
            @endforeach

        </select>
        <select  name="muc" class="form-select" aria-label="Default select example">
            <option value= "null" selected>--Chọn mức--</option>
            <option value="5">Mức 5 </option>
            <option value="10">Mức 10 </option>
            <option value="15">Mức 15 </option>
            <option value="20">Mức 20 </option>
            <option value="30">Mức 30 </option>
            <option value="40">Mức 40 </option>
            <option value="50">Mức 50 </option>
            <option value="60">Mức 60 </option>
            <option value="70">Mức 70 </option>
            <option value="80">Mức 80 </option>
            <option value="90">Mức 90 </option>
        </select>

      </div>
      <p style="display: flex;justify-content: center">Tổng: {{ count($dsdexuats) }}</p>
      <div style="display: flex;justify-content: center" class="select">
        <input type="submit" name="btn-timkiem" class="btn btn-dark" value="Tìm kiếm">
      </div>




    </div>
</form>
<div style="margin: 0 5%">
    <hr  width="100%" align="center" style="background-color: black; height: 3px;"  />

     <table style="table-layout: auto; font-size: 110%" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> Stt</th>
        <th scope="col"> Họ tên</th>
        <th scope="col"> Ngày sinh </th>
        <th scope="col"> Nơi làm việc </th>
        <th scope="col"> Số điện thoại </th>
        <th scope="col"> Địa chỉ thường trú </th>
        <th scope="col"> Số lần đã hiến </th>
        <th scope="col"> Nhóm ABO </th>
        <th scope="col"> Nhóm Rh </th>
        <th scope="col"> Đã tôn vinh mức </th>
        <th scope="col"> Mức tôn vinh </th>
        <th scope="col"> Sửa </th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1;  ?>

        @foreach ($dsdexuats as $key=>$vla)
<form action="{{ route('dsdexuat.editdsdexuat')}}" method="post">
        @csrf
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <input type="hidden" name="id_nguoitonvinh" value="{{$dsdexuats[$key]->id}}">
                <td>{{  $dsdexuats[$key]->ngaysinh}}</td>
                <td>{{  $dsdexuats[$key]->hoten}}</td>
                <td>{{  $dsdexuats[$key]->noilamviec}}</td>
                <td>{{  $dsdexuats[$key]->sodienthoai}}</td>
                <td>{{  $dsdexuats[$key]->diachi}}</td>
                <td>{{  $dsdexuats[$key]->solanhien}}</td>
                <td>{{  $dsdexuats[$key]->nhommau}}</td>
                <td>{{  $dsdexuats[$key]->nhomRh}}</td>
            <td>

                <?php
                    $m5 = $dsdexuats[$key]->Muc_5 ;
                    $m10 = $dsdexuats[$key]->Muc_10 ;
                    $m15 = $dsdexuats[$key]->Muc_15 ;
                    $m20 = $dsdexuats[$key]->Muc_20 ;
                    $m30 = $dsdexuats[$key]->Muc_30 ;
                    $m40 = $dsdexuats[$key]->Muc_40;
                    $m50 = $dsdexuats[$key]->Muc_50;
                    $m60 = $dsdexuats[$key]->Muc_60;
                    $m70 = $dsdexuats[$key]->Muc_70;
                    $m80 = $dsdexuats[$key]->Muc_80;
                    $m90 = $dsdexuats[$key]->Muc_90;
                    $m = ['5'=>$m5,'10'=>$m10,'15'=>$m15,'20'=>$m20,'30'=>$m30,'40'=>$m40,'50'=>$m50,'60'=>$m60,'70'=>$m70,'80'=>$m80,'90'=>$m90];
                    foreach($m as $k => $v){
                        if($m[$k] != '')
                        echo "[$k]  ";
                    }
                ?>

            </td>
            <td>
                <select name="muc" class="form-select" aria-label="Default select example">
                    @switch($dsdexuats[$key]->newmuctonvinh)
                    @case(5)
                        <option selected=true>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>30</option>
                        @break
                    @case(10)
                        <option >5</option>
                        <option selected=true>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>30</option>
                        @break
                    @case(15)
                        <option >5</option>
                        <option >10</option>
                        <option selected=true>15</option>
                        <option>20</option>
                        <option>30</option>
                        @break
                    @case(20)
                        <option >5</option>
                        <option >10</option>
                        <option >15</option>
                        <option selected=true>20</option>
                        <option>30</option>
                        @break
                    @case(30)
                        <option >5</option>
                        <option >10</option>
                        <option >15</option>
                        <option >20</option>
                        <option selected=true>30</option>
                        @break
                    @default
                    @endswitch
                </select>
            </td>
            <td> <input type="submit" class="btn btn-dark"  value="Edit"></td>
        </tr>
        </form>
        @endforeach
    </tbody>
  </table>
  <div style="margin-left: 5%; padding-bottom: 5%" class="select">
    <a href="{{ route('kiemduyet.kiemduyettonvinhlancuoi') }}" onClick="confirm('Bạn chắc chắn muốn lưu thông tin không?')" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Lưu danh sách đề xuất</a>
</div>
</div>
</div>
  @endsection
