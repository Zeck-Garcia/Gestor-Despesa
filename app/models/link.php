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

            case "list-categoria-despesa":
                include_once "app/views/pages/table/list-categoria-despesa.php";
                break;

            case "list-categoria-receita":
                include_once "app/views/pages/table/list-categoria-receita.php";
                break;

            case "list-titular":
                include_once "app/views/pages/table/list-titular.php";
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

        //DESPESA DESCRICAO
        case "caddespesa":
            include_once "app/views/pages/modal/modal-cadastro-despesa.php";
            // include_once 'app/views/pages/modal/modalExcluir.php';
            break;

        case "caddespesasalve":
                searchDateRecord();
            echo "04";
            if($idDespesaPOST){
                cadDespesaDescricao();
                echo "02";
            } else {
                cadDespesa();
                searchDateRecord();
                cadDespesaDescricao();
                echo "01";
            }
            break;

        case "editdespesa":
            include_once "app/views/pages/modal/modal-cadastro-despesa.php";

            break;

        case "editeddespesa":
            // include_once "app/views/pages/modal/modal-cadastro-despesa.php";
            //A FAZER
            break;

            //CATEGORIA DE RECEITA
        case "salvecategoriareceita":
            salveCategoriaReceita();
            break;
        
        case "cadcategoriareceita":
            include_once "app/views/pages/modal/modal-categoria-cadastro-receita.php";

            break; 

            //CATEGORIA DE DESPESA
        case "salvecategoriadespesa":
            salveCategoriaDespesa();
            break;
        
        case "cadcategoriadespesa":
            include_once "app/views/pages/modal/modal-categoria-cadastro-despesa.php";

            break; 

            //TITULAR
        case "cadtitular":
            include_once "app/views/pages/modal/modal-titular.php";

            break;
                  
        case "salvetitular":
            salveTitular();
            break;
            
    }
}


?>