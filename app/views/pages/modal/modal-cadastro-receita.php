<?php

$pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
$id = (isset($_GET["id"]) != "" ? $_GET["id"] : "")."<br>";

?>

<div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'> 
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-fluid">
            
            <div class="modal-header">
                <h5 class="modal-title">Cadastro nova receita</h5>
                            <button type="button" class="close btnShowModalReceita btnAcao" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <form class="needs-validation" class="form-cadastro-receita" action="<?= "$urlPageAtual&action=salvedreceita"?>" method="post" >
                                                <!-- CORPO DO FORM -->
                                                    <div class="row">

                                                            <div class="form-group">
                                                                <label class="" for="">Titular</label>
                                                                <select class="custom-select" id="titularReceita" name="titularReceita" required>
                                                                    <option class="" value="" selected>Selecione</option>
                                                                        <?php
                                                                            $sqlTitular = "SELECT * FROM tbtitular";
                                                                            $qryTitular = $operation->executarSQL($sqlTitular);

                                                                            while($titular = $operation->listar($qryTitular)){
                                                                                ?>
                                                                                <option value="<?= $titular["nomeTitular"]?>"><?=$titular["nomeTitular"];?></option>
                                                                            <?php }?>
                                                                </select>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="valorReceita">Valor</label>
                                                                <input type="double" class="form-control" id="valorReceita" name="valorReceita" value="" placeholder="<?= $moeda?> 135,00" required>
                                                                
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="descricaoReceita">Descrição</label>
                                                                <input class="form-control" name="descricaoReceita" type="text" value="" placeholder="Digite uma descrição para a sua Receita">
                                                                
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                            
    
                                                            <div class="form-group">
                                                                <label class="" for="categoriaReceita">Categoria</label>
                                                                <select class="custom-select" id="tipoReceita" name="categoriaReceita" required>
                                                                    <option class="" value="" selected>Selecione</option>
                                                                    <?php
                                                                        $sqlCategoriaReceita = "SELECT * FROM tbtiporeceita";
                                                                        $qryCategoriaReceita = $operation->executarSQL($sqlCategoriaReceita);
    
                                                                        while($categoriaReceita = $operation->listar($qryCategoriaReceita)){
                                                                            ?>
                                                                            <option value="<?= $categoriaReceita["categoriaTipoReceita"]?>"><?=$categoriaReceita["categoriaTipoReceita"];?></option>
                                                                        <?php }?>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="dataReceita">Data de PGTO</label>
                                                                <input type="date" class="form-control" id="dataPagamentoReceita" name="dataPagamentoReceita" value="" placeholder="" required>
                                                            </div>

                                                            
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="">Situação</label>
                                                                <select class="custom-select" id="situacaoReceita" name="situacaoReceita" required>
                                                                <option class="" value="" selected>Selecione</option>
                                                                        <?php
                                                                            $sqlSituacaoReceita = "SELECT * FROM  tbsituacaoreceita ORDER BY idSituacaoReceita";
                                                                            $qrySituacaoReceita = $operation->executarSQL($sqlSituacaoReceita);

                                                                            while($situacaoReceita = $operation->listar($qrySituacaoReceita)){
                                                                                ?>
                                                                                <option value="<?= $situacaoReceita["nomeSituacaoReceita"]?>"><?=$situacaoReceita["nomeSituacaoReceita"];?></option>
                                                                            <?php }?>
                                                                </select>
                                                            </div>

                                                    </div>


                                                <!-- FIM DO CORPO DO FORM -->
                                            <div class="modal-footer mt-3">
                                                <a href="<?= $urlPageAtual;?>" class="btnShowModalDespesa btn btn-secondary btnAcao" id="btnCloseModal" data-dismiss="modal">Cancelar</a>
                                                <button type="sumit" class="btn btn-primary btnAcao btnSalve">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<div class='modal-backdrop show'></div>