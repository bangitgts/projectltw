<?php

if (isset($_POST['title'])) {
    require '../db_conn.php';
    include '../../auth/auth.php';
    $title = $_POST['title'];
    echo "Welcome " . $_SESSION["username"];
    if (empty($title)) {
        header("Location: ../index.php?mess=error");
    } else {
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $user = $_SESSION['username'];
            $sql = "INSERT INTO todos(title,username )
                VALUES ('$title','$user')";
            $conn->exec($sql);
            header("Location: ../index.php?mess=success"); 
        } catch (PDOException $e) {
            header("Location: ../index.php");
        }


        // $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        // $res = $stmt->execute([$title]);


    }
} else {
    header("Location: ../index.php?mess=error");
}
