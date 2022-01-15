<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/timkiem.css') }}" >
@extends('block.index')
@section('title')
    <title>Tìm kiếm</title>
@endsection
@section('title_page')
    Lịch sử tôn vinh
@endsection
@section('content')

<div class="container">
  <div class="icons">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
  </div>
</div>

<form action="{{ route('lichsutonvinh.xuliindex') }}" method="post">
    @csrf
    <div class="select">
        <select name="nam" class="form-select" aria-label="Default select example">

            <option value= "null" selected>--Năm--</option>

            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>

        </select>
         {{-- @foreach ($nguoitonvinhs as $item)
            <option value="{{ $item->id }}">{{ $item->created_at }}</option>
            @endforeach
        </select> --}}


        <input type="submit" name="btn-timkiem" class="btn btn-dark" value="Tìm kiếm">

      </div>
</form>

<hr  width="100%" align ="center" style="background-color: black; height: 3px;"  />
<div class='col' id='tablebenhvien'>
  <div class='card'>
      <div class='card-header' style='text-align: right'>
      </div>
      <div class='card-header' style='text-align: center'>
          <h4>Bảng lịch sử tôn vinh</h4>
      </div>

 <div class='card-body'>
          <table class='table' id='accountTable'>
              <thead class='thead-dark'>
      <tr>
        <th scope="col"> STT</th>
        <th scope="col"> Họ tên</th>
        <th scope="col"> Ngày sinh </th>
        <th scope="col"> Số điện thoại </th>
        <th scope="col"> Địa chỉ thường trú </th>
        <th scope="col"> Số lần đã hiến </th>
        <th scope="col"> Nhóm ABO	 </th>
        <th scope="col"> Nhóm Rh </th>
        <th scope="col"> Mức tôn vinh </th>

      </tr>
    </thead>
    <tbody>
        <?php $i=1;  ?>
        @foreach ($dsnguoitonhvinhs as $key=>$vla)
            <tr>
                <input type="hidden" name="id_nguoitonvinh" value="{{$dsnguoitonhvinhs[$key]->id}}">
                <th scope="row">{{ $i++ }}</th>
                <td>{{  $dsnguoitonhvinhs[$key]->hoten}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->sodienthoai}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->ngaysinh}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->diachi}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->solanhien}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->nhommau}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->nhomRh}}</td>
                <td>{{  $dsnguoitonhvinhs[$key]->newmuctonvinh}}</td>
              </tr>
        @endforeach
    </tbody>
  </table>
</div>
  @endsection
