<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/suatimkiem.css') }}" >

@extends('block.index')
@section('title')
    <title>Chỉnh sửa</title>
@endsection
@section('title_page')
    Sửa thông tin
@endsection
@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <form action="{{ route('timkiem.xulysuatimkiem') }}" method="post">
            @csrf
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thông tin người hiến máu</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Họ tên</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->hoten}}" name="hoten"></div>
                </div>
                <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Ngày sinh</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->ngaysinh}}" name="ngaysinh"></div>
                    <div class="col-md-12"><label class="labels">Nơi làm việc</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->noilamviec}}" name="noilamviec"></div>
                    <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->sodienthoai}}" name="sodienthoai"></div>
                    <div class="col-md-12"><label class="labels">Địa chỉ thường trú</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->diachi}}" name="diachi"></div>
                    <div class="col-md-12"><label class="labels">Số lần đã hiến</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->solanhien}}" name="solanhien"></div>
                    <div class="col-md-12"><label class="labels">Nhóm ABO</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->nhommau}}" name="nhommau"></div>
                    <div class="col-md-12"><label class="labels">Nhóm Rh</label><input type="text" class="form-control"  value="{{$nguoihienmaus[0]->nhomRh}}" name="nhomRh"></div>


                </div>
                <input type="hidden" value="{{$nguoihienmaus[0]->id}}" name="id">
                <div class="mt-5 text-center"><input type="submit" value="Sửa" class="btn btn-primary profile-button" ></div>
            </div>
        </div>
    </form>

    </div>
</div>
</div>
</div>
@endsection
