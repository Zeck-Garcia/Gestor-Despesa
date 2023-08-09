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
            <details class="card">
                <summary class="card-header">Henrique Garcia</summary>
                <ul class="card-body">
                    <li class="list-group-item">salario do mes</li>
                    <li class="list-group-item">valor já pago</li>
                    <li class="list-group-item">saldo da conta</li>
                    <li class="list-group-item">a pagar</li>
                    <li class="list-group-item">qtd de conta a pagar ou pagas</li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
            </details>
        </div>
    </div>
</div>








