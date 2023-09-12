<?php
// $link = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);

// $desc = isset($_POST["action"]) == "" ? "" : $_POST["action"];

$page = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
$id = (isset($_GET["id"]) == "" ? "" : $_GET["id"]);
$action = (isset($_GET["action"]) == "" ? "" : $_GET["action"]);

$statusAction = isset($_GET["statusAction"]) == "" ? "" : $_GET["statusAction"];

if(!empty($page)){
        switch($page){
            case "list-despesa":
                include_once "app/views/pages/table/list-table-despesa.php";
            break;

            case "a-inserir-cadastro-despesa":
                include_once "app/models/filter.php";
            break;

            case "editar-cadastro-despesa":
                include_once "app/views/pages/forms/form-despesa-descricao.php";
            break;

            case "validation";
            // echo "deu bom";
                include_once "app/models/session.php";
            break;

            case "login":
                include_once "../../login.php";
            break;

            case "list-situacao-despesa";
                include_once "app/views/pages/table/list-tipo-situacao-despesa.php";
            break;

            case "list-situacao-receita";
            include_once "app/views/pages/table/list-tipo-situacao-receita.php";
            break;

            case "a-inserir-cadastro-situacao-receita";
            include_once "app/views/pages/table/list-tipo-situacao-receita.php";
                salveSituacaoReceita();
            break;


            case "a-inserir-cadastro-situacao-receita":
                salveSituacaoReceita();
            break;

            case "a-inserir-cadastro-receita":
                salveCadastroReceita();
            break;

            case "list-receita":
                include_once "app/views/pages/table/list-table-receita.php";
                break;
        }

        
} else {
    echo "pagina não encontrada";
}



if (!empty($action)) {
    switch($action){
        case "delete":
            include_once 'app/views/pages/modal/modalExcluir.php';
            break;

            case "deleted":
            deleteitemsDB();
            break;

            case "caddespesa":
                include_once "app/views/pages/modal/modal-cadastro-despesa.php";
                // include_once 'app/views/pages/modal/modalExcluir.php';
                break;

            case "caddespesasalve":
                if(searchDateRecord()){
                    echo "01";
                }

                break;

    }
}


?>