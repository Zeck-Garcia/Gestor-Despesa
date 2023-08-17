<input type="text" class="statusModal" name="statusModal" value=""> 


<?php
echo $statusModalTeste = "<p class='statusModalTeste'></p>";


//ACTION CAD

$pageative = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
echo $id = (isset($_GET["id"]) != "" ? $_GET["id"] : "");

echo $teste = (isset($_POST["teste"]) == "" ? "" : $_POST["teste"]);




// searchBDdespesa();

if($pageative == "list-despesa"){
    // echo "novo contato";
    // $moeda = "";
    echo $dados['idDespesaDescricao'] = "";
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


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-fluid">
            
            <div class="modal-header">
                <h5 class="modal-title">Cadastro nova despesa</h5>
                <!-- <p class="statusModal">Teste</p> -->
                            <button type="button" class="close btnCloseModal" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php
                             $statusModalTeste;
                             preg_match_all("#<p>.*</p>#", $statusModalTeste, $resultado);
                             $ultimo = array($resultado[0]);
                             ?>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <!-- <input type="text" class="statusModal" name="statusModal" value=""> -->
                                    <div class="row">
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
                                                <!-- CORPO DO FORM -->
                                                    <div class="row">
                                                        
                                                            <div class="form-group">
                                                                <label class="" for="valorDespesa">Valor</label>
                                                                <input type="double" class="form-control" id="valorDespesaDescricao" name="valorDespesaDescricao" value="<?php $moeda . $dados['valorDespesaDescricao'];?>" placeholder="R$ 10,00" required>

                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>
                                                                
                                                            <div class="form-group">
                                                                <label class="" for="dataDespesa">Data de PGTO</label>
                                                                <input type="date" class="form-control" id="dataPagamentoDespesaDescricao" name="dataPagamentoDespesaDescricao" value="<?= $dados['dataPagamentoDespesaDescricao']?>" placeholder="" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="valorDespesa">Nome</label>
                                                                <input class="form-control" name="nomeDespesaDescricao" type="text" value="<?= $dados['nomeDespesaDescricao']?>">
                                                                
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="">Categoria</label>
                                                                <select class="custom-select" id="tipoDespesaDescricao" name="tipoDespesaDescricao" required>
                                                                    <option class="" value="2" selected><?= $dados["tipoDespesaDescricao"]?></option>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    Tudo certo!
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="" for="">Titular</label>
                                                                <select class="custom-select" id="titularDespesaDescricao" name="titularDespesaDescricao" required>
                                                                    <option class="form-control" id="" name="" value="jose" selected><?= $dados["titularDespesaDescricao"]?></option>
                                                                </select>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label class="" for="">Situação</label>
                                                                <select class="custom-select" id="situacaoDespesaDescricao" name="situacaoDespesaDescricao" required>
                                                                    <option class="" value="1"><?= $dados["situacaoDespesaDescricao"]?></option>
                                                                </select>
                                                            </div>

                                                    </div>


                                                <!-- FIM DO CORPO DO FORM -->
                                            <div class="modal-footer mt-3">
                                                <button type="reset" class="btnCloseModal btn btn-secondary" id="btnCloseModal" data-dismiss="modal">Cancelar</button>
                                                <button type="sumit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>