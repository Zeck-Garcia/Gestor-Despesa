<?php
    // include_once "form-despesa.php";
    include_once "app/models/manipulacaoDeDados.php";
    $operation = new manipulacaoDeDados();

    include_once "app/models/function-despesa.php";

    $pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
    $id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");
    
    $tabela = "tbdespesadescricao";
    $camposSelect = "*";
    $camposWherePesquisaPrincipal = "idDespesaDescricao";
    $camposPesquisaAdd = "nomeDespesaDescricao";
    $orderBy = "idDespesaDescricao";
    $orderByType = "ASC"; //ASC DESC
    
    searchBDdespesa();
    
    if($pageative == "a-cadastro-despesa"){
        echo "novo contato";
        // $moeda = "";
       $dados['idDespesaDescricao'] = "";
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

<div class="container">
<div class="row bg-secondary text-light text-center mb-3">
    <h2>Não sei o que colocar no titulo do cabeçalho</h2>
</div>

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

    <div class="row">

    <div class="row">
        <div class="form-group col-auto">
            <label class="" for="valorDespesa">Valor</label>
            <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="<?php $moeda . ' ' . $dados['valorDespesaDescricao'];?>" placeholder="R$ 10,00" required>

            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        
        <div class="form-group col-auto">
            <label class="" for="dataDespesa">Data de PGTO</label>
            <input type="date" class="form-control" id="dataPagamentoDespesaDescricao" name="dataPagamentoDespesaDescricao" value="<?= $dados['dataPagamentoDespesaDescricao']?>" placeholder="" required>
        </div>

        <div class="form-group col-auto">

            <label class="" for="valorDespesa">Categoria</label>
        <select class="custom-select" id="nomeDespesaDescricao" name="nomeDespesaDescricao" >
            <option value="" selected><?= $dados["nomeDespesaDescricao"]?></option>
            <option value=""></option>
        </select>
            <!-- <input type="double" class="form-control" id="nomeDespesaDescricao" name="nomeDespesaDescricao" value="" placeholder="nome" required> -->
    
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
    </div>


    <div class="row">
        <div class="form-group col-auto">
            <label class="" for="">Titular</label>
            <select class="custom-select" id="titularDespesaDescricao" name="titularDespesaDescricao" required>
                <option class="form-control" id="" name="" value="jose" selected><?= $dados["titularDespesaDescricao"]?></option>
            </select>
        </div>
        
        <div class="form-group col-auto">
            <label class="" for="">Tipo</label>
            <select class="custom-select" id="tipoDespesaDescricao" name="tipoDespesaDescricao" required>
                <option class="" value="2" selected><?= $dados["tipoDespesaDescricao"]?></option>
            </select>
        </div>
        
        <div class="form-group col-auto">
            <label class="" for="">Situação</label>
            <select class="custom-select" id="situacaoDespesaDescricao" name="situacaoDespesaDescricao" required>
                <option class="" value="1"><?= $dados["situacaoDespesaDescricao"]?></option>
            </select>
        </div>
    </div>
        
        <!-- <div class="form-group">
            <label class="" for="DescricaoDespesa">Descrição</label>
            <textarea  class="form-control" id="" name="" value="" ></textarea>
        </div> -->
    
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
