<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="icon" type="image/png" href="../login/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css" />
    <link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../login/css/util.css" />
    <link rel="stylesheet" type="text/css" href="../login/css/main.css" />

</head>
<script type="text/javascript">
    var onloadCallback = function() {
        grecaptcha.render('html_element', {
            '6LfKwBcbAAAAAAHIBYLk_rU1itlkgYmT5SNr2xYb': '6LfKwBcbAAAAAEGjOXOsDfP8pAZ2qnHPUJpiKWX5'
        });
    };
</script>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" name="registration" action="check.php" method="post">
                    <span class="login100-form-title p-b-49">
                        Register
                    </span>

                    <div class="wrap-input100 validate-input m-b-11" data-validate="Username is reauired">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Type your username" required>
                        <span style="color:red" class="focus-input100" data-symbol="&#xf206;"></span>

                    </div>
                    <?php
                    if (isset($_GET['mess']) && $_GET['mess'] == 'taikhoantontai') {
                        echo '<span style="color:red;font-family:"Roboto", sans-serif;">Tài khoản này đã tồn tại. Mời chọn tài khoản khác</span>';
                    }
                    ?>


                    <div class="wrap-input100 validate-input m-b-11" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Type your email" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>

                    </div>
                    <?php
                    if (isset($_GET['mess']) && $_GET['mess'] == 'emailtontai') {
                        echo '<span style="color:red;font-family:"Roboto", sans-serif;">Email này đã tồn tại. Mời chọn Email khác</span>';
                    }
                    ?>
                    <div class="wrap-input100 validate-input m-b-11" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-11" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="repassword" placeholder="Re-Enter your password" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <?php
                    if (isset($_GET['mess']) && $_GET['mess'] == 'passwordfailed') {
                        echo '<span style="color:red;font-family:"Roboto", sans-serif;">Mật khẩu không trùng nhau. Xin mời nhập lại</span>';
                    }
                    ?>
                    <div class="g-recaptcha" data-sitekey="6LfKwBcbAAAAAAHIBYLk_rU1itlkgYmT5SNr2xYb"></div>
                    <?php
                    if (isset($_GET['mess']) && $_GET['mess'] == 'captchaerr') {
                        echo '<span style="color:red;font-family:"Roboto", sans-serif;">Bạn chưa xác nhận captcha</span>';
                    }
                    ?>

                    <div class="container-login100-form-btn p-t-15">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" name="submit" id="loginform" class="login100-form-btn">
                                Register
                            </button>
                        </div>
                    </div>
                    <div class="flex-col-c p-t-15">
                        <a href="../login/" class="txt2" style="font-family: Arial, Helvetica, sans-serif;">
                            Quay lại trang đăng nhập
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>


</html>