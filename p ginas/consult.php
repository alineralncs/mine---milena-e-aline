<?php
$dado_cliente = $_POST['cpfcnpj_cliente'];
if(isset($_POST['cpfcnpj_cliente']) && !empty($_POST['cpfcnpj_cliente'])) {
    require 'conexao02.php';
    require 'Cliente.class.php';

    $u = new CCliente();


    
    $dado_cliente = addslashes($_POST['cpfcnpj_cliente']);
  echo "Passei aqui ";
  echo $dad0_cliente;

    if($u->verifica($dado_cliente) == true) {
        $pgsql = "SELECT * FROM cliente WHERE cpfcnpj = :dado_cliente";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindvalue('dado_cliente',$dado_cliente);
        $pgsql->execute();

        if($pgsql->rowCount() > 0) {
            $dados = $pgsql->fetch();
            $idcliente = $dados['idcliente'];
            echo "Cliente " ;
            echo $dados['nome'] ;
            echo " Registro id :" ;
            echo $dados['idcliente'];

            $_SESSION['idcliente'] = $idcliente;
            if($dados)
            header("Location: clientecadastrado.php");
        }
        
           
         else {
            $_SESSION['cnpj'] = $dado_cliente;
            header("Location: cadastro.php");
        }
    } else {
        $_SESSION['cnpj'] = $dado_cliente;
        header("Location: cadastro.php");
    }
} else {
    $_SESSION['cnpj'] = $dado_cliente;
    header("Location: cadastro.php");
}


?>