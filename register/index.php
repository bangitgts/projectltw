<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/style.css" />
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

<body>
    <?php
    require('../connect/connectdb.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'><h3>Bạn đã đăng ký thành công</h3><br/>Click để <a href='../login/login.php'>Đăng nhập</a></div>";
        }
    } else {
    ?>
        <!-- <div class="form">
            <h1>Đăng ký</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Tên đăng nhập" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <input type="submit" name="submit" value="Đăng ký" />
            </form>
        </div> -->

        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form class="login100-form validate-form"  name="registration" action="" method="post">
                        <span class="login100-form-title p-b-49">
                            Register
                        </span>

                        <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" name="username" placeholder="Type your username" required>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" placeholder="Type your email" required>
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Type your password" required>
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>




                        <div class="container-login100-form-btn p-t-15">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" name="submit" class="login100-form-btn">
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
    <?php } ?>
</body>
</html>