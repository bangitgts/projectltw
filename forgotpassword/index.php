<?php
require '../connect/connectdb.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" type="text/css" href="../login/css/util.css" />
    <link rel="stylesheet" type="text/css" href="../login/css/main.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .modal-confirm {
            color: #434e65;
            width: 525px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            background: rgb(13, 170, 144);
            border-bottom: none;
            position: relative;
            text-align: center;
            margin: -20px -20px 0;
            border-radius: 5px 5px 0 0;
            padding: 35px;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 36px;
            margin: 10px 0;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #fff;
            text-shadow: none;
            opacity: 0.5;
        }

        .modal-confirm .close:hover {
            opacity: 0.8;
        }

        .modal-confirm .icon-box {
            color: #fff;
            width: 95px;
            height: 95px;
            display: inline-block;
            border-radius: 50%;
            z-index: 9;
            border: 5px solid #fff;
            padding: 15px;
            text-align: center;
        }

        .modal-confirm .icon-box i {
            font-size: 64px;
            margin: -4px 0 0 -4px;
        }

        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .modal-confirm .btn,
        .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #eeb711 !important;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 30px;
            margin-top: 10px;
            padding: 6px 20px;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #eda645 !important;
            outline: none;
        }

        .modal-confirm .btn span {
            margin: 1px 3px 0;
            float: left;
        }

        .modal-confirm .btn i {
            margin-left: 1px;
            font-size: 20px;
            float: right;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <!-- <form class="login100-form validate-form" name="registration" action="" method="post"> -->
                    <span class="login100-form-title p-b-49">
                        Forgot Password
                    </span>
                    <form action="check.php" method="POST" autocomplete="off">
                        <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
                            <span class="label-input100">Username or Email</span>
                            <input class="input100" type="text" name="username" placeholder="Type your username or email" required>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        <?php
                        if( !empty($_GET['mess']) && $_GET['mess'] == "err")
                            echo '<p class="text-center"style="color:red">Không tìm thấy tài khoản nào hợp lệ</p>';
                        ?>
                        <div class="container-login100-form-btn p-t-15">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" name="submit" class="login100-form-btn">
                                    Forgot
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="flex-col-c p-t-15">
                        <a href="../login/" class="txt2" style="font-family: Arial, Helvetica, sans-serif;">
                            Quay lại trang đăng nhập
                        </a>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

</body>

</html>