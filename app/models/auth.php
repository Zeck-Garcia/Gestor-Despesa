<?php

require_once "manipulacaoDeDados.php";
$operation = new manipulacaoDeDados();   

$sql = "SELECT * FROM tbuser WHERE loginUser = '{$loginUser}' and passwordUser = '{$passwordUser}'";

$qry = $operation->executarSQL($sql);

$dados = $operation->listar($qry);

$linha = mysqli_num_rows($qry);

    if($linha != 0){
        session_start();

        echo $_SESSION["loginUser"] = $loginUser;
        echo $_SESSION["passwordUser"] = $passwordUser;
        echo $_SESSION["tipoUser"] = $dados["tipoUser"];

        
        echo "login feito";
        
        header('Location: ../../index.php');
    } else {

        echo "sessão apagada";
        session_unset();
        session_destroy();
            
        header('Location: ../../app/views/login.php');
        exit();

    }