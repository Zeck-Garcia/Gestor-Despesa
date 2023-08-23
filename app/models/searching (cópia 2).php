<?php
include_once "app/models/manipulacaoDeDados.php";
$operation = new manipulacaoDeDados();

// session_start();
function searching(){

    global $operation;
    global $txtPesquisa;
    global $sql;
    global $sqlB;
    global $quantidade;
    global $pagina;
    global $pageAtual;
    global $paginaB;
    global $inicio;
    global $inicioB;
    global $qry;
    global $qryB;
    global $qrTotal;
    global $qrTotalB;
    global $dados;
    global $tabela;
    global $camposSelect;
    global $camposWherePesquisaPrincipal;
    global $camposPesquisaAdd;
    global $numTotal;
    global $numTotalB;
    global $numTotalC;
    global $orderBy;
    global $orderByType;

    $numTotalB = 1;
    
    $pagina = (isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1);
    $inicio = ($quantidade * $pagina) - $quantidade;
    $pageAtual = $_GET["page"];
    
    if($inicio == 0){
        $inicio = $inicio;
    
    } else {
        $inicio = ($quantidade * $pagina) - $quantidade;
    }

    //sql1
   $sql = "SELECT $camposSelect FROM $tabela 
    WHERE 
        $camposWherePesquisaPrincipal='$txtPesquisa'
        $camposPesquisaAdd
        ORDER BY 
        $orderBy $orderByType

        LIMIT $inicio, $quantidade
    ";

    //ORDER BY flagFavoritoContato DESC, nomeContato ASC

    $qry = $operation->executarSQL($sql); //1

    $qrTotal = $operation->executarSQL($sql);//2
    // echo $numTotal = mysqli_num_rows($qrTotal);

    //sql2
    $sqlB = "SELECT $camposSelect FROM $tabela 
    WHERE 
        $camposWherePesquisaPrincipal='$txtPesquisa'
        $camposPesquisaAdd
        
    ";
        // OR $camposPesquisaAdd LIKE '%$txtPesquisa%'


    $qryB = $operation->executarSQL($sqlB); //1
    $numTotalB = mysqli_num_rows($qryB);//2-------

    if(!$numTotalB){
        echo "
            <div class='alert alert-danger' role='alert'>
            <h4 class='alert-heading'>Não encontrato</h4>
            <p class=''>Não foi encontrado nenhum registro com o termo solicitado</p>
        </div>
        ";
    }

}