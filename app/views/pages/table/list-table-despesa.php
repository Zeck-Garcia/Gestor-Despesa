<?php
//TITLE PAGE
$urlPageAtual = "index.php?page=list-despesa" . (isset($_GET['pagina']) == '' ? '' : '&pagina='.$_GET['pagina']);

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
echo $txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
// $camposSelect = "tbtipodespesa.idTipoDespesa, tbtipodespesa.nomeCategoriaDespesa, tbdespesadescricao.idDespesaDescricao, tbdespesadescricao.nomeDespesaDescricao,  tbdespesadescricao.valorDespesaDescricao, tbdespesadescricao.dataPagamentoDespesaDescricao, tbdespesadescricao.tipoDespesaDescricao, tbdespesadescricao.titularDespesaDescricao, tbdespesadescricao.situacaoDespesaDescricao"; //campo principal a ser pesquisado 
// $tabela = "tbtipodespesa JOIN tbdespesadescricao"; //nome da tabela a ser pesquisado
// $camposWherePesquisaPrincipal = "tbtipodespesa.idTipoDespesa=tbdespesadescricao.tipoDespesaDescricao"; //filtro para exibir um campo da busca
// $campoWhereAndPesquisa =  "nomeDespesaDescricao"; //tbtipodespesa.idTipoDespesa=tbdespesadescricao.tipoDespesaDescricao
// $camposPesquisaAdd = "OR tipoDespesaDescricao LIKE '%$txtPesquisa%'"; //"OR tipoDespesaDescricao LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa

$sqlSelect = "SELECT* FROM tbdespesadescricao WHERE nomeDespesaDescricao='{$_SESSION['txtPesquisaValue']}' OR tipoDespesaDescricao LIKE '%{$_SESSION['txtPesquisaValue']}%'";

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


        $titleCabecalhoHeaderPage = "Lista de despesa";
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
                    ?>
                    
                    <tr>
                        <td><?=$dados['nomeDespesaDescricao']?></td>
                        <td><?=$moeda . number_format($dados['valorDespesaDescricao'], 2, ',', '.')?></td>

                        <td><?=$date->format("d/m/Y")?></td> 

                        <td><?=$dados['tipoDespesaDescricao']?></td>
                        <td><?=$dados['titularDespesaDescricao']?></td>
                        <td><?=$dados['situacaoDespesaDescricao']?></td>
                        <td>

                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ação</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$urlPageAtual . "&action=editdespesa&id=" . $dados["idDespesaDescricao"];?>" class="btn btn-outline-danger btnAcao btnModalMsgInBox">Alterar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=$urlPageAtual . "&action=delete&id=" . $dados["idDespesaDescricao"];?>" class="btn btn-outline-danger btnAcao btnModalMsgInBox">Excluir</a>
                            </div>
                            </div>
                
                        <?php
                            $tabela = "tbdespesadescricao";
                            $valorNaTabela = "idDespesaDescricao";
                        ?>
                
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
            <a href="<?= $urlPageAtual."&action=caddespesa"; ?>" id="btnShowModal" class="btnShowModal btn btn-primary">Cadastrar nova posição <i class="bi bi-plus-circle"></i></a>
        </div>
        
        <!-- <div class="modal ModalCadastroDespesa" tabindex="-1" role="dialog">        
            <?php //include_once "app/views/pages/modal/modal-cadastro-despesa.php"; ?>
        </div> -->
    </div>


