<?php

// include_once "app/models/manipulacaoDeDados.php";
// $operation = new manipulacaoDeDados();
$url = $_SERVER["HTTP_HOST"] . "<br>";
$url = $_SERVER["SCRIPT_NAME"] . "<br>";
$url = $_SERVER["QUERY_STRING"] . "<br>";
$url = $_SERVER["REQUEST_URI"] . "<br>";

include_once "app/models/searching.php";
// include_once "app/models/filter.php";
include_once "app/models/function-despesa.php";

//SEARCH TABLE
$txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
$tabela = "tbdespesadescricao"; //nome da tabela a ser pesquisado
$camposSelect = "*"; //campo principal a ser pesquisado 
$camposWherePesquisaPrincipal = "idDespesaDescricao"; //filtro para exibir um campo da busca
$camposPesquisaAdd = "OR nomeDespesaDescricao LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa

$orderBy = "idDespesaDescricao"; //campo que será feita a ordem
$orderByType = "ASC"; //ASC DESC
$quantidade = "7"; //qtd de registro a ser exibido por busca

searching();


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
                    while($dados = $operation->listar(($qry)))
                    {
                ?>
        
                        <tr>
                            <td><?= $dados["idDespesaDescricao"]?></td>
                            <td><?= $dados["nomeDespesaDescricao"]?></td>
                            <td><?= $moeda. number_format($dados["valorDespesaDescricao"], 2, ',', '.') ?></td>
                            <td><?php 
                                    $dados["dataPagamentoDespesaDescricao"];
                                    $date = new DateTime($dados["dataPagamentoDespesaDescricao"]);
                                    echo $date->format("d/m/Y");
                                ?></td>
                            <td><?= $dados["tipoDespesaDescricao"]?></td>
                            <td><?= $dados["titularDespesaDescricao"]?></td>
                            <td><?= $dados["situacaoDespesaDescricao"]?></td>
                            <td>
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ação</button>
                                    
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Excluir</a>
                                        <a class="dropdown-item" href="#">Alterar</a>
                                        <a class="dropdown-item" href="#"></a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Link isolado</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
        
                        <?php }?>
        
            </tbody>
        
        
        </table>
    </div>


<?php

//ACTION CAD
$pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
$id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");


// searchBDdespesa();

if($pageative == "list-despesa"){
    // echo "novo contato";
    // $moeda = "";
   echo $dados['idDespesaDescricao'] = "";
   $dados['nomeDespesaDescricao'] = "";
   $dados['valorDespesaDescricao'] = "";
   $dados['dataPagamentoDespesaDescricao'] = "";
   $dados['tipoDespesaDescricao'] = "";
   $dados['titularDespesaDescricao'] = "";
   $dados['situacaoDespesaDescricao'] = "";
   $dados['idDespesaDescricaoIdDespesa'] = "";
   $dados['metodoPagamentoDescricaoDescricao'] = "";

} else if($pageative == "editar-cadastro-despesa"){
    $camposWherePesquisaPrincipal = "idDespesaDescricao";
    $txtPesquisa = $id;
    searchBDdespesa();

    echo $dados["nomeDespesaDescricao"];

} else if($pageative == "a-excluir-cadastro-despesa"){


}

?>


    <div class="row">
        <div class="col">
        <!-- <a href=""><button class="btn btn-success btnShowModal">Cadastrar nova despesa <i class="bi bi-plus-circle"></i></button></a>     -->
        <button class="btn btn-success btnShowModal">Cadastrar nova despesa <i class="bi bi-plus-circle"></i></button>
        </div>
        
        <div class="col">
            <div class="modal" tabindex="-1" role="dialog">
        <?php

        ?>
        
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-fluid">
                    
                            <div class="modal-header">
                            <h5 class="modal-title">Cadastro nova despesa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                    
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <input type="" class="" name="statusModal" value="Novo">
                                    <?php echo $statusModal = $_POST["statusModal"];?>
                                    <div class="row">
                                        <form class="needs-validation" action="index.php?page=<?php
                                            if($page == "a-cadastro-despesa"){
                                                echo "a-inserir-cadastro-despesa";
                                            } else if($page == "editar-cadastro-despesa"){
                                                echo "atualizar-cadastro-despesa";
                                            } else if($page == "a-excluir-cadastro-despesa"){
                                                echo "excluir-cadastro-despesa";
                                            }
                                                ?>
                                                " method="post" >
                                                <!-- CORPO DO FORM -->
                                                    <div class="row">
                                                        
                                                            <div class="form-group">
                                                                <label class="" for="valorDespesa">Valor</label>
                                                                <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="<?php $moeda . $dados['valorDespesaDescricao'];?>" placeholder="R$ 10,00" required>

                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                                
                                                            <div class="form-group">
                                                                <label class="" for="dataDespesa">Data de PGTO</label>
                                                                <input type="date" class="form-control" id="dataPagamentoDespesaDescricao" name="dataPagamentoDespesaDescricao" value="<?= $dados['dataPagamentoDespesaDescricao']?>" placeholder="" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="valorDespesa">Nome</label>
                                                                <input class="form-control" name="nomeDespesaDescricao" type="text" value="<?= $dados['nomeDespesaDescricao']?>">
                                                                
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="">Categoria</label>
                                                                <select class="custom-select" id="tipoDespesaDescricao" name="tipoDespesaDescricao" required>
                                                                    <option class="" value="2" selected><?= $dados["tipoDespesaDescricao"]?></option>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="">Titular</label>
                                                                <select class="custom-select" id="titularDespesaDescricao" name="titularDespesaDescricao" required>
                                                                    <option class="form-control" id="" name="" value="jose" selected><?= $dados["titularDespesaDescricao"]?></option>
                                                                </select>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="">Situação</label>
                                                                <select class="custom-select" id="situacaoDespesaDescricao" name="situacaoDespesaDescricao" required>
                                                                    <option class="" value="1"><?= $dados["situacaoDespesaDescricao"]?></option>
                                                                </select>
                                                            </div>

                                                    </div>


                                                <!-- FIM DO CORPO DO FORM -->
                                            <div class="modal-footer mt-3">
                                                <button type="reset" class="btnCloseModal btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="sumit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<?php
    include_once "app/models/paginador.php";
?>




