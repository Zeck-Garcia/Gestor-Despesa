<?php
echo "page filter<br>";

include_once "manipulacaoDeDados.php";
// include_once "function-despesa.php";
// include_once "app/models/manipulacaoDeDados.php";
// include_once "app/models/function-despesa.php";
$operation = new manipulacaoDeDados();


$yearCampoFilter = "";
$dataDespesaDescricao = (strip_tags(isset($_POST["dataDespesaDescricao"])) == "" ? "" : substr($_POST["dataDespesaDescricao"], 0, 7));

$btn = (isset($_POST["btnAcaoFormDespesa"]) == "" ? "" : $_POST["btnAcaoFormDespesa"]);

echo "<br>";

if((isset($_POST["btnAcaoFormDespesa"]) == "" ? "" : $_POST["btnAcaoFormDespesa"])){
    echo "btn chamado";
    
    $sqlSearchRecord = "SELECT  DISTINCT dataDespesa, idDespesa FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao' GROUP BY dataDespesa";
    
    $qrySearchRecord = $operation->executarSQL($sqlSearchRecord); //1
    
    while($date = $operation->listar($qrySearchRecord)){
        echo $valor = $date["idDespesa"];
    };
    
    $linha = mysqli_num_rows($qrySearchRecord);

    if($linha != 0){
        echo "tem linha";

        $nomeDespesaDescricao = strip_tags(isset($_POST["nomeDespesaDescricao"]));
        $valorDespesaDescricao = strip_tags(isset($_POST["valorDespesaDescricao"]));
        $dataDespesaDescricao = strip_tags(isset($_POST["dataDespesaDescricao"]));
        $tipoDespesaDescricao = strip_tags(isset($_POST["tipoDespesaDescricao"]));
        $titularDespesaDescricao = strip_tags(isset($_POST["titularDespesaDescricao"]));
        $situacaoDespesaDescricao = strip_tags(isset($_POST["situacaoDespesaDescricao"]));
        $idDespesaDescricaoIdDespesa = $valor;
        
    
        $operation->setTabela("tbdespesadescricao");
        $operation->setCampos("
                nomeDespesaDescricao, 
                valorDespesaDescricao,
                dataDespesaDescricao,
                tipoDespesaDescricao,
                titularDespesaDescricao,
                situacaoDespesaDescricao,
                idDespesaDescricaoIdDespesa
                ")
            ;
    
        $operation->setDados("'$nomeDespesaDescricao', '$valorDespesaDescricao', '$dataDespesaDescricao', '$tipoDespesaDescricao', '$titularDespesaDescricao', '$situacaoDespesaDescricao', '$idDespesaDescricaoIdDespesa'");
    
        $operation->inserir();
    
        echo $operation->getMsg();
    } else {
        echo "não tem linha<br>fazendo registro";
        $dataDespesa = (strip_tags(isset($_POST["dataDespesaDescricao"])) == "" ? "" : substr($_POST["dataDespesaDescricao"], 0 , 7));
        $anoDespesa = (strip_tags(isset($_POST["dataDespesaDescricao"])) == "" ? "" : substr(isset($_POST["dataDespesaDescricao"]), 0, 4));


        $operation->setTabela("tbdespesa");
        $operation->setCampos("
                dataDespesa, 
                anoDespesa
                ")
            ;

        $operation->setDados("'$dataDespesa', '$anoDespesa'");

        $operation->inserir();

        echo "Criado na tabela tbdespesa";

        $nomeDespesaDescricao = strip_tags(isset($_POST["nomeDespesaDescricao"]));
        $valorDespesaDescricao = strip_tags(isset($_POST["valorDespesaDescricao"]));
        $dataDespesaDescricao = strip_tags(isset($_POST["dataDespesaDescricao"]));
        $tipoDespesaDescricao = strip_tags(isset($_POST["tipoDespesaDescricao"]));
        $titularDespesaDescricao = strip_tags(isset($_POST["titularDespesaDescricao"]));
        $situacaoDespesaDescricao = strip_tags(isset($_POST["situacaoDespesaDescricao"]));
        $idDespesaDescricaoIdDespesa = $valor;
        
    
        $operation->setTabela("tbdespesadescricao");
        $operation->setCampos("
                nomeDespesaDescricao, 
                valorDespesaDescricao,
                dataDespesaDescricao,
                tipoDespesaDescricao,
                titularDespesaDescricao,
                situacaoDespesaDescricao,
                idDespesaDescricaoIdDespesa
                ")
            ;
    
        $operation->setDados("'$nomeDespesaDescricao', '$valorDespesaDescricao', '$dataDespesaDescricao', '$tipoDespesaDescricao', '$titularDespesaDescricao', '$situacaoDespesaDescricao', '$idDespesaDescricaoIdDespesa'");
    
        $operation->inserir();
    
        echo $operation->getMsg();


    }

    // echo $valor;
    echo "ainda bom";

} else {
    echo "deu rium no btn";
}

function searchDateRecord(){

    global $operation;
    // global $sqlSearchRecord;
    global $qrySearchRecord;
    global $valor;
    global $dataDespesaDescricao;
    // global $date;

    $sqlSearchRecord = "SELECT DISTINCT dataDespesa, FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao' GROUP BY dataDespesa";
    // $sqlSearchRecord = "SELECT dataDespesa, idDespesa FROM tbdespesa WHERE dataDespesa='$dataDespesaDescricao'";
// 
    
    $qrySearchRecord = $operation->executarSQL($sqlSearchRecord); //1
    
    while($date = $operation->listar($qrySearchRecord)){
       echo $valor = $date["dataDespesa"]."<br>";
    };
}


// function validRegister(){

//     global $qrySearchRecord;
//     global $valor;
//     global $dataDespesaDescricao;

//     // $dataDespesaDescricao = (strip_tags($_POST["dataDespesaDescricao"]) == "" ? "" : substr($_POST["dataDespesaDescricao"], 0, 7));

//     if(!empty(mysqli_num_rows($qrySearchRecord))){
//         //aqui deve ser passado o idDespesa para a tabela tbDespesaDescricao
//         echo $valor . "<br>";
//         echo "tem <br>";

//         cadDespesaDescricao();
//     } else {
//         //faço o registro na tbdespesa
//         //aqui já que é um novo registro deve ser cadastrado e retornado a id
//         echo "não tem<br>";
//         echo $valor . "<br>";
//         cadDespesa();
//     }
// }



// cadDespesaDescricao();

