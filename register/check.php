<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    * {
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
</style>

<body>


    <?php
    require('../connect/connectdb.php');
    if (isset($_POST['username'])) { //kt truong username
        $username = stripslashes($_POST['username']); // loai bo dau \ trong chuoi
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repassword = stripslashes($_POST['repassword']);
        $repassword = mysqli_real_escape_string($con, $repassword);
        $trn_date = date("Y-m-d H:i:s");
        $querycheckemail = "SELECT * FROM users WHERE email= '$email'";
        $querycheckusername = "SELECT * FROM users WHERE username= '$username'";
        $resultemail = $con->query($querycheckemail);
        $resultusername = $con->query($querycheckusername);

    //   captcha
        if (isset($_POST['submit'])) {
            $secretKey = "6LfKwBcbAAAAAEGjOXOsDfP8pAZ2qnHPUJpiKWX5";
            $responseKey = $_POST['g-recaptcha-response'];
            $userIP = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
            $response = file_get_contents($url);
            $response = json_decode($response);
            if ($response->success)
                {}
            else
            header("Location: ./index.php?mess=captchaerr");
        }
    // end

        if ($password != $repassword) {
            header("Location: ./index.php?mess=passwordfailed");
        }
        if ($resultusername->num_rows > 0) {
            header("Location: ./index.php?mess=taikhoantontai");
        }
        if ($resultemail->num_rows > 0) {
            header("Location: ./index.php?mess=emailtontai");
        }
        if ($resultemail->num_rows == 0 && $resultusername->num_rows == 0 && $password ==  $repassword && $response->success == true) {
            $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
            $result = mysqli_query($con, $query);
            echo '<div>';
            echo '<div class="modal-dialog modal-confirm">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header justify-content-center">';
            echo '<div class="icon-box">';
            echo '<i class="fa fa-check"></i>';
            echo '</div>';
            echo '</div>';
            echo '<div class="modal-body text-center">';
            echo '<h4 style="font-family: Arial, Helvetica, sans-serif;">Chúc mừng bạn!</h4>';
            echo '<p style="font-family: Arial, Helvetica, sans-serif;">Tài khoản của bạn đã được tạo thành công</p>';
            echo '<button class="btn btn-success" data-dismiss="modal"><a style="font-family: Arial, Helvetica, sans-serif; color: gray" href="../login">Bấm vào đây để đăng nhập ngay</a> </button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        $con->close();
    } ?>
</body>

</html>