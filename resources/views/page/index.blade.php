<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/timkiem.css') }}" >

@extends('block.index')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('title_page')
    Xin chào, {{ Session::get("user")[0]->Hoten }}
@endsection
@section('content')

<img style="    position: relative;
margin-top: -57px;
margin-left: -82px;
z-index: 1;
width: 114.5%;
max-height: 100%;" src="https://thumbs.dreamstime.com/z/medicine-doctor-touching-electronic-medical-record-tablet-dna-digital-healthcare-network-connection-hologram-modern-virtual-154742526.jpg" alt="">

@endsection
