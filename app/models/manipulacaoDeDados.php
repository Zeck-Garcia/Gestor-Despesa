<?php
	include_once("DBConnection.php");
	
	class manipulacaoDeDados extends DBConnection
	{
		protected $sql;
		protected $tabela;
		protected $campos;
		protected $dados;
		protected $msg;
		protected $valorNaTabela;
		protected $valorPesquisa;
		
		public function getSql()
		{
			return $this->sql;
		}
		public function setTabela($tbl)
		{
			$this->tabela = $tbl;
		}		
		public function setCampos($campo)
		{
			$this->campos = $campo;
		}		
		public function setDados($dado)
		{
			$this->dados = $dado;
		}
		public function getMsg()
		{
			return $this->msg;
		}
		public function setValorNaTabela($val)
		{
			$this->valorNaTabela = $val;
		}
		public function setValorPesquisa($pesq)
		{
			$this->valorPesquisa = $pesq;
		}
		public function inserir()
		{
			$this->sql = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->dados)";
			if($this->executarSQL($this->sql))
			{
				$this->msg = "

				<div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'>        
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-fluid'>
							<div class='modal-header alert alert-success'>
								<h5 class='modal-title alert-heading'>Salvo</h5>
								<button type='button' class='close btnCloseModalMsgInBox' data-dismiss='modal' aria-label='Fechar'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body'>
									<p class=''>Registro cadastrado com sucesso</p>                
							</div>
							<div class='modal-footer'>
								<button type='button' class='btn btn-secondary btnCloseModalMsgInBox' data-dismiss='modal'>Fechar</button>
								<!-- <button type='button' class='btn btn-primary'>Salvar mudanças</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-backdrop show'></div>
				";
			}
		}
		public function excluir()
		{
			$this->sql = "DELETE FROM $this->tabela WHERE $this->valorNaTabela = $this->valorPesquisa";
			if($this->executarSQL($this->sql))
			{
				$this->msg = "
				<div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'>        
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-fluid'>
							<div class='modal-header alert alert-success'>
								<h5 class='modal-title alert-heading'>Excluido</h5>
								<button type='button' class='close btnCloseModalMsgInBox' data-dismiss='modal' aria-label='Fechar'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body'>
									<p class=''>Registro excluido com sucesso</p>                
							</div>
							<div class='modal-footer'>
								<a href='http://localhost/www/agenda-02/index.php?page=list-situacao-receita' class='btn btn-secondary btnCloseModalMsgInBox' data-dismiss='modal'>Fechar</a>
								<!-- <button type='button' class='btn btn-primary'>Salvar mudanças</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-backdrop show'></div>
				";
				
			}		
		}

		public function alterar()
		{
		// $sql = "UPDATE tabela set campos WHERE valorNaTabela = valorpesquisa ";
			$this->sql = "UPDATE $this->tabela SET $this->campos WHERE $this->valorNaTabela = $this->valorPesquisa";
			if($this->executarSQL($this->sql))
			{
				$this->msg = "
				<div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'>        
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-fluid'>
							<div class='modal-header alert alert-warning'>
								<h5 class='modal-title alert-heading'>Alterado</h5>
								<button type='button' class='close btnCloseModalMsgInBox' data-dismiss='modal' aria-label='Fechar'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body'>
									<p class=''>Registro alterado com sucesso</p>                
							</div>
							<div class='modal-footer'>
								<button type='button' class='btn btn-secondary btnCloseModalMsgInBox' data-dismiss='modal'>Fechar</button>
								<!-- <button type='button' class='btn btn-primary'>Salvar mudanças</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-backdrop show'></div>

					";
			}		
		
		}
		
		public function ultimoRegistro($campo, $tabela){
			$sql 	= "SELECT $campo FROM $tabela ORDER BY $campo DESC LIMIT 1";
			$qry 	= self::executarSQL($sql);
			$linha 	= self::listar($qry);
			
			return $linha["$campo"];
		}
		
	
	}
?>