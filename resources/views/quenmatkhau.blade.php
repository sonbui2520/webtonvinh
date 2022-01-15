<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<title>Quên Mật Khẩu</title>
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
		<!-- đăng nhập -->
				<div class="content-w3ls" style="margin-top:5rem;">
					<div class="content-agile1">
					</div>
					<div class="content-agile2">
						<form action="{{route('quenmatkhau')}}" method="post">
							@csrf
							<div class="form-control w3layouts">
								<h3 style="font-size: 2rem; text-align: center;margin-top:2rem;margin-bottom:3rem;color:red;">QUÊN MẬT KHẨU</h3>
							</div>
							<div class="form-control w3layouts">
								<input type="text" id="firstname" name="username" placeholder="UserName" title="Please enter your First Name" required="">
							</div>

                            <div class="form-control agileinfo">
								<input type="text" class="lock" name="email" placeholder="Email" id="password1" required="">
							</div>

							<div class="form-control agileinfo" style="margin-bottom:3rem;">
								<input type="password" class="lock" name="passwordNew" placeholder="Password" id="password1" required="">
							</div>
						<input type="submit" class="register" value="Đặt Mật Khẩu Mới">
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
</body>
</html>
