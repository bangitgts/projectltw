<?php
include("./auth/auth.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Người Dùng</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="form">
        <p>Xin chào <?php echo $_SESSION['username']; ?>!</p>
        <p>Đây là trang chủ</p>
        <p><a href="dashboard.php">Bảng điều khiển</a></p>
        <a href="./logout">Đăng xuất</a>
    </div>

    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>