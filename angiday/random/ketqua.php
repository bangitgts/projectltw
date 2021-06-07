<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Thêm Món Ăn</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="../../assets/styles/style.min.css" />

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="../../assets/fonts/material-design/css/materialdesignicons.css" />


</head>

<body>
    <?php
    require '../../connect/connectdb.php';
    require '../../auth/auth.php'
    ?>


    <div class="main-menu">
        <header class="header">
            <a href="index.html" class="logo">Lập Trình Web</a>
            <button type="button" class="button-close fa fa-times js__menu_close"></button>
        </header>
        <!-- /.header -->
        <div class="content">

            <div class="navigation">
                <ul class="menu js__accordion">
                    <li>
                        <a class="waves-effect" href="/"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Giới Thiệu</span></a>
                    </li>
                    <li class="current active">
                        <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-flower"></i><span>Ăn gì hôm nay</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="../">Thêm Món Ăn</a></li>
                            <li><a href="../listfood/">Danh Sách Món Ăn</a></li>
                            <li class="current acitve"><a href="#">Random xem ăn gì nào</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect parent-item js__control" href="../../todolist/"><i class="menu-icon mdi mdi-pencil-box"></i><span>Quản Lý Công Việc</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="./todolist/">Thêm Công Việc</a></li>
                            <li><a href="./todolist/show/">Danh Sách Công Việc</a></li>

                        </ul>
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
            <h1 class="page-title">Thêm Món Ăn</h1>
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
                    <li><a href="../../changepassword/">Đổi mật khẩu</a></li>
                    <li><a class="" href="../../logout/">Log Out</a></li>
                </ul>
                <!-- /.sub-ico-item -->
            </div>
            <!-- /.ico-item -->
        </div>
        <!-- /.pull-right -->
    </div>


    <div id="wrapper">
        <div class="main-content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="text-center panel-heading">Kết quả</div>
                    <!-- Table -->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h4 class="text-center">Các món ăn chính</h4>
                        <?php
                        if (true) {
                            include '../../connect/connectdb.php';
                            include '../../auth/auth.php';

                            $monphu = $_POST['monphu'];
                            $monchinh = $_POST['monchinh'];
                            $user = $_SESSION['username'];

                            $sql = "SELECT *
                                    FROM anchinh
                                    WHERE username = '$user'
                                    ORDER BY RAND()
                                    LIMIT $monchinh";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p class='text-center'>";
                                    echo $row["tenmonan"];
                                    echo "<br>";
                                    echo "</p>";
                                }
                            } else {
                                echo "0 results";
                            }
                            $con->close();
                        }

                        ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h4 class="text-center">Các món ăn phụ</h4>
                        <?php
                        if (true) {
                            include '../../connect/connectdb.php';
                            include '../../auth/auth.php';

                            $monphu = $_POST['monphu'];
                            $monchinh = $_POST['monchinh'];
                            $user = $_SESSION['username'];

                            $sql = "SELECT *
                                    FROM anphu
                                    WHERE username = '$user'
                                    ORDER BY RAND()
                                    LIMIT $monphu";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p class='text-center'>";
                                    echo $row["tenmonan"];
                                    echo "<br>";
                                    echo "</p>";
                                }
                            } else {
                                echo "0 results";
                            }
                            $con->close();
                        }

                        ?>
                    </div>
                </div>
            </div>
            <footer class="footer col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="list-inline">
                    <li>2021 © </li>
                </ul>
            </footer>
        </div>
        <!-- /.main-content -->
    </div>
    </div>
    <script src="../../assets/scripts/jquery.min.js"></script>

</body>

</html>