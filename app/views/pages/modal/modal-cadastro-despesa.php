<?php

$pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
$id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");
$action = (isset($_GET["action"]) == "" ? "" : $_GET["action"]);

if($action == "editdespesa"){

    $sqlEditDespesa = "SELECT * FROM tbdespesadescricao WHERE idDespesaDescricao='$id'";
    $qryEditDespesa = $operation->executarSQL($sqlEditDespesa);

    while($ver = $operation->listar($qryEditDespesa)){
        $ver["nomeDespesaDescricao"];
        $nomeDespesaDescricao = $ver["nomeDespesaDescricao"];
        $valorDespesaDescricao = str_replace(".", ",", $ver["valorDespesaDescricao"]);
        $dataPagamentoDespesaDescricao = $ver["dataPagamentoDespesaDescricao"];
        $tipoDespesaDescricao = $ver["tipoDespesaDescricao"];
        $titularDespesaDescricao = $ver["titularDespesaDescricao"];
        $situacaoDespesaDescricao = $ver["situacaoDespesaDescricao"];
    }

} else {
    $nomeDespesaDescricao = "";
    $valorDespesaDescricao = "";
    $dataPagamentoDespesaDescricao = "";
    $tipoDespesaDescricao = "";
    $titularDespesaDescricao = "";
    $situacaoDespesaDescricao = "";
}

?>

<div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'>        
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>

            <div class="modal-fluid"> 
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro nova despesa</h5>
                                <button type="button" class="close btnShowModalDespesa btnAcao" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                        <form class="needs-validation" class="form-cadastro-despesa" action="<?= "$urlPageAtual&action=caddespesasalve"?>" method="post" >
                                                    <!-- CORPO DO FORM -->
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="" for="">Categoria</label>
                                                                <?php
                                                                    if(!mysqli_num_rows($operation->executarSQL($sqlCategoria))){
                                                                        echo "<a href='$urlPageAtual&action=cadcategoriadespesa' class='custom-select btn btn-secondary'><option value=''>Sem categoria cadastrata. Cadastre nova posição</option></a>";

                                                                    } else {
                                                                ?>
                                                                <select class="custom-select" id="tipoDespesaDescricao" name="tipoDespesaDescricao" required>
                                                                    <option class="" value="" selected>Selecione</option>
                                                                    <?php
                                                                        $sqlCategoria = "SELECT * FROM tbtipodespesa";
                                                                        $qryCategoria = $operation->executarSQL($sqlCategoria);

                                                                        while($categoria = $operation->listar($qryCategoria)){
                                                                            ?>
                                                                            <option value="<?= $categoria['nomeCategoriaDespesa'] ;?>" ><?= $categoria["nomeCategoriaDespesa"];?></option>


                                                                        <?php }}?>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                            
                                                                <div class="form-group">
                                                                    <label class="" for="valorDespesa">Despesa</label>
                                                                    <input class="form-control" name="nomeDespesaDescricao" type="text" value="<?= $nomeDespesaDescricao;?>" placeholder="Digite uma descrição para a sua despesa">
                                                                    
                                                                    <div class="valid-feedback">
                                                                        Tudo certo!
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="" for="dataDespesa">Data de PGTO</label>
                                                                    <input type="date" class="form-control" id="dataPagamentoDespesaDescricao" name="dataPagamentoDespesaDescricao" value="<?= $dataPagamentoDespesaDescricao; ?>" placeholder="" required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="" for="valorDespesa">Valor</label>
                                                                    <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="<?= $valorDespesaDescricao; ?>" placeholder="<?= $moeda?> 135,00" required>

                                                                    <div class="valid-feedback">
                                                                        Tudo certo!
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="" for="">Titular</label>
                                                                    <?php
                                                                        $sqlTitular = "SELECT * FROM tbtitular";
                                                                        $qryTitular = $operation->executarSQL($sqlTitular);
                                                                        if(!mysqli_num_rows($operation->executarSQL($sqlTitular))){
                                                                            echo "<a href='$urlPageAtual&action=cadtitular' class='custom-select btn btn-secondary'><option value=''>Sem titular cadastrato. Cadastre nova posição</option></a>";

                                                                        } else {
                                                                ?>
                                                                    <select class="custom-select" id="titularDespesaDescricao" name="titularDespesaDescricao" required>
                                                                        <option class="" value="<?= $titularDespesaDescricao; ?>" selected>Selecione</option>
                                                                            <?php

                                                                                while($titular = $operation->listar($qryTitular)){
                                                                                    ?>
                                                                                    <option value="<?= $titular["nomeTitular"] ;?>" ><?= $titular["nomeTitular"] ;?></option>
                                                                                <?php }}?>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="" for="">Situação</label>
                                                                    <?php
                                                                        $sqlSituacaoDespesa = "SELECT * FROM  tbsituacaodespesa";
                                                                        $qrySituacaoDespesa = $operation->executarSQL($sqlSituacaoDespesa);

                                                                        if(!mysqli_num_rows($operation->executarSQL($sqlSituacaoDespesa))){
                                                                            echo "<a href='$urlPageAtual&action=salvesituacaodespesa' class='custom-select btn btn-secondary'><option value=''>Sem situação cadastrata. Cadastre nova posição</option></a>";

                                                                        } else {
                                                                ?>
                                                                    <select class="custom-select" id="situacaoDespesaDescricao" name="situacaoDespesaDescricao" required>
                                                                    <option class="" value="<?= $situacaoDespesaDescricao; ?>" selected>Selecione</option>
                                                                            <?php
                                                                                while($situacaoDespesa = $operation->listar($qrySituacaoDespesa)){
                                                                                    ?>
                                                                                    <option value="<?= $situacaoDespesa["nomeSituacaoDespesa"] ;?>" ><?=$situacaoDespesa["nomeSituacaoDespesa"] ;?></option>
                                                                                <?php }}?>
                                                                    </select>
                                                                </div>

                                                        </div>

                                                    <!-- FIM DO CORPO DO FORM -->
                                                <div class="modal-footer mt-3">
                                                    <a href="<?= $urlPageAtual;?>" class="btnShowModalDespesa btn btn-secondary btnAcao" id="btnCloseModal" data-dismiss="modal">Cancelar</a>
                                                    <button type="submit" href="" class="btn btnAcao btnSalve <?= $_GET["action"] == "editdespesa" ? "btn-warning" : "btn-primary" ?>"><?= $_GET["action"] == "editdespesa" ? "Alterar" : "Salvar" ?></button>
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