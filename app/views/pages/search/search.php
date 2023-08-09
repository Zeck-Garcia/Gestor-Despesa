<?php
// session_start();

global $txtPesquisa;
global $txtPlaceholderPesquisar;

    $page = (isset($_GET["page"]) ? $_GET["page"]: "home");

    $action = (isset($_GET["action"]) != "" ? $_GET["action"]: "login");

    $txtLimpar = (isset($_POST["txtLimpar"]));

    if(isset($_POST["txtLimpar"])){
        $_SESSION["euaqui"] = null;
        $txtPesquisa = null;
    }


    if(isset($_SESSION['euaqui']) != ""){
        $txtPesquisa = $_SESSION['euaqui'];
    }

    ?>

<!-- <form class="form-group" method="POST" action=""> -->
        
<!-- <form class="form-group" method="POST" action=""> -->
    <form class="form-group" method="POST" action="">
            <!-- "index.php?page=$page&searching=contatos&search=$txtPesquisa&pagina=1" -->
        
<div class="row mt-3">
    <div class="col">    
        <input class="form-control" type="text" name="txtPesquisa" value="<?= $txtPesquisa?>" placeholder="
        <?=($txtPlaceholderPesquisar == "" ? "Digite sua pesquisa aqui!" : $txtPlaceholderPesquisar);?>
        ">
    </div>
    <div class="col">
            <button class="btn btn-success" type="submit" value="Pesquisar">Pesquisar <i class="bi bi-search"></i></button>

            <button class="btn btn-danger" name="txtLimpar" type="submit" value="">Limpar <i class="bi bi-trash"></i></button>
        </div>
</div>
</form>
