<?php
// session_start();

global $txtPesquisa;
global $txtPlaceholderPesquisar;

    $page = (isset($_GET["page"]) ? $_GET["page"]: "home");

    $action = (isset($_GET["action"]) != "" ? $_GET["action"]: "login");

    $txtLimpar = (isset($_POST["txtLimpar"]) == "" ? "" : $_POST["txtLimpar"]);

    $_SESSION["txtPesquisa"] = (isset($_POST["txtPesquisa"]) == "" ? "" : $_POST["txtPesquisa"]);
    $txtPesquisa = (isset($_POST["txtPesquisa"]) == "" ? "" : $_POST["txtPesquisa"]);

    // echo $txtPesquisa = $_SESSION["txtPesquisa"];
    // echo ($_POST["txtPesquisa"])."<br>";

    if(isset($_POST["txtLimpar"])){
        // $_SESSION["txtPesquisa"] = null;
        // $txtPesquisa = null;
    }

    // echo session_status();
    echo session_id() . "<br>";

// echo $_SESSION["loginUser"];

    $_SESSION['txtPesquisa'];
    // if(isset($_SESSION['txtPesquisa']) != ""){
    if($_POST){
        // $txtPesquisa = $_SESSION['txtPesquisa'];
    }

?>

    <form class="form-group" method="post" action="">
            <!-- "index.php?page=$page&searching=contatos&search=$txtPesquisa&pagina=1" -->
        
<div class="row mt-3">
    <div class="col">    
        <input class="form-control" type="text" name="txtPesquisa" value="<?= $_SESSION['txtPesquisa']?>" placeholder="
        <?=($txtPlaceholderPesquisar == "" ? "Digite sua pesquisa aqui!" : $txtPlaceholderPesquisar);?>
        ">
    </div>
    <div class="col">
            <button class="btn btn-success btnSubMit" type="submit" value="Pesquisar">Pesquisar <i class="bi bi-search"></i></button>

            <button class="btn btn-danger" name="txtLimpar" type="submit" value="">Limpar <i class="bi bi-trash"></i></button>
        </div>
</div>
</form>

<?php
// $txtPesquisa = (isset($_POST["txtPesquisa"]) == "" ? "" : $_POST["txtPesquisa"]);
?>
