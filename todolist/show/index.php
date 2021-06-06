<?php
require 'db_conn.php';
require '../../auth/auth.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../assets/styles/style.min.css" />

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="../../assets/fonts/material-design/css/materialdesignicons.css" />

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="../../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css" />

    <!-- Waves Effect -->
    <link rel="stylesheet" href="../../assets/plugin/waves/waves.min.css" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../../assets/plugin/sweet-alert/sweetalert.css" />
    <script src="../../assets/scripts/jquery.min.js"></script>
    <script src="../../asets/scripts/modernizr.min.js"></script>
    <script src="../../assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../assets/plugin/nprogress/nprogress.js"></script>
    <script src="../../assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="../../assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="../../assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <script src="../../assets/scripts/main.min.js"></script>
    <script src="../../assets/color-switcher/color-switcher.min.js"></script>
    <style>
        .todo-item {
            width: 155%;
            padding: 5px 10px 5px 35px;
            border-radius: 0px;
            box-shadow: 0 4px 0px 0 #ccc, 0 6px 20px 0 #ccc;
        }
    </style>
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
                        <a class="waves-effect" href="../../"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Giới Thiệu</span></a>
                    </li>
                    <li>
                        <a class="waves-effect parent-item js__control" href="../../angiday/"><i class="menu-icon mdi mdi-flower"></i><span>Ăn gì hôm nay</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="">Thêm Món Ăn</a></li>
                            <li><a href="">Danh Sách Món Ăn</a></li>
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>
                    <li class="current active">
                        <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-pencil-box"></i><span>Quản Lý Công Việc</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="../">Thêm Công Việc</a></li>
                            <li><a href="/todolist/show/" class="active">Danh Sách Công Việc</a></li>
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
            <h1 class="page-title">Danh Việc Công Việc</h1>
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
        <div class="main-section">
            <?php
            $user = $_SESSION['username'];
            $todos = $conn->query("SELECT * FROM todos WHERE username='$user' ORDER BY id DESC");
            ?>

            <div class="row">
                <br>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php if ($todos->rowCount() <= 0) { ?>
                        <div class="todo-item">
                            <div class="empty">
                                <p>Bạn chưa thêm công việc nào</p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="todo-item">
                            <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>
                            <?php if ($todo['checked']) { ?>
                                <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id']; ?>" checked />
                                <h2 class="checked"><?php echo $todo['title'] ?></h2>
                            <?php } else { ?>
                                <input type="checkbox" data-todo-id="<?php echo $todo['id']; ?>" class="check-box" />
                                <h2><?php echo $todo['title'] ?></h2>
                            <?php } ?>
                            <br>
                            <small>created: <?php echo $todo['date_time'] ?></small>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <ul class="list-inline">
            <li>2021 ©</li>
        </ul>
    </footer>
    </div>
    <!-- /.main-content -->
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
</body>

</html>