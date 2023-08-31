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

function salveCadastroReceita(){

    global $operation;

    $titularReceita = (strip_tags(isset($_POST["titularReceita"])) == "" ? "" : $_POST["titularReceita"]);
    $valorReceita = (strip_tags(isset($_POST["valorReceita"])) == "" ? "" : str_replace(',','.',$_POST["valorReceita"]));
    $descricaoReceita = (strip_tags(isset($_POST["descricaoReceita"])) == "" ? "" : $_POST["descricaoReceita"]);
    $categoriaReceita = (strip_tags(isset($_POST["categoriaReceita"])) == "" ? "" : $_POST["categoriaReceita"]);
    $dataPagamentoReceita = (strip_tags(isset($_POST["dataPagamentoReceita"])) == "" ? "" : $_POST["dataPagamentoReceita"]);
    $situacaoReceita = (strip_tags(isset($_POST["situacaoReceita"])) == "" ? "" : $_POST["situacaoReceita"]);

    

    $operation->setTabela("tbreceita");
    $operation->setCampos("
            titularReceita, 
            valorReceita,
            descricaoReceita,
            categoriaReceita,
            dataReceita,
            situacaoReceita
            ")
        ;

    $operation->setDados("'$titularReceita', '$valorReceita', '$descricaoReceita', '$categoriaReceita', '$dataPagamentoReceita', '$situacaoReceita'");

    $operation->inserir();

    echo $operation->getMsg();

}

?>
