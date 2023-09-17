<?php
    $urlPageAtual = "index.php?page=list-categoria-receita" . (isset($_GET['pagina']) == '' ? '' : '&pagina='.$_GET['pagina']);
    $modalCadastro = $urlPageAtual."&action=cadcategoriareceita";

    isset($_GET["pagina"]) == "" ? "" : "&pagina=".$_GET["pagina"];
    
    //CONEXAO COM O FILE SEARCHIG PARA REALIZAÇÃO DE CONSULTA, 
    include_once "app/models/searching.php";

    include_once "app/models/manipulacaoDeDados.php";
    $operation = new manipulacaoDeDados();

    $pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
    $id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");
    
    $txtPesquisa = "";

    $sqlSelect = "SELECT * FROM  tbtiporeceita";

    $orderBy = "categoriaTipoReceita"; //campo que será feita a ordem
    $orderByType = "ASC"; //ASC DESC
    $quantidade = "2"; //qtd de registro a ser exibido por busca
    
    searching();

    // if($pageative == "a-cadastro-situacao-receita"){
    //    $dados['categoriaTipoReceita'] = "";

    // } else if($pageative == "editar-situacao-receita"){
    //     $camposWherePesquisaPrincipal = "idSituacaoReceita";
    //     $txtPesquisa = $id;
    //     // searchBDdespesa();

    //     echo $dados["categoriaTipoReceita"];

    // } else if($pageative == "a-excluir-cadastro-despesa"){

    // }
    ?>

<div class="container">

    <div class="row bg-secondary text-light mb-3">
        <?php
            $titleCabecalhoHeaderPage = "Lista de categoria de receita";
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
                        <td><?= $dados["idTipoReceita"]?></td>
                        <td><?= $dados["categoriaTipoReceita"]?></td>
                        <td>
                            <?php
                                $tabela = "tbtiporeceita";
                                $valorNaTabela = "idTipoReceita";
                            ?>
                            <a href="<?=$urlPageAtual . "&action=delete&id=" . $dados["idTipoReceita"];?>" class="btn btn-outline-danger btnAcao btnModalMsgInBox"><i class="bi bi-trash3"></i></a>

                        </td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>

            <?php verRegistro(); ?>
            
        </div>
        <div class="row">
            <?php include_once "app/models/paginador.php";?>
        </div>
    </div>
</div>

        <div class="col">
            <a href="<?= $urlPageAtual."&action=cadcategoriareceita"; ?>" id="btnShowModal" class="btnShowModal btn btn-primary">Cadastrar nova posição <i class="bi bi-plus-circle"></i></a>
        </div>


