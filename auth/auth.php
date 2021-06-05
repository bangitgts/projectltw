<?php
session_start(); // su dung seassion cho dang ki dang nhap
if(!isset($_SESSION["username"])){
header("Location: http://localhost/project-ltw/login/");
exit(); }
