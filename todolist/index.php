<?php
include 'db_conn.php';
include '../auth/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lí công việc</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../assets/styles/style.min.css" />

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="../assets/fonts/material-design/css/materialdesignicons.css" />

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css" />

    <!-- Waves Effect -->
    <link rel="stylesheet" href="../assets/plugin/waves/waves.min.css" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../assets/plugin/sweet-alert/sweetalert.css" />

</head>

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
                    <li>
                        <a class="waves-effect" href="/"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Giới Thiệu</span></a>
                    </li>
                    <li>
                        <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-flower"></i><span>Ăn gì hôm nay</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="icons-font-awesome-icons.html">Thêm Món Ăn</a></li>
                            <li><a href="icons-fontello.html">Danh Sách Món Ăn</a></li>
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>
                    <li class="current active">
                        <a class="waves-effect parent-item js__control " href="#"><i class="menu-icon mdi mdi-pencil-box"></i><span>Quản Lý Công Việc</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li class="current active"><a href="./">Thêm Công Việc</a></li>
                            <li><a href="./show/">Danh Sách Công Việc</a></li>
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
            <h1 class="page-title">Thêm Công Việc</h1>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">
            <div class="ico-item">
                <p><?php
                echo $_SESSION['username'];
                ?></p>
                <ul class="sub-ico-item">
                    <li><a href="#">Settings</a></li>
                    <li><a class="js__logout" href="http://localhost/project-ltw/logout">Log Out</a></li>
                </ul>
                <!-- /.sub-ico-item -->
            </div>
            <!-- /.ico-item -->
        </div>
        <!-- /.pull-right -->
    </div>


    <div id="wrapper">
        <div class="main-content">
            <div class="main-section">
                <div class="add-section">
                    <form action="app/add.php" method="POST" autocomplete="off">
                        <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                            <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required" />
                            <button type="submit">Thêm công việc</button>

                        <?php } else { ?>
                            <input type="text" name="title" placeholder="Thêm công việc của bạn?" />
                            <button type="submit">Thêm công việc&nbsp; </button>
                        <?php } ?>
                    </form>
                </div>
                <?php
                $username = $_SESSION['username'];
              //  $todos = $conn->query("SELECT * FROM todos WHERE username ='$username' ORDER BY id DESC");
                ?>
                <?php
                if (isset($_GET['mess']) && $_GET['mess'] == 'success') {
                    echo '<script>';
                    echo 'alert("Thêm thành công!");';
                    echo '</script>';
                }
                ?>
                <div class="show-todo-section">
                    <div class="todo-item">
                        <div class="empty">
                            <img src="img/f.png" width="100%" />
                            <img src="img/Ellipsis.gif" width="80px">
                        </div>
                    </div>
                </div>
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

    <script src="js/jquery-3.2.1.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.remove-to-do').click(function() {
                const id = $(this).attr('id');

                $.post("app/remove.php", {
                        id: id
                    },
                    (data) => {
                        if (data) {
                            $(this).parent().hide(600);
                        }
                    }
                );
            });

            $(".check-box").click(function(e) {
                const id = $(this).attr('data-todo-id');

                $.post('app/check.php', {
                        id: id
                    },
                    (data) => {
                        if (data != 'error') {
                            const h2 = $(this).next();
                            if (data === '1') {
                                h2.removeClass('checked');
                            } else {
                                h2.addClass('checked');
                            }
                        }
                    }
                );
            });
        });
    </script>
    <script src="../assets/scripts/jquery.min.js"></script>
    <script src="../asets/scripts/modernizr.min.js"></script>
    <script src="../assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/plugin/nprogress/nprogress.js"></script>
    <script src="../assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="../assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="../assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <script src="../assets/scripts/main.min.js"></script>
    <script src="../assets/color-switcher/color-switcher.min.js"></script>
</body>

</html>