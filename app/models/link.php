<?php

// $link = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);

// $desc = isset($_POST["action"]) == "" ? "" : $_POST["action"];

$page = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);
$id = (isset($_GET["id"]) == "" ? "" : $_GET["id"]);

// $page[1] = "app/views/pages/table/table-despesa.php";
// $page[] = "app/views/pages/forms/form-despesa-descricao.php";
// $page["cadastroDespesa"] = "app/views/pages/forms/form-despesa-descricao.php";

// $page["cadastro"] = "app/models/filter.php";

// $page["index.php?page=1&action=cadastro"] =  "app/models/filter.php";

// $desc["cadastroDespesa"] = "app/models/filter.php";

// if(!empty($link)){
//     if(file_exists($page[$link])){
//         include_once $page[$link];
//     } else {
//         include_once "index.php";
//     }
// } else {
//     include_once "index.php";
// }

if(!empty($page)){
        switch($page){
            case "list-despesa":
                include_once "app/views/pages/table/list-table-despesa.php";
            break;

            // case "a-cadastro-despesa":
                // include_once "app/views/pages/forms/form-despesa-descricao.php";
            // break;


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

            case "list-tipo-situacao-despesa";
                include_once "app/views/pages/table/list-tipo-situacao-despesa.php";
            break;

            case "list-situacao-receita";
            include_once "app/views/pages/table/list-tipo-situacao-receita.php";
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
