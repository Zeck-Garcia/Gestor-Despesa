<?php
    // include_once "form-despesa.php";
    // include_once "app/models/searching.php";
    // searching();

    include_once "app/models/manipulacaoDeDados.php";
    $operation = new manipulacaoDeDados();

    include_once "app/models/function-despesa.php";

    $pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
    $id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");
    
    // $txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
    $tabela = "tbsituacaodespesa"; //nome da tabela a ser pesquisado
    $camposSelect = "*"; //campo principal a ser pesquisado 
    $camposWherePesquisaPrincipal = "idSituacaoDespesa"; //filtro para exibir um campo da busca
    $camposPesquisaAdd = "OR nomeSituacaoDespesa LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa

    $orderBy = "idSituacaoDespesa"; //campo que será feita a ordem
    $orderByType = "ASC"; //ASC DESC
    $quantidade = "5"; //qtd de registro a ser exibido por busca
    
    searching();

    if($pageative == "a-cadastro-situacao-receita"){
       $dados['nomeSituacaoDespesa'] = "";

    } else if($pageative == "editar-situacao-receita"){
        $camposWherePesquisaPrincipal = "idSituacaoDespesa";
        $txtPesquisa = $id;
        // searchBDdespesa();

        echo $dados["nomeSituacaoDespesa"];

    } else if($pageative == "a-excluir-cadastro-despesa"){


    }

?>

<div class="container">
    <div class="row bg-secondary text-light text-center mb-3">
        <h2>Não sei o que colocar no titulo do cabeçalho</h2>
    </div>
    

<div class="row">
        <div class="col">
            <table class="table table-striped table-hover mt-5">
                <thead class="thead-dark text-center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </thead>

                <tbody class="text-center">
                    <?php
                        while($dados = mysqli_fetch_assoc($qry)){
                    
                    ?>
                    <tr>
                        <td><?= $dados["idSituacaoDespesa"]?></td>
                        <td><?= $dados["nomeSituacaoDespesa"]?></td>
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
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <?php include_once "app/models/paginador.php";?>
        </div>
</div>
</div>



<button id="btnShowModal" class="btnShowModal btn btn-primary" onclick="updateUrl('<?php $statusAgora = 'novo'; echo 'index.php?'.$_SERVER['QUERY_STRING'].'&action='.$statusAgora?>')">Cadastrar nova posição</button>

<div class="modal" tabindex="-1" role="dialog" >
<?= include_once "app/views/pages/modal/modal-cadastro-situacao-despesa.php"?>
</div>

<!-- updateUrl(newUrl) -->
