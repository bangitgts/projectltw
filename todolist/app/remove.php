<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        //$stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
       // $res = $stmt->execute([$id]);
        $sql = "DELETE FROM todos WHERE id=$id";
        $res =  $conn->query($sql);
        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}