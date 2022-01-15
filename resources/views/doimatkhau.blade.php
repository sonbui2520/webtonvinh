<!doctype html>
<html>
<head>
<title>Đổi Mật Khẩu</title>
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
<!-- /css -->
</head>
<body>

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
          @if (Session::get("user") && Session::get("user")[0]->Quyen ==1)
          <li>
            <a href="{{ route('taikhoan.index') }}">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="link_name">Tài khoản</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Analytics</a></li>
            </ul>
          </li>
          @endif
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
            <a href="{{ route('lichsutonvinh.index') }}">
              <i class='bx bx-compass' ></i>
              <span class="link_name">Lịch sử tôn vinh</span>
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
            <a href="{{ route('doimatkhau') }}">
              <i class='bx bx-cog' ></i>
              <span class="link_name">Đổi mật khẩu</span>
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
          <i class='bx bx-menu' style="    z-index: 10;"></i>
          <span class="text" style="    z-index: 10;">@yield('title_page')</span>
        </div>
		<!-- đăng nhập -->

				<div class="content-w3ls">
					<div class="content-agile1">
					</div>
					<div class="content-agile2">
						<form action="{{route('doimatkhau')}}" method="post">
							@csrf
							<div class="form-control w3layouts">
								<h3 style="font-size: 2rem; text-align: center;margin-top:2rem;margin-bottom:3rem;color:red;">ĐỔI MẬT KHẨU</h3>
							</div>
							<div class="form-control w3layouts">
								<input type="text" id="firstname" name="username" placeholder="UserName" title="Please enter your First Name" required="">
							</div>
							<div class="form-control w3layouts">
								<input type="text" id="firstname" name="password" placeholder="Mật Khẩu Cũ" title="Please enter your First Name" required="">
							</div>

							<div class="form-control agileinfo" style="margin-bottom:3rem;">
								<input type="password" class="lock" name="passwordnew" placeholder="Mật khẩu mới" id="password1" required="">
							</div>

							<input type="submit" class="register" value="Đổi Mật Khẩu">
						</form>
<ul class="social-agileinfo wthree2">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
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
