<?php

require_once "manipulacaoDeDados.php";
$operation = new manipulacaoDeDados();   

$loginUser = (isset($_POST["loginUser"]) != "" ? $_POST["loginUser"]  : "");
$passwordUser = (isset($_POST["passwordUser"]) != "" ? $_POST["passwordUser"] : "");

$sql = "SELECT * FROM tbuser WHERE loginUser = '{$loginUser}' and passwordUser = '{$passwordUser}'";

$qry = $operation->executarSQL($sql);

$dados = $operation->listar($qry);

$linha = mysqli_num_rows($qry);

    if($linha != 0){
        session_start();

        $_SESSION["loginUser"] = $loginUser;
        $_SESSION["passwordUser"] = $passwordUser;
        
        $_SESSION["tipoUser"] = $dados["tipoUser"];
        $_SESSION["idUser"] = $dados["idUser"];
        $_SESSION["imgUser"] = $dados["fotoUser"];
        
        echo "login feito";
        
        // header('Location: ././index.php?page=list-despesa');
    } else {

        echo "sessão apagada";
        session_unset();
        // echo $msg_error = "não deu bom";
        // session_destroy();
            
        // header('Location: ././login.php');
        exit();

    }

    ?>