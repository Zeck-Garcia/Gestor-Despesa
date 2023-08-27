<?php
    // global $txtPesquisa;
    global $txtPlaceholderPesquisar;

    $page = (isset($_GET["page"]) ? $_GET["page"]: "home");

?>

    <form class="form-group" method="post" action="">
            <!-- "index.php?page=$page&searching=contatos&search=$txtPesquisa&pagina=1" -->
        
<div class="row mt-3">
    <div class="col">    
        <input class="form-control" type="text" name="txtPesquisa" value="<?= $_SESSION["txtPesquisa"]?>" placeholder="
        <?=($txtPlaceholderPesquisar == "" ? "Digite sua pesquisa aqui!" : $txtPlaceholderPesquisar);?>
        ">
    </div>
    <div class="col">
            <button class="btn btn-success btnSubMit btnSubmitSearch" type="submit" onclick="" name="btnPesquisa" value="Pesquisar">Pesquisar <i class="bi bi-search"></i></button>

            <button class="btn btn-danger" name="txtLimpar" type="submit" value="txtLimpar">Limpar <i class="bi bi-trash"></i></button>
        </div>
</div>
</form>

<?php

?>
