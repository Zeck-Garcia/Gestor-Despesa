<?php

$loginUser = (isset($_POST["loginUser"]) != "" ? $_POST["loginUser"]  : "");
$passwordUser = (isset($_POST["passwordUser"]) != "" ? $_POST["passwordUser"] : "");

if($loginUser == null || $passwordUser == null){
    // echo "<script>Alert('Você deve digitar seu nome e senha');</script>";
    // echo "<script>window.location.href='./app/views/login.php'</script>";

    // header('Location: ././teste.php');
    header('Location: link.php?page=login');


    echo $msg_error = "não deu bom";
    echo "01";

    exit;
} else {
    require_once "auth.php";
}