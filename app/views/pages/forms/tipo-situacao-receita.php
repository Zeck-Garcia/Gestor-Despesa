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
        // searchBDdespesa();

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

<button id="btnShowModal" class="btnShowModal btn btn-primary">Cadastrar nova posição</button>

<div class="modal" tabindex="-1" role="dialog">
    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-fluid">

      <div class="modal-header">
        <h5 class="modal-title">Cadastro de situacao de receita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <div class="container-fluid">

                <div class="row">
                    <form class="needs-validation" action="index.php?page=<?php
                                                if($page == "a-cadastro-situacao-receita"){
                                                    echo "a-inserir-cadastro-situacao-receita";
                                                } else if($page == "editar-cadastro-situacao-receita"){
                                                    echo "atualizar-cadastro-situacao-receita";
                                                } else if($page == "a-excluir-cadastro-situacao-receita"){
                                                    echo "excluir-cadastro-situacao-receita";
                                                }
                                                    ?>
                                                    " method="post" >
                        <label>Nome</label>
                        <input type="text" class="form-control" class="" id="" name="nomeSituacaoReceita" placeholder="Digite um novo titulo">
                        <button type="sumit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>

    <div class="modal-footer">
        <button type="reset" class="btnCloseModal btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="sumit" class="btn btn-primary">Salvar</button>
    </div>
</div>
</div>
</div>



