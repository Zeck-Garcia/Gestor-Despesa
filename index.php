<?php
// session_start();

// include_once "app/models/config.php";
include_once "./public/php/group-link-php.php";
include_once "app/models/manipulacaoDeDados.php";
$operation = new manipulacaoDeDados();

// $nomeUser = $_SESSION["loginUser"];
// if(!$_SESSION["loginUser"] && !$_SESSION["passwordUser"]){

if(!session_start()){
    echo "sessão apagada";
    session_unset();
    // echo $msg_error = "não deu bom";
    session_destroy();
    
    if(empty(session_id())){
    //     echo "sessao vazia";
        // header('Location: ././login.php');
    exit();
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="public/css/index.css">


</head>
<body>

<div class="row">
<div>

</div>

    <div class="col-2">
        <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> 
            <svg class="bi me-2" width="40" height="32"> </svg> 
            <span class="fs-4">Gestor de gastos</span> </a> 
            <hr> 
            <ul class="nav nav-pills flex-column mb-auto"> 
                <li class="nav-item"> 
                    <a href="#" class="nav-link active" aria-current="page"> 
                        <i class="fa fa-home"></i>
                        <span class="ms-2">Início</span> 
                    </a> 
                </li> 

                <li>
                    <div class="dropdown nav-link"> 
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Dashboard</a> 
                        <!-- <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                            <li><a class="dropdown-item" href="index.php?page=a-cadastro-despesa">Cadastrar</a></li> 
                            <li><a class="dropdown-item" href="#">Listar</a></li>  
                        </ul>  -->
                    </div>
                </li>

                <li> 
                    <div class="dropdown nav-link"> 
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Despesas</a> 
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                            <li><a class="dropdown-item" href="#">Cadastrar</a></li> 
                            <li><a class="dropdown-item" href="#">Balanço</a></li> 
                            <li><a class="dropdown-item" href="index.php?page=list-despesa">Listar</a></li> 
                            <li> <hr class="dropdown-divider"> </li> 
                            <li><a class="dropdown-item" href="#">Sign out</a></li> 
                        </ul> 
                    </div>
                </li> 

                <li>
                    <div class="dropdown nav-link"> 
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Receita</a> 
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                            <li><a class="dropdown-item" href="index.php?page=a-cadastro-despesa">Cadastrar</a></li> 
                            <li><a class="dropdown-item" href="index.php?page=list-receita">Listar</a></li>  
                        </ul> 
                    </div>
                </li>

                <li>
                    <div class="dropdown nav-link"> 
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Balanço</a> 
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                            <li><a class="dropdown-item" href="index.php?page=a-cadastro-despesa">Cadastrar</a></li> 
                            <li><a class="dropdown-item" href="#">Listar</a></li>  
                        </ul> 
                    </div>
                </li>
            </ul> 

            <hr> 
            <div class="dropdown"> 
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <img src="<?= $_SESSION["imgUser"]?>" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?= $_SESSION["loginUser"]?></strong> </a> 
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                    
                        <li><a class="dropdown-item" href="index.php?page=list-titular">Titular</a></li>
                        <li> <hr class="dropdown-divider"> </li> 
                        <li><a class="dropdown-item" href="index.php?page=list-situacao-despesa">Situação despesa</a></li>
                        <li><a class="dropdown-item" href="index.php?page=list-situacao-receita">Situação receita</a></li>
                        <li> <hr class="dropdown-divider"> </li> 
                        <li><a class="dropdown-item" href="index.php?page=list-categoria-despesa">Categoria de despesa</a></li>
                        <li><a class="dropdown-item" href="index.php?page=list-categoria-receita">Categoria de receita</a></li>
                        <li> <hr class="dropdown-divider"> </li> 
                        
                        <li><a class="dropdown-item" href="#">Configuração</a></li> 
                        <li><a class="dropdown-item" href="#">Perfil</a></li> 
                    
                        <li> <hr class="dropdown-divider"> </li> 
                    
                        <li><a class="dropdown-item" href="#">Sair</a></li> 
                    </ul> 
            </div>
        </div>
    </div>


    <div class="container col-7 shadow bg-white">
    <!-- <button id="btnShowModal" class="btnShowModalA btn btn-primary">Cadastrar nova posição <i class="bi bi-plus-circle"></i></button> -->
        


        <div class="row">    
            <article>
                <?php
                    // include_once "app/models/filter.php";
                    include_once "app/models/link.php";
                ?>
            </article>
        </div>
    </div>

    <div class="col shadow-sm rounded bg-light">
        <article>
            <?php
                include_once "app/views/pages/aside/info-despesa-geral.php";
            ?>
        </article>
    </div>

</div>



<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS -->

<script src="public/js/index.js"></script>
<script src="public/js/validation.js"></script>

</body>
</html>

