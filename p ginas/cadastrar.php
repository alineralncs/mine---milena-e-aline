<?php

$nome = isset($_POST['nome']) ? addslashes(trim($_POST['nome'])) : FALSE;
$telefone = isset($_POST['telefone']) ? addslashes(trim($_POST['telefone'])) : FALSE;
$nome = isset($_POST['celular']) ? addslashes(trim($_POST['celular'])) : FALSE;
$logradouro = isset($_POST['logradouro']) ? addslashes(trim($_POST['logradouro'])) : FALSE;
$bairro = isset($_POST['bairro']) ? addslashes(trim($_POST['bairro'])) : FALSE;
$numero = isset($_POST['numero']) ? addslashes(trim($_POST['numero'])) : FALSE;
$estado = isset($_POST['estado']) ? addslashes(trim($_POST['estado'])) : FALSE;
$cpfcnpj = isset($_POST['cpfcnpj']) ? addslashes(trim($_POST['cpfcnpj'])) : FALSE;
$numcnh = isset($_POST['numcnh']) ? addslashes(trim($_POST['numcnh'])) : FALSE;
$validadecnh = isset($_POST['validadecnh']) ? addslashes(trim($_POST['validadecnh'])) : FALSE;
$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : FALSE;
//echo $_POST['idcliente'];
echo "<";
echo $_POST['nome'];
echo "<br>";
echo $_POST['telefone'];
echo "<br>";
echo $_POST['celular'];
echo "<br>";
echo $_POST['logradouro'];
echo "<br>";
echo $_POST['numero'];
echo "<br>";
echo $_POST['bairro'];
echo "<br>";
echo $_POST['cidade'];
echo "<br>";
echo $_POST['estado'];
echo "<br>";
echo $_POST['datanascimento'];
echo "<br>";
echo $_POST['cpfcnpj_cliente'];
echo "<br>";
echo $_POST['numcnh'];
echo "<br>";
echo $_POST['validadecnh'];
echo "<br>";
echo $_POST['email'];
echo "<br>";
echo 'passei inicio';
//n ta passando pra cá

if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['celular']) && !empty($_POST['logradouro']) && 
!empty($_POST['numero']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['estado']) &&
!empty($_POST['datanascimento']) && !empty($_POST['cpfcnpj_cliente']) && !empty($_POST['numcnh']) && !empty($_POST['validadecnh']) &&
!empty($_POST['email'])){
    require 'conexao02.php';
    require 'Cadastro.class.php';
    echo 'passei aqui2';
    $u = new CadastroCliente();
    

    //$idcliente = $_POST['idcliente'];
    $nome = $_POST['nome'];
    $tel = $_POST['telefone'];
    $cel = $_POST['celular'];
    $loge = $_POST['logradouro'];
    $num = $_POST['numero'];
    $bar = ($_POST['bairro']);
    $cidade = ($_POST['cidade']);
    $estado = ($_POST['estado']);
    $datanascimento = ($_POST['datanascimento']);
    $cpfcnpj = ($_POST['cpfcnpj_cliente']);
    $numcnh = ($_POST['numcnh']);
    $validadecnh = ($_POST['validadecnh']);
    $email = ($_POST['email']);
    $pgsql = "SELECT cast(nextval('idcliente_seq') as char(6)) as id";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->execute();

        if($pgsql->rowCount() > 0) {
            $dados = $pgsql->fetch();
            $idcliente = $dados['id'];
        }
if($u->cad($idcliente, $nome, $tel, $cel, $loge, $num, $bar, $cidade, $estado, $datanascimento, $cpfcnpj, $numcnh, $validadecnh, $email) == true) {
    
    $pgsql = "SELECT * FROM cliente WHERE cpfcnpj = :cpfcnpj";
    $pgsql = $pdo->prepare($pgsql);
    $pgsql->bindvalue('cpfcnpj',$cpfcnpj);
    $pgsql->execute();
    if($pgsql->rowCount() > 0) {
    //if(isset($_SESSION['idcadastro'])) {
            $_SESSION['idcliente'] = $idcliente;
            header("Location: clientecadastrado.php");
        } else {
            $_SESSION['cnpj'] = $cpfcnpj;
            header("Location: cadastro.php");
        }
    }else {
        $_SESSION['cnpj'] = $cpfcnpj;
        header("Location: cadastro.php");
    }

} else {
    $_SESSION['cnpj'] = $cpfcnpj;
    header("Location: cadastro.php");
}

?>
