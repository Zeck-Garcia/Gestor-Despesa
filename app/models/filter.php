<?php

include_once "manipulacaoDeDados.php";
include_once "function-despesa.php";
$operation = new manipulacaoDeDados();

$page = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);

// $_POST["nomeDespesaDescricao"] == "";
// $_POST["valorDespesaDescricao"] == "";
// $_POST["dataDespesaDescricao"] == "";
// $_POST["tipoDespesaDescricao"] == "";
// $_POST["tipoDespesaDescricao"] == "";
// $_POST["titularDespesaDescricao"] == "";
// $_POST["situacaoDespesaDescricao"] == "";
// $idDespesaDescricaoIdDespesa = "";

// $btnDespesaAddDescricao = (isset($_POST["index.php?page=2&action=cadastro"]) == "" ? "" : $_POST["index.php?page=2&action=cadastro"]);
// $btnDespesaAddDescricao = (isset($_POST["btnAcaoFormDespesa"]) == "" ? "" : $_POST["btnAcaoFormDespesa"]);

// $page["index.php?page=1&action=cadastro"] =  "app/models/filter.php";

if($page == "a-inserir-cadastro-despesa"){
    
    searchDateRecord();

    echo $linha = mysqli_num_rows($qrySearchRecord);

    if($linha != 0){
        cadDespesaDescricao();
    } else {
        cadDespesa();
        searchDateRecord();
        cadDespesaDescricao();
    }
    include_once "app/views/pages/table/table-despesa.php";
}

// function searchDateRecord(){

//     global $operation;
//     // global $sqlSearchRecord;
//     global $qrySearchRecord;
//     global $valor;
//     global $dataDespesaDescricao;
//     // global $date;

//     $sqlSearchRecord = "SELECT DISTINCT dataDespesa, FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao' GROUP BY dataDespesa";
//     // $sqlSearchRecord = "SELECT dataDespesa, idDespesa FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao'";
// // 
    
//     $qrySearchRecord = $operation->executarSQL($sqlSearchRecord); //1
    
//     while($date = $operation->listar($qrySearchRecord)){
//        $valor = $date["dataDespesa"]."<br>";
//     };
// }
