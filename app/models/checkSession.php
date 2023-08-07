<?php

// require_once "session.php";

if(!$_SESSION["userName"] && $_SESSION["password"])
{
    // header("Location: login.php");
    echo "sessão vazia";
}