<?php

require('conexao02.php');

if(isset($_SESSION['idfunc']) && !empty($_SESSION['idfunc'])) {
    require_once 'Usuario.class.php';
    $u = new Usuario();

    $listlog = $u->log($_SESSION['idfunc']);

    $name = $listlog['nome'];
} else {
    header("Location: index.php");
}
?>