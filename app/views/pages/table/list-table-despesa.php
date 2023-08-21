<?php

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
$txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
$tabela = "tbdespesadescricao"; //nome da tabela a ser pesquisado
$camposSelect = "*"; //campo principal a ser pesquisado 
$camposWherePesquisaPrincipal = "idDespesaDescricao"; //filtro para exibir um campo da busca
$camposPesquisaAdd = "OR nomeDespesaDescricao LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa

$orderBy = "tbdespesadescricao.idDespesaDescricao"; //campo que será feita a ordem
$orderByType = "ASC"; //ASC DESC
$quantidade = "7"; //qtd de registro a ser exibido por busca

searching();

            $sqlCategoriaDespesa = "SELECT 
                            tbtipodespesa.idTipoDespesa, tbtipodespesa.nomeCategoriaDespesa, tbdespesadescricao.idDespesaDescricao, tbdespesadescricao.nomeDespesaDescricao,  tbdespesadescricao.valorDespesaDescricao, tbdespesadescricao.dataPagamentoDespesaDescricao, tbdespesadescricao.tipoDespesaDescricao, tbdespesadescricao.titularDespesaDescricao, tbdespesadescricao.situacaoDespesaDescricao
                            FROM 
                            tbtipodespesa JOIN tbdespesadescricao
                            WHERE 
                            tbtipodespesa.idTipoDespesa=tbdespesadescricao.tipoDespesaDescricao
                            ";

            $qryCategoriaDespesa = $operation->executarSQL($sqlCategoriaDespesa);



?>
    <?php 
        include_once "app/views/pages/search/search.php";
    ?>

<div class="row">
    <div class="col">


        <div class="row">
            <form action="#" class="form row  d-flex justify-content-around align-items-center align-self-center">
                <div class="form-group col">
                    <label for="">Titular</label>
                    <select class="custom-select" name="">
                        <option value="">Selecione</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
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
                    <label for="">Tipo</label>
                    <select class="custom-select" name="">
                        <option value="">Selecione</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
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
        </div>

        <table class="table table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr class="">
                    <th>ID</th>
                    <th>Despesa</th>
                    <th>Valor</th>
                    <th>Data de PGTO</th>
                    <th>Tipo</th>
                    <th>Titular</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
            </thead>
                    
            <tbody class="text-center">
                <?php
                while($categoriaDespesa = $operation->listar($qryCategoriaDespesa))
                {
                    $date = new DateTime($categoriaDespesa["dataPagamentoDespesaDescricao"]); 
                    $date->format("d/m/Y");
                    ?>
                    
                    <tr>
                        <td><?=$categoriaDespesa['idDespesaDescricao']?></td>
                        <td><?=$categoriaDespesa['nomeDespesaDescricao']?></td>
                        <td><?=$moeda . number_format($categoriaDespesa['valorDespesaDescricao'], 2, ',', '.')?></td>

                        <td><?=$date->format("d/m/Y")?></td> 

                        <td><?=$categoriaDespesa['nomeCategoriaDespesa']?></td>
                        <td><?=$categoriaDespesa['titularDespesaDescricao']?></td>
                        <td><?=$categoriaDespesa['situacaoDespesaDescricao']?></td>
                        <td>
                            <div class='input-group-prepend'>
                                <button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Ação</button>
                                
                                <div class='dropdown-menu'>
                                    <a class='dropdown-item' href='#'>Excluir</a>
                                    <div role='separator' class='dropdown-divider'></div>
                                    <a class='dropdown-item btnShowModal' href='#'>Ver descrição</a>
                                </div>
                            </div>
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
        
        <div class="modal" tabindex="-1" role="dialog">        
            <?= include_once "app/views/pages/modal/modal-cadastro-despesa.php"?>
        </div>
    </div>