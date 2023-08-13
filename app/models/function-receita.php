<?php

include_once "manipulacaoDeDados.php";

$operation = new manipulacaoDeDados();

function salveSituacaoReceita(){

    global $operation;
    global $nomeSituacaoReceita;

    $nomeSituacaoReceita = (strip_tags(isset($_POST["nomeSituacaoReceita"]) == "" ? "" : $_POST["nomeSituacaoReceita"]));

    $operation->setTabela("tbsituacaoreceita ");
    $operation->setCampos("
        nomeSituacaoReceita
    ");
    $operation->setDados("'$nomeSituacaoReceita'");

    $operation->inserir();

    echo $operation->getMsg();
}