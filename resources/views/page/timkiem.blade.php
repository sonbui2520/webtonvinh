<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/timkiem.css') }}" >

@extends('block.index')
@section('title')
    <title>Tìm kiếm</title>
@endsection
@section('title_page')
    Tìm kiếm
@endsection
@section('content')

<div class="container">
  <div class="icons">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
  </div>
</div>

<form action="{{ route('timkiem.xulitimkiem') }}" method="post">
    @csrf
    <div class="select">
        <select name="diachi" class="form-select" aria-label="Default select example">
            <option value= "null" selected>--Địa chỉ--</option>
          @foreach ($datadiachi as $key => $val)
            <option value="{{  $datadiachi[$key]->diachi }}">{{  $datadiachi[$key]->diachi }}</option>
          @endforeach
        </select>
        <select name="solanhien" class="form-select" aria-label="Default select example">
          <option value= "null" selected>--Số lần hiến máu--</option>
          @foreach ($datasolanhien as $key => $val)
            <option value="{{ $datasolanhien[$key]->solanhien }}">{{ $datasolanhien[$key]->solanhien }}</option>
          @endforeach
        </select>
        <select name="nhommau" class="form-select" aria-label="Default select example">
          <option value= "null" selected>--Nhóm máu--</option>
          @foreach ($datanhommau as $key => $val)
            <option value="{{ $datanhommau[$key]->nhommau }}">{{ $datanhommau[$key]->nhommau }}</option>
          @endforeach
        </select>

          <input type="text" class="form-select" value= "" name="hovaten" placeholder="Họ và tên" >

      </div>
      <div class="select1">
        <span  class="span-select1">Sắp xếp hiển thị:
          <select name="kieuhienthi" class="form-select1" aria-label="Default select example">
            <option value="const" selected>--Kiểu hiển thị--</option>
            <option value="AZ">A đến Z</option>
            <option value="ZA">Z đến A</option>
          </select>
        </span>

        <div  class="form-check">
          <input class="form-check-input" type="radio" name ="checkbox" value="tonvinh" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Tôn vinh
          </label>
        </div>

        <div  class="form-check">
          <input class="form-check-input" type="radio" name ="checkbox" value="chuatonvinh" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Chưa tôn vinh
          </label>
        </div>

        <input type="submit" name="btn-timkiem" class="btn btn-dark" value="Tìm kiếm">

      </div>
</form>
<div style="margin: 0 0%">
    <hr  width="100%" align="center" style="background-color: black; height: 3px;"  />

    <table style="table-layout: auto; font-size: 110%" class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">   Họ tên</th>
            <th scope="col"> Ngày sinh </th>
            <th scope="col"> Nơi làm việc </th>
            <th scope="col"> Số điện thoại </th>
            <th scope="col"> Địa chỉ thường trú </th>
            <th scope="col"> Số lần đã hiến </th>
            <th scope="col"> Nhóm ABO	 </th>
            <th scope="col"> Nhóm Rh </th>
            {{-- <th scope="col"> Đề xuất tôn vinh </th>
            <th scope="col"> Đã tôn vinh </th> --}}
            <th scope="col"> Sửa </th>


        </tr>
        </thead>
        <tbody>
            @foreach ($nguoihienmaus as $key => $val)
                <tr>
                    <th scope="row">{{  $nguoihienmaus[$key]->hoten}}</th>
                    <td>{{  $nguoihienmaus[$key]->ngaysinh}}</td>
                    <td>{{  $nguoihienmaus[$key]->noilamviec}}</td>
                    <td>{{  $nguoihienmaus[$key]->sodienthoai}}</td>
                    <td>{{  $nguoihienmaus[$key]->diachi}}</td>
                    <td>{{  $nguoihienmaus[$key]->solanhien}}</td>
                    <td>{{  $nguoihienmaus[$key]->nhommau}}</td>
                    <td>{{  $nguoihienmaus[$key]->nhomRh}}</td>
                    {{-- <td>{{  $nguoihienmaus[$key]->hoten}}</td>
                    <td>{{  $nguoihienmaus[$key]->hoten}}</td> --}}
                    <td> <a href="{{ route('timkiem.timkiemedit', ['id'=>$nguoihienmaus[$key]->id]) }}">Sửa</a></td>


                </tr>
            @endforeach


        </tbody>
    </table>

</div>


  {{-- Chỉnh sửa tài khoản --}}



  @endsection
