<?php

session_start();
unset($_SESSION['idfunc']); //matando a sessão

header("Location: index.php"); //redireciona para a página principal
?>