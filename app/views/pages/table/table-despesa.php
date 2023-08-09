<?php

// include_once "app/models/manipulacaoDeDados.php";
// $operation = new manipulacaoDeDados();


include_once "app/models/searching.php";
// include_once "app/models/filter.php";

$tabela = "tbdespesadescricao";
$camposPesquisaPrincipal = "idDespesaDescricao";
$camposPesquisaAdd = "nomeDespesaDescricao";
$orderBy = "idDespesaDescricao";
$orderBuType = "ASC"; //ASC DESC

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
                            <td><?= $dados["nomeDespesaDescricao"]?></td>
                            <td><?= $moeda. " ". number_format($dados["valorDespesaDescricao"], 2, ',', '.') ?></td>
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
    <!-- <div class="col-3 bg-dark position-relative">
        <div class="dropdown"> 
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 

                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> John W </strong> </a> 

                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                        <li><a class="dropdown-item" href="#">Cadastrar</a></li> 
                        <li><a class="dropdown-item" href="#">xxxxx</a></li> 
                        <li><a class="dropdown-item" href="#">xxxx</a></li> 
                        <li> <hr class="dropdown-divider"> </li> 
                        <li><a class="dropdown-item" href="#">Sign out</a></li> 
                    </ul> 
        </div>      
    </div> -->
</div>


<?php
    include_once "app/models/paginador.php";
?>




