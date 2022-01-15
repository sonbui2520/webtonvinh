<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @yield('title')
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <div class="container">
            <div class="icons">
              <i class="fas fa-moon"></i>
              <i class="fas fa-sun"></i>
            </div>
            @yield("content")
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
        function nextpage(url)
        {
            window.location.href = url;
        }
        </script>
</body>
</html>
