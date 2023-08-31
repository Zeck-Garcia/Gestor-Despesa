<?php
include_once "app/models/manipulacaoDeDados.php";
$operation = new manipulacaoDeDados();


// while($dados = $operation->listar(($qry))){
//     echo $dados['moedaConfig'];
// }

$sqlConfig = "SELECT moedaConfig FROM tbconfig";
        
$qryConfig = $operation->executarSQL($sqlConfig); //1

while($dados = $operation->listar($qryConfig)){
    // $yeara = $year["anoDespesa"];
    $moeda = $dados['moedaConfig'] . " ";
}; 

// $dateTimeServer = time


$urlCompletaAtual = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], '/')+1);

$urlSimples = $_SERVER["SCRIPT_NAME"];

$urlParamentros = $_SERVER["QUERY_STRING"];

