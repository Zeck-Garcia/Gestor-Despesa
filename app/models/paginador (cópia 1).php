<ul class="pagination justify-content-center">
<?php

if($numTotalB){
    $numTotalC = $numTotalB;
} else {
    $numTotalC = $numTotal;
}



$totalPagina = ceil($numTotalC / $quantidade);


echo "<li class='page-item disabled'><span class='page-link'>Total de Registro $numTotalC</span></li>";

echo "<li class='page-item'><a class='page-link' href='?page=contatos&pagina=1'>Primeira página</a></li> ";

$paginaB = (isset($_GET["pagina"]));

if($paginaB > 2){
    ?>
    <li class="page-item"><a class="page-link" href="?page=$pageAtual&pagina=<?php echo $paginaB-1?>"> &laquo; </a></li>

    <?php
}

for($i = 1 ; $i <= $totalPagina ; $i++ ){
    
    if($i >= ($paginaB - 4) && $i <= ($paginaB + 5)){
        if($i == $pagina){
        // if($i == $pagina){

            echo "<li class='page-item active'><span class='page-link'>$i</span></li> ";
            // echo $inicioB;
        } else {
            echo "<li class='page-item'><a class='page-link' href='?page=$pageAtual&pagina=$i'>$i</a></li> ";
            // echo $inicioB;
        }
    }
}

if($paginaB < ($totalPagina - 1)){
    ?>
    <li class="page-item"><a class="page-link" href="?page=$pageAtual&pagina=<?php echo $paginaB+1?>"> &raquo; </a></li>
    <?php
}

echo "<li class='page-item'><a class='page-link' href='?page=contatos&pagina=$totalPagina'>Última página</a></li>";


?>
</ul>