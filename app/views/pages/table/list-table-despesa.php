<?php
//TITLE PAGE
$titleCabecalhoHeaderPage = "Lista de despesa";

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

//PEGA A URL ATUAL
if(empty($_SESSION["urlEdit"])){
    echo $_SESSION["urlEdit"] = $_SERVER["REQUEST_URI"];
}


include_once "app/models/searching.php";
// include_once "app/models/filter.php";
include_once "app/models/function-despesa.php";

//SEARCH TABLE
$txtPlaceholderPesquisar = "Inicie sua busca!";
// echo $txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
$camposSelect = "tbtipodespesa.idTipoDespesa, tbtipodespesa.nomeCategoriaDespesa, tbdespesadescricao.idDespesaDescricao, tbdespesadescricao.nomeDespesaDescricao,  tbdespesadescricao.valorDespesaDescricao, tbdespesadescricao.dataPagamentoDespesaDescricao, tbdespesadescricao.tipoDespesaDescricao, tbdespesadescricao.titularDespesaDescricao, tbdespesadescricao.situacaoDespesaDescricao"; //campo principal a ser pesquisado 
$tabela = "tbtipodespesa JOIN tbdespesadescricao"; //nome da tabela a ser pesquisado
$camposWherePesquisaPrincipal = "tbtipodespesa.idTipoDespesa=tbdespesadescricao.tipoDespesaDescricao"; //filtro para exibir um campo da busca
$campoWhereAndPesquisa =  "nomeDespesaDescricao"; //tbtipodespesa.idTipoDespesa=tbdespesadescricao.tipoDespesaDescricao
// $camposPesquisaAdd = "OR tipoDespesaDescricao LIKE '%$txtPesquisa%'"; //"OR tipoDespesaDescricao LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa

$orderBy = "idDespesaDescricao"; //campo que será feita a ordem
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
        include_once "app/views/pages/header/header.php";
        include_once "app/views/pages/search/search.php";
    ?>

<div class="row">
    <div class="col">


        <!-- <div class="row">
            <form action="#" class="form row  d-flex justify-content-around align-items-center align-self-center">
                <div class="form-group col">
                    <label for="">Titular</label>
                    <select class="custom-select" name="">
                        <option value="" selected>Selecione</option>

                    <?php
                        $sqlFitterTitular = "SELECT * FROM tbtitular ORDER BY nomeTitular ASC";
                        $qryFitterTitular = $operation->executarSQL($sqlFitterTitular);

                        while($titular = $operation->listar($qryFitterTitular)){
                            
                         ?>

                        <option value="<?= $titular["nomeTitular"]?>"><?= $titular["nomeTitular"]?></option>

                        <?php

                    } ?>

                    </select>
                </div>

                <div class="form-group col">
                    <label for="">Modulo</label>
                    <select class="custom-select" name="">
                        <option value="">Selecione</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="">Categoria</label>
                    <select class="custom-select" name="comboxCategoria">
                        <option value="" selected>Selecione</option>
                        <?php
                            $sqlFilterCategoria = "SELECT * FROM tbtipodespesa ORDER BY nomeCategoriaDespesa ASC";
                            $qryFilterCategoria = $operation->executarSQL($sqlFilterCategoria);

                            while($categoria = $operation->listar($qryFilterCategoria)){
                                ?>
                                <option value="<?= $categoria["nomeCategoriaDespesa"]?>"><?= $categoria["nomeCategoriaDespesa"]?></option>

                            <?php
                            }

                        ?>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="">Mês</label>
                    <select class="custom-select" name="monthCampoFilter">
                        <option value="">Selecione</option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="">Ano</label>
                    <select class="custom-select" name="">
                        <option value="" selected>Selecione</option>
                        <?php
                            $sqlFilterAllYear = "SELECT DISTINCT anoDespesa FROM tbdespesa GROUP BY anoDespesa ORDER BY anoDespesa ASC";
            
                            $qryFilterAllYear = $operation->executarSQL($sqlFilterAllYear); //1
                            
                            while($year = $operation->listar($qryFilterAllYear)){
                                // $yeara = $year["anoDespesa"];
                                echo "<option value='" . $year['anoDespesa'] . "'>". $year['anoDespesa'] . "</option>";
                            }; 
                        ?>
                    </select>
                </div>

                <div class="col"">
                    <button class="btn btn-success" type="submit" value="Filtar">Filtar <i class="bi bi-funnel"></i></button>
                </div>
                <div class="col"">
                    <button class="btn btn-danger" type="submit" value="limparFiltar">Limpar <i class="bi bi-trash"></i></button>
                </div>
            </form>
        </div> -->

        <table class="table table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr class="">
                    <th>ID</th>
                    <th>Despesa</th>
                    <th>Valor</th>
                    <th>Data de PGTO</th>
                    <th>Categoria</th>
                    <th>Titular</th>
                    <th>Situação</th>
                    <th>Excluir</th>
                </tr>
            </thead>
                    
            <tbody class="text-center">
                <?php
                while($dados = $operation->listar($qry))
                {
                    $date = new DateTime($dados["dataPagamentoDespesaDescricao"]); 
                    $date->format("d/m/Y");
                    ?>
                    
                    <tr>
                        <td><?=$dados['idDespesaDescricao']?></td>
                        <td><?=$dados['nomeDespesaDescricao']?></td>
                        <td><?=$moeda . number_format($dados['valorDespesaDescricao'], 2, ',', '.')?></td>

                        <td><?=$date->format("d/m/Y")?></td> 

                        <td><?=$dados['nomeCategoriaDespesa']?></td>
                        <td><?=$dados['titularDespesaDescricao']?></td>
                        <td><?=$dados['situacaoDespesaDescricao']?></td>
                        <td>
                            <a class="text-danger" href="">
                <form class="teste" action="" method="post" >
                <!-- "?{$_SERVER['QUERY_STRING']}&action=delete";  -->
                

                <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $dados['idDespesaDescricao']?>">
                    <?php
                        $tabela = "tbdespesadescricao";
                        $valorNaTabela = "idDespesaDescricao";
                        $valorPesquisa = isset($_POST["id"]) == "" ? "" : $_POST["id"];
                        ?>
                
                    <button class="btn btn-outline-danger btnAcao" onsubmit="limparForm()"><i class="bi bi-trash3"></i></button>
                </form>
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
            <?= include_once "app/views/pages/modal/modal-cadastro-despesa.php"?>
        </div>
    </div>

<input type="submit" value="aqui" class="casa">

    <?php


            ?>


