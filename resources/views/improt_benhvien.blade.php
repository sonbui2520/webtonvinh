<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/importtonvimh.css') }}" >
@extends('block.index')
@section('title')
<title>Import bệnh viện</title>
@endsection
@section('title_page')
IMPORT BỆNH VIỆN
@endsection
@section('content')
    {{-- import --}}
         <meta name="csrf-token"  content="{{ csrf_token() }}" />
      <form  id="formimportbenhvien" class="select1" method="POST" enctype="multipart/form-data">
        @csrf
            {{-- đơn vị bệnh viện --}}
    <div style=" position: absolute;margin-top: -100px;margin-right: -60%;">
        <span>Đơn vị bệnh viện:</span>
          <select id="donvi_benhvien" name=" id_donvi_benhvien" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            @foreach ($donvi_benhviens as $item)
            <option value="{{ $item->id }}">{{ $item->tendonvi }}</option>
            @endforeach
            </select>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +New đơn vị bệnh viện
          </button>
      </div>
          <input type="file" class="btn btn-secondary" id="filebenhvien" name="filebenhvien" accept=".xlsx" value="IMPORT">
          <button type="submit" class="btn btn-secondary">View</button>
    </form>
     <!-- The Modal -->
     <div class="modal" id="myModal">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tạo mới đơn vị bệnh viện</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               {{-- dư liệu --}}
               <form id="formbenhvien" class="was-validated">
                @csrf
                <meta name="_token" content="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="uname">Tên đơn vị bệnh viện:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Tên đơn vị" name="uname" required>
                    <div class="valid-feedback">Đúng.</div>
                    <div class="invalid-feedback">Bạn vui lòng nhập tên đơn vị bệnh viện.</div>
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


});

</script>

<script>
    function xoa()
    {
        $('#tablebenhvien').remove();
         $('#filebenhvien').val("");

    }
     //add table tôn vinh
     $(document).ready(function()
     {
         var namefiletruoc="";
        $('#formimportbenhvien').submit(function (e) {
           e.preventDefault();
           if ($('#filebenhvien').length > 0) {
                alert("Bạn đã import thành công!");
            }
            if($('#filebenhvien').val()=="") alert("bạn chưa nhập file");
            else if($('#filebenhvien').val()==namefiletruoc) alert("File này bạn đã mới import");
            else
            {
                namefiletruoc=$('#filebenhvien').val();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type: "POST",
                    url: " {{ route('page.import_stores') }}",
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
       $(("#formbenhvien")).submit(function (e) {
            e.preventDefault();
            let tendonvi =$("#uname").val();
            let Hoten =$("#pwd").val();
            let _token =$("input[name=_token]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type: "POST",
                    url: " {{ route('page.newdonvibv') }} ",
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
                        $("#formbenhvien")[0].reset();
                        $('#donvi_benhvien').append("<option selected value='"+response.id_donvi_benhvien+"'>"+response.tendonvi+"</option>");
                        }
                        else {
                                $('#myModal').modal('toggle');
                                $("#formbenhvien")[0].reset();
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
