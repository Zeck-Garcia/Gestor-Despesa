<!-- <div class="modal" tabindex="-1" role="dialog"> -->
   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-fluid">

      <div class="modal-header">
        <h5 class="modal-title">Cadastro de situacao de despesa</h5>
        <button type="button" class="close btnCloseModal" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <div class="container-fluid">

                <div class="row">
                    <form class="needs-validation" action="index.php?page=<?php
                                                if($statusAgora == "list-situacao-despesa"){
                                                    echo "a-inserir-cadastro-situacao-despesa";
                                                } else if($statusAgora == "editar-cadastro-situacao-despesa"){
                                                    echo "atualizar-cadastro-situacao-despesa";
                                                } else if($statusAgora == "a-excluir-cadastro-situacao-despesa"){
                                                    echo "excluir-cadastro-situacao-despesa";
                                                }
                                                    ?>
                                                    " method="post" >
                        <label>Situação</label>
                        <input type="text" class="form-control" class="" id="" name="nomeSituacaoDespesa" placeholder="Digite um nova despesa">
                        <div class="modal-footer mt-3">
                            <button type="reset" class="btnCloseModal btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="sumit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>
<!-- </div> -->