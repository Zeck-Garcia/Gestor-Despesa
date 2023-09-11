<?php

function deleteitemsDB(){
    if($_POST["qtdEnvio"] = 1){
        
        global $operation;

        global $tabela;
        global $valorNaTabela;

        $operation->setTabela($tabela);

        $operation->setValorNaTabela($valorNaTabela);

        $operation->setValorPesquisa($_GET["id"]);

        $operation->excluir();
        
        echo $operation->getMsg();

    }
}

?>