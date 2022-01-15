<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/importtonvimh.css') }}" >
@extends('block.index')
@section('title')
    <title>Import Tôn vinh</title>
@endsection
@section('title_page')
IMPORT CÁC ĐỀ NGHỊ TÔN VINH
@endsection
@section('content')
    {{-- import --}}

    <meta name="csrf-token"  content="{{ csrf_token() }}" />
    <form  id="formimporrtonvinhs" class="select1" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- đợt tôn vinh --}}
    <div style=" position: absolute;margin-top: -106px;margin-right: -70%;">
        <span>Đợt:</span>
          <select id="dottonvinh" name="id_dottonvinh" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
              @foreach ($dottonvinhs as $item)
              <option  value="{{ $item->id }}">{{ $item->tendot_tonvinh }}</option>
              @endforeach
            </select>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +New Đợt
          </button>
      </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="span-select1" style="padding: 5">Địa điểm:
          </span>
          <select name="vung" class="form-control">
              @foreach ($vungs as $item)
              <option value="{{ $item->id }}">{{ $item->tenkhuvuc }}</option>
              @endforeach
          </select>
        </div>
        <input type="file" class="btn btn-secondary" id="filetonvinh" name="filetonvinh" accept=".xlsx" value="IMPORT">
        <button type="submit" class="btn btn-secondary"   >View</button>
      </div>
    </form>

        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Tạo mới đợt tôn vinh</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                 {{-- dư liệu --}}
                 <form id="formtonvinh" class="was-validated">
                  @csrf
                  <meta name="_token" content="{{ csrf_token() }}">
                    <div class="form-group">
                      <label for="uname">Tên đợt tôn vinh:</label>
                      <input type="text" class="form-control" id="uname" placeholder="Tên đợt" name="uname" required>
                      <div class="valid-feedback">Đúng.</div>
                      <div class="invalid-feedback">Bạn vui lòng nhập tên đợt tôn vinh.</div>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Ngày</label>
                      <input type="datetime-local"  class="form-control" id="pwd" name="pswd" readonly>
                      <script type="text/javascript">
                        var now = new Date();
                        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                        document.getElementById('pwd').value = now.toISOString().slice(0,16);
                      </script>
                    </div>
                    <button type="submit" class="btn btn-primary" >Tạo</button>
                  </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>


    {{-- danh sách --}}
   <div id=tableexcel></div>
@endsection

<script src="{{ asset('js/jquery-3.5.1.min.js') }}" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/popper1.12.9.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap4.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
  // convert selects already on the page at dom load
  $('select.form-control').combobox();

  $('#it').click(function(e){
    $('ul.dropdown-menu').toggle();
  });

//  $('input').focus(function(e){
//    $('ul.dropdown-menu').toggle();
//  });

});

</script>


<script>
    function xoa()
    {
        $('#tabletonvinh').remove();
         $('#filetonvinh').val("");

    }


     //add table tôn vinh
     $(document).ready(function()
     {
         var namefiletruoc="";
        $('#formimporrtonvinhs').submit(function (e) {
           e.preventDefault();
           if ($('#tabletonvinh').length > 0) {
                alert("View Tôn vinh hiện vẫn đang còn sử dụng, xin vui lòng tắt");
            }
            if($('#filetonvinh').val()=="") alert("bạn chưa nhập file");
            else if($('#filetonvinh').val()==namefiletruoc) alert("File này bạn đã mới import");
            else
            {
                namefiletruoc=$('#filetonvinh').val();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type: "POST",
                    url: " {{ route('import.xuly_tonvinh') }} ",
                    data: new FormData(this),
                    contentType:false,
                    processData:false,
                    dataType: "JSON",
                    success: function (response)
                    {
                        $('#tableexcel').append(response);

                    },
                        error: function(xhr)
                            {
                                console.log(xhr.responseText);
                            },
                });
            }

       });
       $(("#formtonvinh")).submit(function (e) {
            e.preventDefault();
            let tendot_tonvinh =$("#uname").val();
            let Hoten =$("#pwd").val();
            let _token =$("input[name=_token]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type: "POST",
                    url: " {{ route('kiemduyet.newdottonvinh') }} ",
                    data: new FormData(this),
                    contentType:false,
                    processData:false,
                    dataType: "JSON",
                    success: function (response)
                    {

                        if(response!=false){
                        console.log(response);
                        alert("Bạn đã tạo thành công");
                        $('#myModal').modal('toggle');
                        $("#formtonvinh")[0].reset();
                        $('#dottonvinh').append("<option selected value='"+response.id_dottonvinh+"'>"+response.tendot_tonvinh+"</option>");
                        }
                        else {
                                $('#myModal').modal('toggle');
                                $("#formtonvinh")[0].reset();
                                alert("Tên đợt đã tồn tại");
                            };
                    },
                        error: function(xhr)
                            {
                                console.log(xhr.responseText);
                            },
                });
          });
     });

</script>
