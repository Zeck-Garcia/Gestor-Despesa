<?php

include_once "manipulacaoDeDados.php";
include_once "function-despesa.php";
$operation = new manipulacaoDeDados();

$page = (isset($_REQUEST["page"]) == "" ? "" : $_REQUEST["page"]);

if($page == "a-inserir-cadastro-despesa"){
    
    searchDateRecord();

    $linha = mysqli_num_rows($qrySearchRecord);

    if($linha != 0){
        cadDespesaDescricao();
    } else {
        cadDespesa();
        searchDateRecord();
        cadDespesaDescricao();
    }

    include_once "app/views/pages/table/list-table-despesa.php";
    echo "<script>downdateUrl(oldUrl1);</script>";
}

?>