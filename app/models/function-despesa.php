<?php
include_once "manipulacaoDeDados.php";

$operation = new manipulacaoDeDados();

$id = (isset($_GET["id"]) == "" ? "" : $_GET["id"]);
$dataPagamentoDespesaDescricao = (strip_tags(isset($_POST["dataPagamentoDespesaDescricao"])) == "" ? "" : substr($_POST["dataPagamentoDespesaDescricao"], 0, 7));

// $sqlSearchRecord = "SELECT  DISTINCT dataDespesa, idDespesa FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao' GROUP BY dataDespesa";
    
// $qrySearchRecord = $operation->executarSQL($sqlSearchRecord); //1

// while($date = $operation->listar($qrySearchRecord)){
//     $valor = $date["idDespesa"];
// };


function searchDateRecord(){

    global $operation;
    // global $sqlSearchRecord;
    global $qrySearchRecord;
    global $valor;
    global $dataPagamentoDespesaDescricao;
    global $idDespesaPOST;
    // global $date;

    $sqlSearchRecord = "SELECT DISTINCT dataDespesa, idDespesa FROM tbdespesa WHERE dataDespesa='{$dataPagamentoDespesaDescricao}' GROUP BY dataDespesa";
    // $sqlSearchRecord = "SELECT dataDespesa, idDespesa FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao'";
    
    $qrySearchRecord = $operation->executarSQL($sqlSearchRecord); //1
    
    while($date = $operation->listar($qrySearchRecord)){
       echo $valor = $date["dataDespesa"];
       echo $idDespesaPOST = $date["idDespesa"];
    };
}

function cadDespesaDescricao(){

    global $operation;

    global $nomeDespesaDescricao;
    global $valorDespesaDescricao;
    global $dataPagamentoDespesaDescricao;
    global $tipoDespesaDescricao;
    global $titularDespesaDescricao;
    global $situacaoDespesaDescricao;
    global $idDespesaDescricaoIdDespesa;
    global $idDespesaPOST;
    global $msgInBox;

    global $valorTotalDespesa;
    global $dataDespesa;
    global $valor;

    // $valorTotalDespesa = strip_tags(isset($_POST["valorTotalDespesa"]));
    // $dataDespesa = strip_tags(isset($_POST["dataDespesa"]));
    
    $nomeDespesaDescricao = (strip_tags(isset($_POST["nomeDespesaDescricao"])) == "" ? "" : $_POST["nomeDespesaDescricao"]);
    $valorDespesaDescricao = (strip_tags(isset($_POST["valorDespesaDescricao"])) == "" ? "" : str_replace(',', '.', $_POST["valorDespesaDescricao"]));
    $dataPagamentoDespesaDescricao = (strip_tags(isset($_POST["dataPagamentoDespesaDescricao"])) == "" ? "" : $_POST["dataPagamentoDespesaDescricao"]);
    $tipoDespesaDescricao = (strip_tags(isset($_POST["tipoDespesaDescricao"])) == "" ? "" : $_POST["tipoDespesaDescricao"]);
    $titularDespesaDescricao = (strip_tags(isset($_POST["titularDespesaDescricao"])) == "" ? "" : $_POST["titularDespesaDescricao"]);
    $situacaoDespesaDescricao = (strip_tags(isset($_POST["situacaoDespesaDescricao"])) == "" ? "" : $_POST["situacaoDespesaDescricao"]);
    $idDespesaDescricaoIdDespesa = $idDespesaPOST;
    

    $operation->setTabela("tbdespesadescricao");
    $operation->setCampos("
            nomeDespesaDescricao, 
            valorDespesaDescricao,
            dataPagamentoDespesaDescricao,
            tipoDespesaDescricao,
            titularDespesaDescricao,
            situacaoDespesaDescricao,
            idDespesaDescricaoIdDespesa
            ")
        ;

    $operation->setDados("'$nomeDespesaDescricao', '$valorDespesaDescricao', '$dataPagamentoDespesaDescricao', '$tipoDespesaDescricao', '$titularDespesaDescricao', '$situacaoDespesaDescricao', '$idDespesaDescricaoIdDespesa'");

    $operation->inserir();

    echo $operation->getMsg();
   
}

function cadDespesa(){
    
    global $operation;
    global $dataDespesa;
    global $anoDespesa;
    
    $dataDespesa = (strip_tags(isset($_POST["dataPagamentoDespesaDescricao"])) == "" ? "" : substr($_POST["dataPagamentoDespesaDescricao"], 0 , 7));
    $anoDespesa = (strip_tags(isset($_POST["dataPagamentoDespesaDescricao"])) == "" ? "" : substr($_POST["dataPagamentoDespesaDescricao"], 0, 4));
    
    
    $operation->setTabela("tbdespesa");
    $operation->setCampos("
                        dataDespesa, 
                        anoDespesa
                         ")
                        ;
    
    $operation->setDados("'$dataDespesa', '$anoDespesa'");
    
    $operation->inserir();
    
    // echo $operation->getMsg();
}

function salveSituacaoDespesa(){

    global $operation;
    global $nomeSituacaoDespesa;

    $nomeSituacaoReceita = (strip_tags(isset($_POST["nomeSituacaoDespesa"]) == "" ? "" : $_POST["nomeSituacaoDespesa"]));

    $operation->setTabela("tbsituacaodespesa");
    $operation->setCampos("
        nomeSituacaoDespesa
    ");
    $operation->setDados("'$nomeSituacaoDespesa'");

    $operation->inserir();

    echo $operation->getMsg();
    
    
}

function editDespesa(){
    
}

function editeddespesa(){
    global $operation;

    global $nomeDespesaDescricao;
    global $valorDespesaDescricao;
    global $dataPagamentoDespesaDescricao;
    global $tipoDespesaDescricao;
    global $titularDespesaDescricao;
    global $situacaoDespesaDescricao;
    global $idDespesaDescricaoIdDespesa;
    global $idDespesaPOST;
    global $msgInBox;

    global $valorTotalDespesa;
    global $dataDespesa;
    global $valor;

    // $valorTotalDespesa = strip_tags(isset($_POST["valorTotalDespesa"]));
    // $dataDespesa = strip_tags(isset($_POST["dataDespesa"]));
    
    $nomeDespesaDescricao = (strip_tags(isset($_POST["nomeDespesaDescricao"])) == "" ? "" : $_POST["nomeDespesaDescricao"]);
    $valorDespesaDescricao = (strip_tags(isset($_POST["valorDespesaDescricao"])) == "" ? "" : str_replace(',', '.', $_POST["valorDespesaDescricao"]));
    $dataPagamentoDespesaDescricao = (strip_tags(isset($_POST["dataPagamentoDespesaDescricao"])) == "" ? "" : $_POST["dataPagamentoDespesaDescricao"]);
    $tipoDespesaDescricao = (strip_tags(isset($_POST["tipoDespesaDescricao"])) == "" ? "" : $_POST["tipoDespesaDescricao"]);
    $titularDespesaDescricao = (strip_tags(isset($_POST["titularDespesaDescricao"])) == "" ? "" : $_POST["titularDespesaDescricao"]);
    $situacaoDespesaDescricao = (strip_tags(isset($_POST["situacaoDespesaDescricao"])) == "" ? "" : $_POST["situacaoDespesaDescricao"]);
    $idDespesaDescricaoIdDespesa = $idDespesaPOST;
    

    $operation->setTabela("tbdespesadescricao");
    $operation->setCampos("
            nomeDespesaDescricao, 
            valorDespesaDescricao,
            dataPagamentoDespesaDescricao,
            tipoDespesaDescricao,
            titularDespesaDescricao,
            situacaoDespesaDescricao,
            idDespesaDescricaoIdDespesa
            ")
        ;

    $operation->setDados("'$nomeDespesaDescricao', '$valorDespesaDescricao', '$dataPagamentoDespesaDescricao', '$tipoDespesaDescricao', '$titularDespesaDescricao', '$situacaoDespesaDescricao', '$idDespesaDescricaoIdDespesa'");

    $operation->alterar();

    echo $operation->getMsg();
}

?>