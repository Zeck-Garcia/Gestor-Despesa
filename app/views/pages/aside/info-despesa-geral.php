<?php

    //INICIO FILTER RESUMO TITULAR
    $sqlFilterResumoTitular = "SELECT DISTINCT titularReceita, SUM(valorReceita) AS valorReceita, dataReceita FROM tbreceita WHERE dataReceita IN
    (    
        SELECT dataReceita valorReceita FROM tbreceita WHERE DATE_FORMAT(dataReceita, '%m/%Y')='$todayMonthYear'
    )
    GROUP BY titularReceita
    ";
    $qryFilterResumoTitular = $operation->executarSQL($sqlFilterResumoTitular);
    //FIM FILTER RESUMO TITULAR

    //INICIO FILTER SALDO MES ATUAL
    $sqlFilterSaldoMesAtual = "SELECT dataReceita, SUM(valorReceita) AS valorReceita FROM tbreceita WHERE DATE_FORMAT(dataReceita, '%m/%Y')='$todayMonthYear'
    ";
    $qryFilterSaldoMesAtual = $operation->executarSQL($sqlFilterSaldoMesAtual);

    while($resumoSaldoMesAtual = $operation->listar($qryFilterSaldoMesAtual))
    { 
         $saldoMesAtual = $resumoSaldoMesAtual["valorReceita"];
    }//FIM FILTER SALDO MES ATUAL

    //INICIO FILTER DIVIDA MES ATUAL
    $sqlFilterDividaMesAtual = "SELECT SUM(valorDespesaDescricao) AS valorDespesaDescricao FROM tbdespesadescricao WHERE DATE_FORMAT(dataPagamentoDespesaDescricao, '%m/%Y')='$todayMonthYear'
    ";
    
    $qryFilterDividaMesAtual = $operation->executarSQL($sqlFilterDividaMesAtual);

    while($resumoDividaMesAtual = $operation->listar($qryFilterDividaMesAtual))
    { 
       $dividaMesAtual = $resumoDividaMesAtual["valorDespesaDescricao"];
    }//FIM FILTER DIVIDA MES ATUAL

    //INICIO FILTER A PAGAR MES ATUAL
    $sqlFilterAPagarMesAtual = "SELECT situacaoDespesaDescricao, SUM(valorDespesaDescricao) AS valorDespesaDescricao FROM tbdespesadescricao WHERE DATE_FORMAT(dataPagamentoDespesaDescricao, '%m/%Y')='$todayMonthYear' AND situacaoDespesaDescricao<>'pago'
    ";
    
    $qryFilterAPagarMesAtual = $operation->executarSQL($sqlFilterAPagarMesAtual);
    
    while($resumoAPagarMesAtual = $operation->listar($qryFilterAPagarMesAtual))
    { 
         $aPagarMesAtual = $resumoAPagarMesAtual["valorDespesaDescricao"];
    }//FIM FILTER A PAGAR MES ATUAL

    //INICIO FILTER TOTAL JA PAGO
    $sqlFilterTotalJaPago = "SELECT situacaoDespesaDescricao, SUM(valorDespesaDescricao) AS valorDespesaDescricao FROM tbdespesadescricao WHERE DATE_FORMAT(dataPagamentoDespesaDescricao, '%m/%Y')='$todayMonthYear' AND situacaoDespesaDescricao='pago'
    ";
    
    $qryFilterTotalJaPago = $operation->executarSQL($sqlFilterTotalJaPago);
    
    while($resumoTotalJaPago = $operation->listar($qryFilterTotalJaPago))
    { 
            $TotalJaPago = $resumoTotalJaPago["valorDespesaDescricao"];
    }//FIM FILTER TOTAL JA PAGO

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
                    <li class="card-title list-group-item text-center bg-success text-white"><h4><span class="text-white"><?= $moeda . " "?><?= number_format($saldoMesAtual, 2, ",", ".") ?></span></h4></li>
                </ul>
            </div>            
            
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">total da divida desse mes</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-info text-white"><h4><span class="text-white"><?= $moeda . " "?><?= number_format($dividaMesAtual, 2, ",", ".")?></span></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">a ainda a pagar</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-warning text-white"><h4><span class="text-white"><?= $moeda . " "?><?= number_format($aPagarMesAtual, 2, ",", ".")?></span></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">Total já pago</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center text-white bg-info"><h4><span class="text-white"><?= $moeda . " " . number_format($TotalJaPago,2, ",", "." )?></span></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">saldo da conta após pagar todas as contas</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center text-white <?= $saldoMesAtual - $dividaMesAtual < 0 ? 'bg-danger' : 'bg-secondary' ?>"><h4><span class="text-white"><?= $moeda . " " . number_format($saldoMesAtual - $dividaMesAtual, 2, ",", ".")?></span></h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            
            <?php

                while($resumoTitular = $operation->listar($qryFilterResumoTitular))
                { 
                    ?>
                    <details class="card mt-3">
                    <!-- echo $resumoTitular["titularReceita"]; -->
                    <summary class="card-header"><?= $resumoTitular["titularReceita"] ?></summary>
                <ul class="card-body">
                    <li class="list-group-item"><?= "Salário: ".$moeda. number_format($resumoTitular["valorReceita"], 2, ",", ".") ?></li>                    <!-- <li class="list-group-item">valor já pago</li> -->
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


<?php


?>




