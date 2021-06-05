<?php

session_start(); // su dung seassion cho dang ki dang nhap
if(!isset($_SESSION["username"])){
header("Location: ./login");
exit(); 
}
