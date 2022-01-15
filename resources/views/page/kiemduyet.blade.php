<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/kiemduyet.css') }}" >
@extends('block.index')
@section('title')
    <title>Kiểm duyệt tôn vinh</title>
@endsection
@section('title_page')
Các đề xuất tôn vinh
@endsection
@section('content')
<meta name="csrf-token"  content="{{ csrf_token() }}" />
<div style="display:flex ">
    <div class="form-group col-3">
        <label for="selectvung">Vùng</label>
        <select class="form-control"  id="selectvung" onchange="getdsvung(this)">
            <option value="0">Tất cả</option>
            @foreach ($vungs as $item[0])
                <option value="{{ $item[0]->id }}">{{ $item[0]->tenkhuvuc }}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group col-3">
        <label for="selectdot">Đợt</label>
        <select class="form-control" id="selectdot" onchange="getdsdot(this)">
            <option value="0">Tất cả</option>
            @foreach ($dots as $item[0])
                <option value="{{ $item[0]->id }}">{{ $item[0]->tendot_tonvinh }}</option>
            @endforeach
        </select>
      </div>
</div>
<div class="col">
    <div class="card">
        <div class="card-header">
            <h4>Bảng danh sách tôn vinh</h4>
        </div>
        <div class="card-body">
            <table class="table" id="accountTable">
                <thead class="thead-dark">
                  <tr style="text-align: center">
                    <th scope="col" >ID</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Nhóm RH</th>
                    <th scope="col">Nhóm máu</th>
                    <th scope="col">Số lần hiến</th>
                    <th scope="col">Đề xuất</th>
                    <th scope="col">Đã tôn vinh</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody id="bodytabletonvinh">
                    <?php $i=1; ?>
                    @foreach ($data as $item)
                    <tr style="text-align: center" id="sid{{ $item[0]->id }}">
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $item[0]->hoten }}</td>
                        <td>{{ $item[0]->ngaysinh }}</td>
                        <td>{{ $item[0]->sodienthoai }}</td>
                        <td>{{ $item[0]->diachi }}</td>
                        <td>{{ $item[0]->nhomRh }}</td>
                        <td>{{ $item[0]->nhommau }}</td>
                        <td >{{ $item[0]->solanhien }}</td>
                        <td >
                            <div class="td_dexuat">
                             <select class="form-control select_dexuat"  id="selecttonvinh{{ $item[0]->id }}" >
                                @switch($item[0]->muctonvinh)
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
                               @switch($item[0]->mau)
                                   @case("yellow")
                                        <div class="nut_dexuat yellow"></div>
                                       @break
                                   @case("red")
                                        <div class="nut_dexuat red"></div>
                                       @break
                                    @case("green")
                                        <div class="nut_dexuat green"></div>
                                       @break
                                   @default

                               @endswitch

                            </div>
                            <td></td>
                        <td style="text-align: center">
                            <div class="form-check">
                                <input type="checkbox" name="checktonvinh" class="form-check-input" value="{{ $item[0]->id }}" >
                                <label class="form-check-label" for="exampleCheck1"></label>
                            </div>
                        </td>
                    </tr>
                    <tr style="text-align: center"  id="data{{ $item[0]->id }}">
                        <th scope="row" ><img src="https://www.svgrepo.com/show/22204/database.svg" alt="" srcset=""></th>
                        <td></td>
                        <td></td>
                        <td>{{ $item[1][0]['sodienthoai'] }}</td>
                        <td>{{ $item[1][0]['diachi']  }}</td>
                        <td>{{ $item[1][0]['nhomRh']  }}</td>
                        <td>{{ $item[1][0]['nhommau']  }}</td>
                        <td>{{ $item[1][0]['solanhien']  }}</td>
                        <td></td>
                        <td style="text-align: center">

                                 {{ $item[1][0]['stringdexuat'] }}

                        </td>
                        <td>

                            <input class="btn btn-primary" type="submit" onclick="applytonvinh({{ $item[0]->id }})" value="Apply">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="container">
            <div class="row">
              <div class="col text-center">
                <button type="submit" onclick="apply_check()"  class=" btn btn-primary btn-lg">Apply_check</button>
              </div>
            </div>
          </div>
          </div>
    </div>

</div>

@endsection
<script src="{{ asset('js/jquery-3.5.1.min.js') }}" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/popper1.12.9.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap4.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

    function applytonvinh(id)
    {
        var mucsetup=$('#selecttonvinh'+id+' :selected').text();
            var fromdata= new FormData();
            fromdata.append('id',id);
            fromdata.append('mucsetup',mucsetup);
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type: "POST",
                    url: " {{ route('kiemduyet.xulyimport_one') }} ",
                    data: fromdata,
                    contentType:false,
                    processData:false,
                    dataType: "JSON",
                    success: function (response)
                    {

                        $('#sid'+response.id).remove();
                        $('#data'+response.id).remove();

                    },
                    error: function(xhr)
                    {
                        console.log(xhr.responseText);
                    },
                });

    }
    function apply_check()
    {
        var checkbox = document.getElementsByName('checktonvinh');
                var result = "";
                var result_opption="";
                // Lặp qua từng checkbox để lấy giá trị
                for (var i = 0; i < checkbox.length; i++){
                    if (checkbox[i].checked === true){
                        if(result=="")
                        {
                            result += checkbox[i].value;
                            result_opption +=$('#selecttonvinh'+checkbox[i].value+' :selected').text();
                        }else
                        result += ","+checkbox[i].value ;
                        result_opption +="," +$('#selecttonvinh'+checkbox[i].value+' :selected').text();
                    }
                }
            var fromdata= new FormData();
            fromdata.append('arrcheckbox',result);
            fromdata.append("arropption",result_opption);
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type: "POST",
                    url: " {{ route('kiemduyet.xulyimport_check') }} ",
                    data: fromdata,
                    contentType:false,
                    processData:false,
                    dataType: "JSON",
                    success: function (response)
                    {
                        response.arrcheckbox.forEach(function(e){
                            $('#sid'+e).remove();
                            $('#data'+e).remove();
                        });


                    },
                    error: function(xhr)
                    {
                        console.log(xhr.responseText);
                    },
                });

    }

    function getdsvung(obj) {

            var selectdot=$('#selectdot').val();
            $.get("/kiemduyet/getbyvungdot/"+obj.value+"/"+selectdot,
                    function (ds) {
                        $("#bodytabletonvinh").children().remove();
                        $("#bodytabletonvinh").append(ds.html);
                    }
                );
    }
    function getdsdot(obj) {
        var selectvung=$('#selectvung').val();
            $.get("/kiemduyet/getbyvungdot/"+selectvung+"/"+obj.value,
                    function (ds) {
                        $("#bodytabletonvinh").children().remove();
                        $("#bodytabletonvinh").append(ds.html);
                    }
                );
    }

</script>
