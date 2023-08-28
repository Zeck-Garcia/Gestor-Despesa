</php


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
                    <li class="card-title list-group-item text-center bg-success text-white"><h4><span class="text-white"><?= $moeda . " "?></span>1.965,00</h4></li>
                </ul>
            </div>            
            
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">total da divida desse mes</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-info text-white"><h4><span class="text-white"><?= $moeda . " "?></span>1.965,00</h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">a ainda a pagar</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-warning text-white"><h4><span class="text-white"><?= $moeda . " "?></span>1.965,00</h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            <h6 class="card-subtitle mb-2 text-muted">saldo da conta após pagar todas as contas</h6>
            <div class="row">
                <ul class="list-group">
                    <li class="card-title list-group-item text-center bg-secondary text-white"><h4><span class="text-white"><?= $moeda . " "?></span>1.965,00</h4></li>
                </ul>
            </div>  
        </div>

        <div class="row shadow p-3 mb-2 bg-white rounded">
            
            <?php
                $sqlFilterResumoTitular = "SELECT * FROM tbreceita";
                
                $qryFilterResumoTitular = $operation->executarSQL($sqlFilterResumoTitular);
                
                while($resumoTitular = $operation->listar($qryFilterResumoTitular))
                { ?>
                    <details class="card mt-3">
                    <!-- echo $resumoTitular["titularReceita"]; -->
                    <summary class="card-header"><?= $resumoTitular["titularReceita"]?></summary>
                <ul class="card-body">
                    <li class="list-group-item"><?="Salário ".$moeda. number_format($resumoTitular["valorReceita"], 2, ",", ".") ?></li>
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








