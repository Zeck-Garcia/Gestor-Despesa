<?php
    // include_once "form-despesa.php";
    include_once "app/models/searching.php";

    include_once "app/models/manipulacaoDeDados.php";
    $operation = new manipulacaoDeDados();

    include_once "app/models/function-despesa.php";

    $pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
    $id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");

    // $txtPesquisa = ""; // é necessario passar ao menos o valor vazio para essa variavel
    // $tabela = "tbsituacaodespesa"; //nome da tabela a ser pesquisado
    // $camposSelect = "*"; //campo principal a ser pesquisado 
    // $camposWherePesquisaPrincipal = "idSituacaoDespesa"; //filtro para exibir um campo da busca
    // $camposPesquisaAdd = "OR nomeSituacaoDespesa LIKE '%$txtPesquisa%'"; //segundo campo para pesquisa
    $sqlSelect = "SELECT * FROM tbsituacaodespesa";

    $orderBy = "idSituacaoDespesa"; //campo que será feita a ordem
    $orderByType = "ASC"; //ASC DESC
    $quantidade = "3"; //qtd de registro a ser exibido por busca
    

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
    
    <div class="row bg-secondary text-light mb-3">
        <?php
            $titleCabecalhoHeaderPage = "Lista de situacao da despesa";
            include_once "app/views/pages/header/header.php";
        ?>
    </div>
    

<div class="row">
        <div class="col">
            <table class="table table-striped table-hover mt-5">
                <thead class="thead-dark text-center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Excluir</th>
                </thead>

                <tbody class="text-center">
                    <?php
                        while($dados = mysqli_fetch_assoc($qry)){
                    
                    ?>
                    <tr>
                        <td><?= $dados["idSituacaoDespesa"]?></td>
                        <td><?= $dados["nomeSituacaoDespesa"]?></td>
                        <td>
                            <a class="text-danger" href="">
                            <form class="" action="" method="post" >
                            <!-- "?{$_SERVER['QUERY_STRING']}&action=delete";  -->
                            

                            <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $dados['idSituacaoDespesa']?>">
                                <?php
                                    $tabela = "tbsituacaodespesa";
                                    $valorNaTabela = "idSituacaoDespesa";
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
        <div class="row">
            <?php include_once "app/models/paginador.php";?>
        </div>
</div>
</div>



<button id="btnShowModal" class="btnShowModal btn btn-primary" onclick="updateUrl('<?php $statusAgora = 'novo'; echo 'index.php?'.$_SERVER['QUERY_STRING'].'&action='.$statusAgora?>')">Cadastrar nova posição</button>

<div class="modal" tabindex="-1" role="dialog" >
<?php include_once "app/views/pages/modal/modal-cadastro-situacao-despesa.php"; ?>
</div>

<!-- updateUrl(newUrl) -->
