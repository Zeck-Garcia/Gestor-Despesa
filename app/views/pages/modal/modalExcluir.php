                <div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'>        
					<div class='modal-dialog' role='document'>
						<div class='modal-content'>
							<div class='modal-fluid'>
								<div class='modal-header alert alert-danger'>
									<h5 class='modal-title alert-heading'>Excluindo</h5>
									<button type='button' class='close btnCloseModalMsgInBox' data-dismiss='modal' aria-label='Fechar'>
									<span aria-hidden='true'>&times;</span>
									</button>
								</div>
								<div class='modal-body'>

										<p class=''>Tem certeza que deseja excluir o registro atual?</p>                
								</div>
								<div class='modal-footer'>
									<a href="<?= $urlPageAtual;?>" class='btn btn-secondary btnCloseModalMsgInBox' data-dismiss='modal'>Fechar</a>
									<!-- <a href="" class='btn btn-primary'>Excluir</a> -->

                                    <form method="post" action="">

                                    <input type="hidden" name="qtdEnvio" value="<?php if($_GET["action"] == "deleted"){ echo $i = 1; } else { echo $i = 0;}?>">
									    <a  href="<?=$urlPageAtual . "&action=deleted&id=". $_GET['id'];?>" class='btn btn-primary'>Excluir</a>

                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='modal-backdrop show'></div>
    


