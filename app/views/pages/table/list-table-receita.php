<?php
    $urlPageAtual = "index.php?page=list-receita" . (isset($_GET['pagina']) == '' ? '' : '&pagina='.$_GET['pagina']);
    $nomePage = "Receita";
    $titleCabecalhoHeaderPage = "Lista de receita";
    $modalCadastro = $urlPageAtual."&action=cadreceita";

include_once "app/views/pages/header/header.php";

include_once "app/models/searching.php";
include_once "app/models/function-despesa.php";

//SEARCH TABLE
$txtPlaceholderPesquisar = "Inicie sua busca!";
echo $txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel

$sqlSelect = "SELECT * FROM  tbreceita WHERE titularReceita='{$_SESSION['txtPesquisaValue']}' OR categoriaReceita LIKE '%{$_SESSION['txtPesquisaValue']}%'";

$orderBy = "dataReceita"; //campo que será feita a ordem
$orderByType = "ASC"; //ASC DESC
$quantidade = "7"; //qtd de registro a ser exibido por busca

searching();

        include_once "app/views/pages/search/search.php";
    ?>

<div class="row">
    <div class="col">

        <table class="table table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr class="">
                    <th>Titular</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Data</th>
                    <th>Situação</th>
                    <th>Excluir</th>
                </tr>
            </thead>
                    
            <tbody class="text-center">
                <?php
                while($dados = $operation->listar($qry))
                {
                    $date = new DateTime($dados["dataReceita"]); 
                    $date->format("d/m/Y");
                    ?>
                    
                    <tr>
                        <td><?=$dados['titularReceita']?></td>
                        <td><?=$moeda . number_format($dados['valorReceita'], 2, ',', '.')?></td>
                        <td><?=$dados['descricaoReceita']?></td>
                        <td><?=$dados['categoriaReceita']?></td>
                        <td><?=$date->format("d/m/Y")?></td> 

                        
                        <td><?=$dados['situacaoReceita']?></td>
                        <td>

                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ação</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$urlPageAtual . "&action=editreceita&id=" . $dados["idReceita"];?>" class="btn btn-outline-danger btnAcao btnModalMsgInBox">Alterar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=$urlPageAtual . "&action=delete&id=" . $dados["idReceita"];?>" class="btn btn-outline-danger btnAcao btnModalMsgInBox">Excluir</a>
                            </div>
                            </div>
                
                        <?php
                            $tabela = "tbreceita";
                            $valorNaTabela = "idReceita";
                        ?>
                
                        </td>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>

        <?php verRegistro(); ?>

    </div>

<?php
    include_once "app/models/paginador.php";
?>


<div class="row">
        <div class="col">
            <a href="<?= $urlPageAtual."&action=salvereceita"; ?>" id="btnShowModal" class="btnShowModal btn btn-primary">Cadastrar nova posição <i class="bi bi-plus-circle"></i></a>
        </div>
    </div>



