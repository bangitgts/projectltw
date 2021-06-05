<?php
require '../connect/connectdb.php';
include '../auth/auth.php';

$password = $_POST['password'];
$newpassword = $_POST['newpassword'];
$newpasswordre  = $_POST['newpasswordre'];
$user = $_SESSION['username'];
$passtrongsql = "SELECT password FROM users WHERE username = '$user'";
$result = $con->query($passtrongsql);
$row = $result->fetch_assoc();
echo $row["password"];
$md5password = md5($password);
echo $md5password;

if(empty($password) | empty($newpassword) | empty($newpasswordre)){
    header("Location: ./index.php?mess=require"); 
} if($newpassword != $newpasswordre){
    header("Location: ./index.php?mess=err");

}if($row["password"] != $md5password){
    header("Location: ./index.php?mess=no");
} 
if($newpassword == $newpasswordre AND $row["password"] == $md5password ){
    $newpassword = md5($newpassword);
    echo $newpassword;
    $username = $_SESSION['username'];
    $sql_change_pass = "UPDATE users SET password = '$newpassword' WHERE username = '$username'";
    $con->query($sql_change_pass);
    $con->close();
    header("Location: ./index.php?mess=thanhcong"); 
}
?>
