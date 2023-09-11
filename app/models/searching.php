<?php
// include_once "app/models/manipulacaoDeDados.php";

// $operation = new manipulacaoDeDados();

if(!empty(isset($_POST["txtPesquisa"]))){

    if(isset($_POST["txtPesquisa"])){
        $_SESSION["txtPesquisaValue"] = $_POST["txtPesquisa"];
        $_GET["pagina"] = 1;
        // header("Location: {$_SERVER['SCRIPT_NAME']}?{$_SESSION['urlSearchStart']}");
    }
}



$txtPesquisa = isset($_SESSION["txtPesquisaValue"]) == "" ? "" : $_SESSION["txtPesquisaValue"];

function searching(){
    
    global $operation;
    global $txtPesquisa;
    global $sql;
    global $quantidade;
    global $pageAtual;
    global $inicio;
    global $qry;
    global $tabela;
    global $camposSelect;
    global $camposWherePesquisaPrincipal;
    global $camposPesquisaAdd;
    global $orderBy;
    global $orderByType;
    global $totalResgistro;
    global $totalPage;
    global $pageSearchStart;
    global $campoWhereAndPesquisa;
    global $sqlSelect;

    $pageSearchStart = (isset($_GET["pagina"]) == "" ? 1 : $_GET["pagina"]);

    // $txtPesquisa = $_SESSION["txtPesquisa"];
    
    $inicio = ($quantidade * $pageSearchStart) - $quantidade;
    
    $pageAtual = $_GET["page"];
    
    if($inicio == 0){
        $inicio = $inicio;
    
    } else {
        $inicio = ($quantidade * $pageSearchStart) - $quantidade;
    }
    // $txtPesquisa == "" ? "" : " AND $campoWhereAndPesquisa='$txtPesquisa'";

    // $where = ($camposWherePesquisaPrincipal == "" ? "" : "WHERE");
    
    // $camposWherePesquisaPrincipal = ($camposWherePesquisaPrincipal == "" ? "" : "$camposWherePesquisaPrincipal");
    
    // $campoWhereAndPesquisa = ($txtPesquisa == "" ? "" : " AND $campoWhereAndPesquisa='$txtPesquisa'");
    
    // $camposPesquisaAdd = ($txtPesquisa = "" ? "" : $camposPesquisaAdd);
    

        $sql = "$sqlSelect

                ORDER BY
                $orderBy $orderByType

                LIMIT $inicio, $quantidade
        ";

                // $campoWhereAndPesquisa;

    $qry = $operation->executarSQL($sql);

    //SQL PARA O PAGINADOR
    $totalResgistro = mysqli_num_rows($operation->executarSQL("$sqlSelect"));

    $totalPage = ceil($totalResgistro / $quantidade);


    if(!$totalResgistro){
        echo "
        <div class='modal modalMsgInBox show' tabindex='-1' style='display: block;' aria-modal='true' role='dialog'>        
						<div class='modal-dialog' role='document'>
							<div class='modal-content'>
								<div class='modal-fluid'>
									<div class='modal-header alert alert-warning'>
										<h5 class='modal-title alert-heading'>Nada encontrodo</h5>
										<button type='button' class='close btnCloseModalMsgInBox' data-dismiss='modal' aria-label='Fechar'>
										<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
											<p class=''>Não foi encontrado nenhum registro com o termo solicitado</p>                
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

?>