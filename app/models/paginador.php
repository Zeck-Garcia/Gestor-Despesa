<ul class="pagination justify-content-center">
<?php
$pageSearchStart = (isset($_GET["pagina"]) == "" ? 1 : $_GET["pagina"]);

echo "<li class='page-item disabled'><span class='page-link'>Total de Registro $totalResgistro</span></li>";

echo "<li class='page-item'><a class='page-link' href='?page=$pageAtual&pagina=1'>Primeira página</a></li> ";

if($pageSearchStart > 3)
    if($pageSearchStart != 1){
        ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $pageAtual . "&pagina=" . $pageSearchStart-1?>"> &laquo; </a></li>
        <?php
}

for($i = 1 ; $i <= $totalPage ; $i++ ){ 
    if($i >= ($pageSearchStart - 3) && $i <= ($pageSearchStart + 3)){
        if($i == $pageSearchStart){
            echo "<li class='page-item active'><span class='page-link'>$i</span></li> ";
        } else {
            echo "<li class='page-item'><a class='page-link' href='?page=$pageAtual&pagina=$i'>$i</a></li> ";
        }
    }
}

if($pageSearchStart < ($totalPage - 3)){
    ?>
        <li class="page-item"><a class="page-link" href="?page=<?= $pageAtual . "&pagina=" . $pageSearchStart+1?>"> &raquo; </a></li>
    <?php
}


?>
    <li class='page-item'><a class='page-link' href="?page=<?= $pageAtual. "&pagina=". $totalPage?>">Última página</a></li>
</ul>