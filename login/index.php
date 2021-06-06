<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng nhập hệ thống</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <?php
    function mysql_error()
    {
        echo "faild";
    }
    require('../connect/connectdb.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            setcookie("username", $_SESSION['username'], time() + 600, "/");
            header("Location: ../");
        } else {
    ?>
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="background-color: #e4e9f1;">
                        <form class="login100-form validate-form" action="" method="post" name="login">
                            <span class="login100-form-title p-b-49"> Login </span>

                            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                                <span class="label-input100">Username</span>
                                <input class="input100" type="text" name="username" placeholder="Type your username" />
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="Type your password" />
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                            </div>

                            <p style="color: red; font-weight: 500; font-size:16px; font-family: 'Roboto', sans-serif;">Bạn nhập sai tài khoản hoặc mật khẩu. Mời nhập lại</p>

                            <div class="text-right p-t-8 p-b-31">
                                <a href="#"> Forgot password? </a>
                            </div>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button type="submit" name="submit" value="Đăng nhập" class="login100-form-btn">Login</button>
                                </div>
                            </div>

                            <div class="flex-col-c p-t-20">
                                <span class="txt1 p-b-0"> Hoặc đăng kí để sử dụng </span>
                                <a href="../register/" class="txt2"> <strong>NHẤN VÀO ĐỂ Đăng kí ngay <strong> </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="background-color: #e4e9f1;">
                    <form class="login100-form validate-form" action="" method="post" name="login">
                        <span class="login100-form-title p-b-49"> Login </span>

                        <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" name="username" placeholder="Type your username" />
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Type your password" />
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>

                        <div class="text-right p-t-8 p-b-31">
                            <a href="../forgotpassword/"> Quên mật khẩu? </a>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" name="submit" value="Đăng nhập" class="login100-form-btn">Login</button>
                            </div>
                        </div>

                        <div class="flex-col-c p-t-20">
                            <span class="txt1 p-b-0"> Hoặc đăng kí để sử dụng </span>
                            <a href="../register/" class="txt2"> <strong>Nhấn vào đây để đăng kí ngay <strong> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="dropDownSelect1"></div>


    <?php } ?>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>
<script>
    $("input").on('focusout', function() {
        $(this).each(function(i, e) {
            if ($(e).val() != "") {
                $(e).addClass('not-empty');
            } else {
                $(e).removeClass('not-empty');
            }
        });
    });
</script>

</html>