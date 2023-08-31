<?php

//ACTION CAD

$pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
$id = (isset($_GET["id"]) != "" ? $_GET["id"] : "")."<br>";

// $statusModal = (isset($_POST["statusModal"]) == "" ? "" : $_POST["statusModal"])."<br>";

// searchBDdespesa();

// if($pageative == "list-despesa"){
//     // echo "novo contato";
//     // $moeda = "";
//     echo $dados['idDespesaDescricao'] = "";
//     $dados['nomeDespesaDescricao'] = "";
//     $dados['valorDespesaDescricao'] = "";
//     $dados['dataPagamentoDespesaDescricao'] = "";
//     $dados['tipoDespesaDescricao'] = "";
//     $dados['titularDespesaDescricao'] = "";
//     $dados['situacaoDespesaDescricao'] = "";
//     $dados['idDespesaDescricaoIdDespesa'] = "";
//     $dados['metodoPagamentoDescricaoDescricao'] = "";
    
// } else if($pageative == "editar-cadastro-despesa"){
//     $camposWherePesquisaPrincipal = "idDespesaDescricao";
//     $txtPesquisa = $id;
//     searchBDdespesa();
    
//     echo $dados["nomeDespesaDescricao"];
    
// } else if($pageative == "a-excluir-cadastro-despesa"){
    
    
// }

?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
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
                                        <form class="needs-validation" class="form-cadastro-despesa" action="index.php?page=a-inserir-cadastro-despesa" method="post" >
                                                <!-- CORPO DO FORM -->
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="" for="">Categoria</label>
                                                            <select class="custom-select" id="tipoDespesaDescricao" name="tipoDespesaDescricao" required>
                                                                <option class="" value="" selected>Selecione</option>
                                                                <?php
                                                                    $sqlCategoria = "SELECT * FROM tbtipodespesa";
                                                                    $qryCategoria = $operation->executarSQL($sqlCategoria);

                                                                    while($categoria = $operation->listar($qryCategoria)){
                                                                        ?>
                                                                        <option value="<?= $categoria["nomeCategoriaDespesa"]?>"><?=$categoria["nomeCategoriaDespesa"];?></option>
                                                                    <?php }?>
                                                            </select>
                                                            <div class="valid-feedback">
                                                                Tudo certo!
                                                            </div>
                                                        </div>
                                                        
                                                            <div class="form-group">
                                                                <label class="" for="valorDespesa">Despesa</label>
                                                                <input class="form-control" name="nomeDespesaDescricao" type="text" value="" placeholder="Digite uma descrição para a sua despesa">
                                                                
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="dataDespesa">Data de PGTO</label>
                                                                <input type="date" class="form-control" id="dataPagamentoDespesaDescricao" name="dataPagamentoDespesaDescricao" value="" placeholder="" required>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="valorDespesa">Valor</label>
                                                                <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="" placeholder="<?= $moeda?> 135,00" required>

                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                                

                                                            <div class="form-group">
                                                                <label class="" for="">Titular</label>
                                                                <select class="custom-select" id="titularDespesaDescricao" name="titularDespesaDescricao" required>
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
                                                                <label class="" for="">Situação</label>
                                                                <select class="custom-select" id="situacaoDespesaDescricao" name="situacaoDespesaDescricao" required>
                                                                <option class="" value="" selected>Selecione</option>
                                                                        <?php
                                                                            $sqlSituacaoDespesa = "SELECT * FROM  tbsituacaodespesa";
                                                                            $qrySituacaoDespesa = $operation->executarSQL($sqlSituacaoDespesa);

                                                                            while($situacaoDespesa = $operation->listar($qrySituacaoDespesa)){
                                                                                ?>
                                                                                <option value="<?= $situacaoDespesa["nomeSituacaoDespesa"]?>"><?=$situacaoDespesa["nomeSituacaoDespesa"];?></option>
                                                                            <?php }?>
                                                                </select>
                                                            </div>

                                                    </div>


                                                <!-- FIM DO CORPO DO FORM -->
                                            <div class="modal-footer mt-3">
                                                <button type="reset" class="btnShowModalDespesa btn btn-secondary btnAcao" id="btnCloseModal" data-dismiss="modal">Cancelar</button>
                                                <button type="sumit" class="btn btn-primary btnAcao btnSalve">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
