<?php
    $hoje = date("m/Y");

    //INICIO FILTER RESUMO TITULAR
    $sqlFilterResumoTitular = "SELECT DISTINCT titularReceita, SUM(valorReceita) AS valorReceita, dataReceita FROM tbreceita WHERE dataReceita IN
    (    
        SELECT dataReceita valorReceita FROM tbreceita WHERE DATE_FORMAT(dataReceita, '%m/%Y')='$hoje'
    )
    GROUP BY titularReceita
    ";
    $qryFilterResumoTitular = $operation->executarSQL($sqlFilterResumoTitular);
    //FIM FILTER RESUMO TITULAR

    //INICIO FILTER SALDO MES ATUAL
    $sqlFilterSaldoMesAtual = "SELECT dataReceita, SUM(valorReceita) AS valorReceita FROM tbreceita WHERE DATE_FORMAT(dataReceita, '%m/%Y')='$hoje'
    ";
    $qryFilterSaldoMesAtual = $operation->executarSQL($sqlFilterSaldoMesAtual);

    while($resumoSaldoMesAtual = $operation->listar($qryFilterSaldoMesAtual))
    { 
         $saldoMesAtual = $resumoSaldoMesAtual["valorReceita"];
    }//FIM FILTER SALDO MES ATUAL

    //INICIO FILTER DIVIDA MES ATUAL
    $sqlFilterDividaMesAtual = "SELECT SUM(valorDespesaDescricao) AS valorDespesaDescricao FROM tbdespesadescricao WHERE DATE_FORMAT(dataPagamentoDespesaDescricao, '%m/%Y')='$hoje'
    ";
    
    $qryFilterDividaMesAtual = $operation->executarSQL($sqlFilterDividaMesAtual);

    while($resumoDividaMesAtual = $operation->listar($qryFilterDividaMesAtual))
    { 
       $dividaMesAtual = number_format($resumoDividaMesAtual["valorDespesaDescricao"], 2, ",", ".");
    }//FIM FILTER DIVIDA MES ATUAL

    //INICIO FILTER A PAGAR MES ATUAL
    $sqlFilterAPagarMesAtual = "SELECT situacaoDespesaDescricao, SUM(valorDespesaDescricao) AS valorDespesaDescricao FROM tbdespesadescricao WHERE DATE_FORMAT(dataPagamentoDespesaDescricao, '%m/%Y')='$hoje' AND situacaoDespesaDescricao<>'pago'
    ";
    
    $qryFilterAPagarMesAtual = $operation->executarSQL($sqlFilterAPagarMesAtual);
    
    while($resumoAPagarMesAtual = $operation->listar($qryFilterAPagarMesAtual))
    { 
         $aPagarMesAtual = number_format($resumoAPagarMesAtual["valorDespesaDescricao"], 2, ",", ".");
    }//FIM FILTER A PAGAR MES ATUAL

   $totalA = ($saldoMesAtual == "" ? 100 : $saldoMesAtual);
//    $total = is_numeric(($aPagarMesAtual) - is_numeric($saldoMesAtual));

   echo bcadd($totalA, 50);
?>

<div class="row p-3">
    <div class="row">
        <h2>Resumo do mes</h2>
    </div>
    <div class="col">
        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">saldo inicial da conta no mes atual</h6>
            <div class="row ">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-success text-white"><h4><span class="text-white"><?= $moeda . " "?></span><?= $saldoMesAtual ?></h4></li>
                </ul>
            </div>            
            
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">total da divida desse mes</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-info text-white"><h4><span class="text-white"><?= $moeda . " "?></span><?= $dividaMesAtual?></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">a ainda a pagar</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-warning text-white"><h4><span class="text-white"><?= $moeda . " "?></span><?= $aPagarMesAtual?></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">saldo da conta após pagar todas as contas</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-secondary text-white"><h4><span class="text-white"><?= $moeda . " "?></span></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            
            <?php
                // $date = new DateTime($resumoTitular["dataReceita"]); 
                // $date->format("m/Y");

                while($resumoTitular = $operation->listar($qryFilterResumoTitular))
                { 
                    ?>
                    <details class="card mt-3">
                    <!-- echo $resumoTitular["titularReceita"]; -->
                    <summary class="card-header"><?= $resumoTitular["titularReceita"] ?></summary>
                <ul class="card-body">
                    <li class="list-group-item"><?= "Salário: ".$moeda. number_format($resumoTitular["valorReceita"], 2, ",", ".") ?></li>
                    <!-- <li class="list-group-item"></li> -->
                    <!-- <li class="list-group-item">valor já pago</li> -->
                    <!-- <li class="list-group-item">saldo da conta</li> -->
                    <!-- <li class="list-group-item">a pagar</li> -->
                    <!-- <li class="list-group-item">qtd de conta a pagar ou pagas</li> -->
                    <!-- <li class="list-group-item"></li> -->
                    <!-- <li class="list-group-item"></li> -->
                </ul>
            </details>
                
                <?php }
            ?>
        </div>
    </div>
</div>








