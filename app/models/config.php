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