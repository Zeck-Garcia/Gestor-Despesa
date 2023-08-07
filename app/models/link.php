<?php

// $link = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);

// $desc = isset($_POST["action"]) == "" ? "" : $_POST["action"];

$page = (isset($_GET["page"]) == "" ? "" : $_GET["page"]);

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
                include_once "app/views/pages/table/table-despesa.php";
            break;

            case "a-cadastro-despesa":
                include_once "app/views/pages/forms/form-despesa-descricao.php";
            break;

            case "a-inserir-cadastro-despesa":
                include_once "app/models/filter.php";
            break;
        }

} else {
    echo "pagina não encontrada";
}
