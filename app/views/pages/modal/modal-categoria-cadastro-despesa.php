<div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-fluid">

      <div class="modal-header">
        <h5 class="modal-title">Cadastro categoria despesa</h5>
        <button type="button" class="close btnCloseModal" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <div class="container-fluid">

                <div class="row">
                    <form class="needs-validation" action="<?=$urlPageAtual.'&action=salvecategoriadespesa' ?>" method="post" >
                        <label>Categoria</label>
                        <input type="text" class="form-control" class="" id="" name="nomeCategoriaDespesa" placeholder="Digite um nova categoria">
                        <div class="modal-footer mt-3">
                          <a href="<?= $urlPageAtual;?>" class="btnShowModalDespesa btn btn-secondary btnAcao" id="btnCloseModal" data-dismiss="modal">Cancelar</a>
                            <button type="sumit" class="btn btn-primary">Salvar</button>
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