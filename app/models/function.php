<?php

function deleteitemsDB(){
        
    global $operation;

    global $tabela;
    global $valorNaTabela;

    $operation->setTabela($tabela);

    $operation->setValorNaTabela($valorNaTabela);

    $operation->setValorPesquisa($_GET["id"]);

    $operation->excluir();
    
    echo $operation->getMsg();
}

function searchBDTitular(){
    global $dados;
    global $operation;

    global $qrySearchBDTitular;
    global $camposSelect;
    global $tabelaTitular;
    global $camposWherePesquisaPrincipal;
    $camposWherePesquisaPrincipal = $_SESSION["idUser"];
    global $txtPesquisa;
    global $camposPesquisaAdd;
    global $orderBy;
    global $orderByType;
    global $dadosTitular;

    //busca exit


    $sqlSearchBDTitular = "SELECT $camposSelect FROM tbtitular
                            WHERE
                            $camposWherePesquisaPrincipal='$txtPesquisa'
                            OR $camposPesquisaAdd LIKE '%$txtPesquisa%'
                            ORDER BY $orderBy $orderByType
                        ";
    $qrySearchBDTitular = $operation->executarSQL($sqlSearchBDTitular);
    
    $dadosTitular = $operation->listar($qrySearchBDTitular);
}

function searchBDdespesa(){
    global $operation;
    global $qrySearchBDdespesa;
    global $tabela;
    global $camposSelect;
    global $camposWherePesquisaPrincipal;
    global $camposPesquisaAdd;
    global $orderBy;
    global $orderByType;
    global $txtPesquisa;
    global $dados;

    $sqlSearchBDdespesa = "SELECT $camposSelect FROM $tabela
                            WHERE 
                                $camposWherePesquisaPrincipal='$txtPesquisa'
                                OR $camposPesquisaAdd LIKE '%$txtPesquisa%'
                                ORDER BY $orderBy $orderByType
                                ";
    
    $qrySearchBDdespesa = $operation->executarSQL($sqlSearchBDdespesa);
    
    $dados = $operation->listar($qrySearchBDdespesa);
}

function salveTitular(){

    global $operation;
    global $nomeTitular;

    $nomeTitular = (strip_tags(isset($_POST["nomeTitular"]) == "" ? "" : $_POST["nomeTitular"]));

    $operation->setTabela("tbtitular ");
    $operation->setCampos("
        nomeTitular
    ");
    $operation->setDados("'$nomeTitular'");

    $operation->inserir();

    echo $operation->getMsg();

}

?>