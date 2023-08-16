<!-- <div class="modal" tabindex="-1" role="dialog"> -->
    
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
                        <label>Situação</label>
                        <input type="text" class="form-control" class="" id="" name="nomeSituacaoReceita" placeholder="Digite um novo titulo">

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