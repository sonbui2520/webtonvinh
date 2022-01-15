<!doctype html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/dangnhap.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- fonts -->
    <link href="fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="fonts.googleapis.com/css?family=Monoton" rel="stylesheet">


    <!-- /css -->
</head>

<body>
    <style>

    </style>

    <h1 style="color: #cd201f" class="w3ls">QUẢN LÝ TÔN VINH</h1>
    <div class="content-w3ls">
        <div class="content-agile1">
            <h2 class="agileits1"></h2>
            <p class="agileits2"></p>
        </div>
        <div class="content-agile2">
            <form action="{{ route('taikhoan.xulilogin') }}" method="post">
                @csrf
                <div class="form-control agileinfo">
                    <h1>
                        <p class="wthree w3l">ĐĂNG NHẬP
                        <p>
                    </h1>
                    <a style="color: #dadada;text-decoration-line: underline; margin-right: 90px" href="#"></a>
                </div>
                <div class="form-control w3layouts">
                    <input type="text" id="firstname" name="username" placeholder="Tên đăng nhập"
                        title="Please enter your First Name" required="">
                </div>


                <div class="form-control agileinfo">
                    <input type="password" class="lock" name="password" placeholder="Mật khẩu" id="password1"
                        required="">
                </div>



                <input type="submit" class="register" value="Đăng nhập">

                <p class="wthree w3l" style="color: #cd201f">
                    <?php if(isset($_GET['err']))  echo $_GET['err'];  ?>
                </p>

            </form>
            <script type="text/javascript">
            window.onload = function() {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("password2").value;
                var pass1 = document.getElementById("password1").value;
                if (pass1 != pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity('');
                //empty string means no validation error
            }
            </script>
            <p class="wthree w3l">
                <a style="color: #dadada;text-decoration-line: underline; margin-right: 90px" href="{{ route('quenmatkhau') }}">Quên mật khẩu</a>
                {{-- <a style="color: #dadada;text-decoration-line: underline" href="#">Đăng ký tài khoản</a> --}}
            <p>
            <ul style="margin-top: 15px" class="social-agileinfo wthree2">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

</body>

</html>
