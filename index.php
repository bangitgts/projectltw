<?php
include("./auth/auth.php"); ?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<head>
    <meta charset="utf-8">
    <title>Sharescript.net</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <p>Xin chào <?php echo $_SESSION['username']; ?>!</p>
        <p>Đây là trang chủ</p>
        <p><a href="dashboard.php">Bảng điều khiển</a></p>
        <a href="./logout/logout.php">Đăng xuất</a>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>