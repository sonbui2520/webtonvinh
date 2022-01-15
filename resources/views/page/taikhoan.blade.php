<link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('block.index')
@section('title')
    <title>Quản lý tài khoản</title>
@endsection
@section('content')

<div class="col">
    <h1>
        Danh sách tài khoản
    </h1>
    <div class="card">
        <div class="card-header">
            <h4>Bảng danh sách </h4>
            <button type="button" onclick="chuyentrang()" class="btn btn-primary"data-toggle="modal" data-target="#insertmodal">
                Tạo tài khoản
              </button>
        </div>
        <div class="card-body">
            <table class="table" id="accountTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" >ID</th>
                    <th scope="col">Ten tai khoan</th>
                    <th scope="col">Họ ten</th>
                    <th scope="col">email</th>
                    <th scope="col">Số điện thoại</th>
                    <th>thao tác</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($users as $item)
                  <tr id="sid{{ $item->id }}">
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->tentk }}</td>
                    <td>{{ $item->Hoten }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->sdt }}</td>
                    <td><a href="javascript:void(0)" onclick="edit({{ $item->id }})"  class="btn btn-info" role="button"> Sửa</a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#dialog{{ $item->id }}" class="btn btn-danger" role="button"> Xóa</a>
                    {{-- Modal Dialog xóa --}}
                                <div class="modal fade" id="dialog{{ $item->id }}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa tài khoản</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <p>Bạn thật sự muốn xóa tài khoản này</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                <button onclick="xoa({{ $item->id }})" id="btn_xoa" class="btn btn-danger" role="button">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


        </div>
            {{-- href="{{ route('account.detele_account', ['id'=>$item->id ])  }}" --}}
                                <!-- xử lý nút xóa bằng ajax -->

          <div class="container">
            <div class="row">
              <div class="col text-center" id="page">
                    {{ $users->links() }}
              </div>
            </div>
          </div>
    </div>

</div>
<!-- Button trigger modal -->

  <!-- Modal Edit -->
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa tài khoản</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  id="accountFormEdit">
                @csrf
                <input type="hidden" name="id" id="id"/>
                <div class="form-group">
                  <label for="Email1">Tên tài khoản</label>
                  <input type="text" name="Tentk" readonly class="form-control" id="Tentk"  >
                </div>
                <div class="form-group">
                    <label for="Hoten1">Họ tên</label>
                    <input type="text" name="Hoten" class="form-control" id="Hoten" >
                </div>

                <div class="form-group">
                    <label for="Diachi1">Email</label>
                    <input type="email" name="email"  class="form-control" id="email"  >
                </div>
                <div class="form-group">
                    <label for="Sodutaikhoan">Số điện thoại</label>
                    <input type="text"  name="sdt" class="form-control" id="sdt" >
                </div>
                  <div class="container">
                    <div class="row">
                      <div class="col text-center">
                        <button type="submit"  class=" btn btn-primary btn-lg">Cập nhật</button>
                      </div>
                    </div>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/jquery-3.5.1.min.js') }}" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/popper1.12.9.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap4.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
        });
      // chỉnh sửa
      $(("#accountFormEdit")).submit(function (e) {
            e.preventDefault();
            let id =$("#id").val();
            let Hoten =$("#Hoten").val();
            let  email=  $("#email").val();
            let sdt =$("#sdt").val();
            let _token =$("input[name=_token]").val();
            $.ajax({
                type: "PUT",
                url: "{{ route('taikhoan.edit') }}",
                data: {
                    id:id,
                    Hoten:Hoten,
                    email:email,
                    sdt:sdt,
                    _token:_token
                    },
                success: function (response) {
                    if(response)
                    {
                        $("#sid"+ response.id + ' th:nth-child(1)').text(response.id);
                        $("#sid"+ response.id + ' td:nth-child(2)').text(response.tentk);
                        $("#sid"+ response.id + ' td:nth-child(3)').text(response.Hoten);
                        $("#sid" +response.id + ' td:nth-child(4)').text(response.email);
                        $("#sid" +response.id + ' td:nth-child(5)').text(response.sdt);
                        $('#editmodal').modal('toggle');
                        $("#accountFormEdit")[0].reset();

                    }
                },
                error: function(xhr)
                {
                    console.log(xhr.responseText)
                }
            });
        });


        function edit(id)
                {
                $.get("/taikhoan/getbyid/"+id,
                    function (accounts) {
                        $("#id").val(accounts.id);
                        $("#Tentk").val(accounts.tentk);
                        $("#Hoten").val(accounts.Hoten);
                        $("#email").val(accounts.email);
                        $("#sdt").val(accounts.sdt);
                        $("#editmodal").modal("toggle");
                    }
                );
          }
          function xoa(id)
          {
            location.replace("http://localhost:8000/taikhoan/delete/"+id);
          }
          function chuyentrang()
          {
              window.location="http://localhost:8000/register";
          }
</script>
@endsection
