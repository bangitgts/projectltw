<?php
require("./auth/auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Giới Thiệu</title>

    <link rel="stylesheet" href="./assets/styles/style.min.css" />
    <link rel="stylesheet" href="./assets/fonts/material-design/css/materialdesignicons.css" />
</head>
<style>
    * {
        font-family: 'Roboto', sans-serif;
    }


    .main-section {
        background: transparent;
        max-width: 500px;
        width: 90%;
        height: 500px;
        margin: 30px auto;
        border-radius: 0px;
    }

    .add-section {
        width: 70%;
        background: #fff;
        margin: 0px auto;
        padding: 10px;
        border-radius: 5px;
    }
</style>

</style>

<body>
    <div class="main-menu">
        <header class="header">
            <a href="index.html" class="logo">Lập Trình Web</a>
            <button type="button" class="button-close fa fa-times js__menu_close"></button>
        </header>
        <!-- /.header -->
        <div class="content">

            <div class="navigation">
                <ul class="menu js__accordion">
                    <li class="current active">
                        <a class="waves-effect" href="./"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Giới Thiệu</span></a>
                    </li>
                    <li>
                        <a class="waves-effect parent-item js__control " href="./angiday/"><i class="menu-icon mdi mdi-flower"></i><span>Ăn gì hôm nay</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="">Thêm Món Ăn</a></li>
                            <li><a href="">Danh Sách Món Ăn</a></li>
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>
                    <li>
                        <a class="waves-effect parent-item js__control" href="./todolist/"><i class="menu-icon mdi mdi-pencil-box"></i><span>Quản Lý Công Việc</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="./todolist/">Thêm Công Việc</a></li>
                            <li><a href="./todolist/show/">Danh Sách Công Việc</a></li>
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>

                </ul>
                <!-- /.menu js__accordion -->
            </div>
            <!-- /.navigation -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.main-menu -->

    <div class="fixed-navbar">
        <div class="pull-left">
            <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
            <h1 class="page-title">Giới Thiệu</h1>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">

            <!-- /.ico-item -->

            <div class="ico-item">
                <?php
                echo 'Tài khoản: ' . '<strong>' . $_SESSION['username'] . '</strong>';
                ?>
                <ul class="sub-ico-item">
                    <li><a href="./changepassword/">Đổi mật khẩu</a></li>
                    <li><a class="" href="./logout/">Log Out</a></li>
                </ul>
                <!-- /.sub-ico-item -->
            </div>
            <!-- /.ico-item -->
        </div>
        <!-- /.pull-right -->
    </div>


    <div id="wrapper">
        <div class="main-content">
            <div class="add-section">
                <h3 class="text-center" style="font-weight: 700;">Bài Tập Lớn</h3>
                <h4 class="text-center">Môn: Lập Trình Web</h4>
                <p class="text-center"><strong>ĐỀ TÀI</strong>:THỰC ĐƠN VÀ CÔNG VIỆC HÀNG NGÀY</p>
                <p class="text-center"><strong>Giảng viên hướng dẫn:</strong> Huỳnh Thanh Sơn</p>
                <h5>Sinh Viên Thực Hiện</h5>
                <p>1851120003 – Nguyễn Văn Bằng</p>
                <p>1851120046 – Phan Thành Tín </p>
                <p>1851120055 – Nguyễn Văn Thơ </p>
                <p>1851150064 – Nguyễn Quốc Việt </p>
            </div>
            <footer class="footer">
                <ul class="list-inline">
                    <li>2021 © </li>
                </ul>
            </footer>
        </div>
        <!-- /.main-content -->
    </div>
    </div>
    <script src="./assets/scripts/jquery.min.js"></script>
</body>

</html>