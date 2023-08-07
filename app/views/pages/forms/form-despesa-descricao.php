<?php
    // include_once "form-despesa.php";

    $pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
    
?>


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
        <div class="form-group col">
            <label class="" for="valorDespesa">Valor</label>
            <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="" placeholder="R$ 10,00" required>

            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        
        <div class="form-group col">
            <label class="" for="dataDespesa">Data de PGTO</label>
            <input type="date" class="form-control" id="dataPagamentoDespesaDescricao" name="dataPagamentoDespesaDescricao" value="" placeholder="" required>
        </div>
    </div>


        <div class="form-group">
            <label class="" for="valorDespesa">Nome</label>
            <input type="double" class="form-control" id="nomeDespesaDescricao" name="nomeDespesaDescricao" value="" placeholder="nome" required>

            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>

        <div class="form-group">
            <label class="" for="valorDespesa">Metodo de Pagamento</label>
            <input type="double" class="form-control" id="metodoPagamentoDescricaoDescricao" name="metodoPagamentoDescricaoDescricao" value="" placeholder="nome" required>

            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>

        <div class="form-group">
            <label class="" for="">Titular</label>
            <select class="" id="titularDespesaDescricao" name="titularDespesaDescricao" required>
                <option class="form-control" id="" name="" value="jose" selected>Jose</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="" for="">Tipo</label>
            <select class="" id="tipoDespesaDescricao" name="tipoDespesaDescricao" required>
                <option class="" value="2" selected>2</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="" for="">Situação</label>
            <select class="" id="situacaoDespesaDescricao" name="situacaoDespesaDescricao" required>
                <option class="" value="1">1</option>
            </select>
        </div>
        
        <!-- <div class="form-group">
            <label class="" for="DescricaoDespesa">Descrição</label>
            <textarea  class="form-control" id="" name="" value="" ></textarea>
        </div> -->
    
        <div class="row">
            <div class="col">
                <input type="text" class="btn btn-danger" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Cancelar">
                <input type="submit" class="btn btn-danger" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Cancelar">
            </div>

            <div class="col">
                <input type="text" class="btn btn-primary" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Adicionar">
                <input type="submit" class="btn btn-primary" id="btnAcaoFormDespesa" name="btnAcaoFormDespesa" value="Adicionar">
            </div>
        </div>
    </div>

</form>
