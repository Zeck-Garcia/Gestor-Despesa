<?php

function deleteitemsDB(){
    if($_POST["qtdEnvio"] = 1){
        
        global $operation;

        global $tabela;
        global $valorNaTabela;
        global $valorPesquisa;
        global $urlCompletaAtual;

        $operation->setTabela($tabela);

        $operation->setValorNaTabela($valorNaTabela);

        $operation->setValorPesquisa($_GET["id"]);

        $operation->excluir();
        
        // header("Location: sera");
        
        echo $operation->getMsg();


        // $urlCompletaAtual = str_replace('&action=delete', "", $urlCompletaAtual) . "<br>";
    }
}

function removeDelete(){
    if($_POST["qtdEnvio"] = 1){
    echo $_POST["qtdEnvio"];
    echo " deu bom na busca na function";

    }
}
?>