<?php
session_start();

// include_once "app/models/config.php";
include_once "./public/php/group-link-php.php";
include_once "app/models/manipulacaoDeDados.php";
$operation = new manipulacaoDeDados();

// $nomeUser = $_SESSION["loginUser"];
$imgPerfil = $_SESSION["imgUser"];

if(!$_SESSION["loginUser"] && !$_SESSION["imgUser"]){
    echo "sessão apagada";
    session_unset();
    echo $msg_error = "não deu bom";
    // session_destroy();
        
    header('Location: ././login.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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
                            <li><a class="dropdown-item" href="index.php?page=a-cadastro-despesa">Cadastrar</a></li> 
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
                    <img src="<?= $imgPerfil?>" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?= $_SESSION["loginUser"]?></strong> </a> 
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                    
                        <li><a class="dropdown-item" href="#">Titular</a></li>
                        <li> <hr class="dropdown-divider"> </li> 
                        <li><a class="dropdown-item" href="#">Banco</a></li>
                        <li> <hr class="dropdown-divider"> </li> 
                        <li><a class="dropdown-item" href="index.php?page=list-tipo-situacao-despesa">Situação despesa</a></li>
                        <li><a class="dropdown-item" href="index.php?page=list-situacao-receita">Situação receita</a></li>
                        <li> <hr class="dropdown-divider"> </li> 
                        <li><a class="dropdown-item" href="#">Tipo de despesa</a></li>
                        <li><a class="dropdown-item" href="#">Tipo de receita</a></li>
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
                    include_once "app/models/filter.php";
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- JS -->

<script src="public/js/index.js"></script>
<script src="public/js/validation.js"></script>

</body>
</html>

<?php



?>