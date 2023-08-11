<?php
    // include_once "form-despesa.php";
    // include_once "app/models/searching.php";
    // searching();

    include_once "app/models/manipulacaoDeDados.php";
    $operation = new manipulacaoDeDados();

    include_once "app/models/function-despesa.php";

    $pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
    $id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");
    
    // $tabela = "tbsituacaoreceita";
    // $camposSelect = "*";
    // $camposWherePesquisaPrincipal = "idSituacaoReceita";
    // $camposPesquisaAdd = "nomeSituacaoReceita";
    // $orderBy = "idSituacaoReceita";
    // $orderByType = "ASC"; //ASC DESC

    $txtPesquisa = "";

    $sql = "SELECT * FROM tbsituacaoreceita";

    $qry = $operation->executarSQL($sql);

    // $dados = mysqli_fetch_assoc($qry);

      
    if($pageative == "a-cadastro-situacao-receita"){
        echo "novo contato";
        // $moeda = "";
       $dados['nomeSituacaoReceita'] = "";

    } else if($pageative == "editar-situacao-receita"){
        $camposWherePesquisaPrincipal = "idSituacaoReceita";
        $txtPesquisa = $id;
        searchBDdespesa();

        echo $dados["nomeSituacaoReceita"];

    } else if($pageative == "a-excluir-cadastro-despesa"){


    }

?>

<div class="container">
    <div class="row bg-secondary text-light text-center mb-3">
        <h2>Não sei o que colocar no titulo do cabeçalho</h2>
    </div>

<div class="row">
    <div class="col">
        <form class="needs-validation" action="index.php?page=<?php
                                                if($page == "a-cadastro-situacao-receita"){
                                                    echo "a-inserir-cadastrosituacao-receita";
                                                } else if($page == "editar-cadastro-situacao-receita"){
                                                    echo "atualizar-cadastro-situacao-receita";
                                                } else if($page == "a-excluir-cadastro-situacao-receita"){
                                                    echo "excluir-cadastro-situacao-receita";
                                                }
                                                    ?>
                                                    " method="post" >


            <div class="row">
                <div class="form-group col-auto">
                    <label class="" for="valorDespesa">Valor</label>
                    <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="<?= $dados['nomeSituacaoReceita']?>" placeholder="Digite um nome nome" required>

                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
            
                <div class="row">
                    <div class="col">
                        <input type="hidden" class="btn btn-danger" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Cancelar">
                        <input type="reset" class="btn btn-danger btn-block" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Cancelar">
                    </div>

                    <div class="col">
                        <input type="hidden" class="btn btn-primary" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Adicionar">
                        <input type="submit" class="btn btn-primary btn-block" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Adicionar">
                    </div>
                </div>
            </div>

        </form>
    </div>

        <div class="col">
            <table class="table table-striped table-hover mt-5">
                <thead class="thead-dark text-center">
                    <th>ID</th>
                    <th>Nome</th>
                </thead>

                <tbody class="text-center">
                    <?php
                        while($dados = mysqli_fetch_assoc($qry)){
                    
                    ?>
                    <tr>
                        <td><?= $dados["idSituacaoReceita"]?></td>
                        <td><?= $dados["nomeSituacaoReceita"]?></td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</div>