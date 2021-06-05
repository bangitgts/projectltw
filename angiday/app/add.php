<?php

if (isset($_POST['title'])) {
    require '../../connect/connectdb.php';
    require '../../auth/auth.php';
    $title = $_POST['title'];
    $monan = $_POST['monan'];
    $user = $_SESSION['username'];
    
    if (empty($monan) | empty($title)) {
        header("Location: ../index.php?mess=error");
    } else {
        if ($monan = 'monchinh') {
            $sql = "INSERT INTO anchinh (tenmonan, username)
             VALUES ('$title', '$user')";
            if (mysqli_query($con, $sql)) {
                echo $monan;
                header("Location: ../index.php?mess=success");
            }
        }
        if ($monan = 'monphu') {
            $sql = "INSERT INTO anphu (tenmonan, username)
            VALUES ('$title', 'Doe')";
            if (mysqli_query($con, $sql)) {
                header("Location: ../index.php?mess=success");
            }
        }
        mysqli_close($con);
    }
}
