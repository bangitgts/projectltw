<?php

if (isset($_POST['search'])) {
    require '../db_conn.php';

    $title = $_POST['search'];
    echo $title;
    $stmt = $conn->query("SELECT * FROM users WHERE username LIKE 'te'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $result['username'];
} else {
    header("Location: ../index.php?mess=error");
}

