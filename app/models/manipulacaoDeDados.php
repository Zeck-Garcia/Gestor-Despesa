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
					<div class='alert alert-success' role='alert'>
        				<h4 class='alert-heading'>Salvo</h4>
        				<p class=''>Registro cadastrado com sucesso</p>
    				</div>
				";
			}
		}
		public function excluir()
		{
			$this->sql = "DELETE FROM $this->tabela WHERE $this->valorNaTabela = $this->valorPesquisa";
			if($this->executarSQL($this->sql))
			{
				$this->msg = "
					<div class='alert alert-danger' role='alert'>
        				<h4 class='alert-heading'>Salvo</h4>
        				<p class=''>Registro excluido com sucesso</p>
    				</div>
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
					<div class='alert alert-warning' role='alert'>
        				<h4 class='alert-heading'>Salvo</h4>
        				<p class=''>Registro alterado com sucesso</p>
    				</div>";
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