<?php

// if(isset($_POST["txtPesquisa"]) == 1){
//     $_SESSION['txtPesquisaValue'] = $_POST["txtPesquisa"];
//         if(!empty($_SESSION["txtPesquisaValue"])){    
//             $txtPesquisa = $_SESSION['txtPesquisaValue'];
//         }
// }

// include_once "app/models/manipulacaoDeDados.php";
// $operation = new manipulacaoDeDados();
$url = $_SERVER["HTTP_HOST"] . "<br>"; //localhost
$url = $_SERVER["SCRIPT_NAME"] . "<br>"; ///www/agenda-02/index.php
$url = $_SERVER["QUERY_STRING"] . "<br>"; //page=list-despesa
$url = $_SERVER["REQUEST_URI"] . "<br>"; ///www/agenda-02/index.php?page=list-despesa

include_once "app/models/searching.php";
// include_once "app/models/filter.php";
include_once "app/models/function-despesa.php";

//SEARCH TABLE
$txtPlaceholderPesquisar = "Inicie sua busca!";
// echo $txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
$camposSelect = "*"; //campo principal a ser pesquisado 
$tabela = "tbreceita"; //nome da tabela a ser pesquisado
$camposWherePesquisaPrincipal = "idReceita"; //filtro para exibir um campo da busca
$campoWhereAndPesquisa =  "titularReceita"; //tbtipodespesa.idTipoDespesa=tbdespesadescricao.tipoDespesaDescricao
// $camposPesquisaAdd = "OR tipoDespesaDescricao LIKE '%$txtPesquisa%'"; //"OR tipoDespesaDescricao LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa

$orderBy = "dataReceita"; //campo que será feita a ordem
$orderByType = "ASC"; //ASC DESC
$quantidade = "5"; //qtd de registro a ser exibido por busca

searching();


    // $sql = "SELECT
    // $camposSelectA 
    //FROM 
    //$tabelaA 
    // WHERE 
    //     $camposWherePesquisaPrincipalA='$txtPesquisaA'
    //     $camposPesquisaAddA
    //     ORDER BY 
    //     $orderByA $orderByTypeA

    //     LIMIT $inicio, $quantidade
    // ";

    // $qry = $operation->executarSQL($sql);


?>
    <?php 
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
                        <a class="text-danger" href=""><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php
    include_once "app/models/paginador.php";
?>


    <div class="row">
        <div class="col">
            <button id="btnShowModal" class="btnShowModal btn btn-primary" onclick="updateUrl('<?php $statusActionModal = 'new'; echo 'index.php?'.$_SERVER['QUERY_STRING'].'&action='.$statusActionModal?>')">Cadastrar nova posição <i class="bi bi-plus-circle"></i></button>
        </div>
        
        <div class="modal ModalCadastroDespesa" tabindex="-1" role="dialog">        
            <?= include_once "app/views/pages/modal/modal-cadastro-receita.php"?>
        </div>
    </div>


    <?php


            ?>


