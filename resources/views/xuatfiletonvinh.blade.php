<!doctype html>
<html>
<head>
<title>Xuất File Excel Tôn Vinh</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<link rel="stylesheet" href="http://localhost/official_signup_form%20(1)/giaodien/stylevip.css">
		<!-- <link rel="stylesheet" href="/css/timethongke.css"> -->
		<!-- Boxiocns CDN Link -->
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<!-- /fonts -->
<!-- css -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<link rel="stylesheet" href="css/stylevip.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- /css -->
</head>
<body>
@csrf

<div class="sidebar close" style="opacity: 1">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Web Tôn Vinh</span>
    </div>
    <ul class="nav-links">

      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#"></a></li>
        </ul>
      </li>
      {{-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name"></span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#"></a></li>
          <li><a href="#">HTML & CSS</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li>
       --}}
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Tim Kiếm</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Tìm kiếm</a></li>
          <li><a href="{{ route('timkiem.timkiemnguoi') }}">Người hiến máu</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('taikhoan.index') }}">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Tài khoản</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
          <div class="iocn-link">
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Kiểm duyệt</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
      </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="a">Kiểm duyệt </a></li>
          <li><a href="{{ route('kiemduyet.index') }}">Tôn vinh</a></li>
          <li><a href="{{ route('dsdexuat.index') }}">Danh sách đề xuất</a></li>
        </ul>

      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Import</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="a">Import</a></li>
          <li><a href="{{ route('page.import_show') }}">Bệnh viện</a></li>
          <li><a href="{{ route('import.index_tonvinh') }}">Tôn vinh</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Đổi mật khẩu</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('xuatfiletonvinh') }}">
          <i class='bx bx-history'></i>
          <span class="link_name">Xuất file tôn vinh</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="{{ Session::get("user")[0]->url_hinhanh }}" alt="avarta">
      </div>
      <div class="name-job">
        <div class="profile_name">{{ Session::get("user")[0]->Hoten }}</div>
        <div class="job">Cán bộ</div>
      </div>
      <i class='bx bx-log-out' onclick="nextpage('{{ route('taikhoan.dangxuat')}}')"></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' style="z-index: 10;"></i>
      <span class="text" style="z-index: 10;">Xuất file tôn vinh</span>
    </div>
    <div class="container">
      <div class="icons">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
      </div>

      <form action="{{ route('tiemkiemxuatfiletonvinh') }}" method="post">
        @csrf
        <div class="select">
            <span>Đợt tôn vinh</span>
            <select name="id_dot" class="form-select" aria-label="Default select example">
                @foreach($dots as $item)
                    @if ($id_dot==$item->id)
                    <option selected value="{{ $item->id}}">{{ $item->tendot_tonvinh}}</option>
                    @else
                    <option value="{{ $item->id}}">{{ $item->tendot_tonvinh}}</option>
                    @endif
                @endforeach
            </select>
             {{-- @foreach ($nguoitonvinhs as $item)
                <option value="{{ $item->id }}">{{ $item->created_at }}</option>
                @endforeach
            </select> --}}


            <input type="submit" name="btn-timkiem" class="btn btn-dark" value="Tìm kiếm">

          </div>
    </form>

		<!-- dữ liệu -->
		<form action="{{ route('exporttonvinh', ['id_dot'=>$id_dot]) }}" method="get">
			@csrf
			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">ID</th>
					<th scope="col">Họ và tên</th>
					<th scope="col">Ngày Sinh</th>
					<th scope="col">Số Điện Thoại</th>
					<th scope="col">Địa Chỉ</th>
					<th scope="col">Mức Tôn Vinh</th>
					<th scope="col">Nhóm Máu ABO</th>
					<th scope="col">Nhóm Máu Rh</th>
					<th scope="col">Số lần hiến</th>
					</tr>
				</thead>
				<tbody>
                    <?php $i=0; ?>
					@foreach ($data as $key => $val)
                    <?php $i +=1; ?>
						<tr>
							<th scope="row" id={{{$val->ID_exeltonvinh}}}>{{$i}}</th>
							<td>{{$val->hoten}}</td>
							<td>{{$val->ngaysinh}}</td>
							<td>{{$val->sodienthoai}}</td>
							<td>{{$val->diachi}}</td>
                            <td>{{$val->muctonvinh}}</td>
							<td>{{$val->nhommau}}</td>
							<td>{{$val->nhomRh}}</td>
							<td>{{$val->solanhien}}</td>

						</tr>
						@endforeach
				</tbody>
				</table>
				<button type="submit" class="btn btn-success" style="float:right;margin-right:5rem;margin-bottom:5rem;">Export Excel</button>
		</form>
		<!-- xong		 -->
		<div class="container">
		  <div class="icons">
			<i class="fas fa-moon"></i>
			<i class="fas fa-sun"></i>
		  </div>

	  </section>


	  <script>
	  let arrow = document.querySelectorAll(".arrow");
	  for (var i = 0; i < arrow.length; i++) {
		arrow[i].addEventListener("click", (e)=>{
	   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
	   arrowParent.classList.toggle("showMenu");
		});
	  }
	  let sidebar = document.querySelector(".sidebar");
	  let sidebarBtn = document.querySelector(".bx-menu");
	  console.log(sidebarBtn);
	  sidebarBtn.addEventListener("click", ()=>{
		sidebar.classList.toggle("close");
	  });
	  </script>

</body>
</html>
