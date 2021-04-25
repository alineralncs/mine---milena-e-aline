<?php
echo 'passei aqui';
if(isset($_POST['idfuncionario']) && !empty($_POST['idfuncionario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    require 'conexao02.php';
    require 'Usuario.class.php';

    $u = new Usuario();
    
    $user = addslashes($_POST['idfuncionario']);
    $pass = addslashes($_POST['senha']);

    if($u->login($user, $pass) == true) {
        if(isset($_SESSION['idfunc']) == true) {
            header("Location: newAluguel.php");
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
}
else {
    header("Location: index.php");
}
?>