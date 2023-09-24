<?php

$loginUser = (isset($_POST["loginUser"]) != "" ? $_POST["loginUser"]  : "");
$passwordUser = (isset($_POST["passwordUser"]) != "" ? $_POST["passwordUser"] : "");

if($loginUser == null || $passwordUser == null){

    echo $msg_error = "não deu bom";
    echo "01";

    exit;
} else {
    require_once "auth.php";
}


function verSession(){
    if(empty(session_id())){
        echo "sessao vazia";
        // header('Location: ././login.php');
        include_once "././login.php";
        exit();
    }
}

?>