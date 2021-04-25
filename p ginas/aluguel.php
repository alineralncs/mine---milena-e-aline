<?php
 
    
if(!empty($_POST['datainicio']) &&isset($_POST['datadevolucao']) && !empty($_POST['datadevolucao'])
 && isset($_POST['cidade']) && !empty($_POST['cidade']) && isset($_POST['estado'])&& !empty($_POST['estado']) && 
 isset($_POST['idveiculo'])&& !empty($_POST['idveiculo']) && isset($_POST['idfuncionario'])&& !empty($_POST['idfuncionario'])
 && isset($_POST['idcliente'])&& !empty($_POST['idcliente'])) {
    require 'conexao02.php';
    require 'Aluguel.class.php';
    echo 'passei aqu';
    $u = new Aluguel();

    $idfuncionario = $_POST['idfuncionario'];
    $idcliente = $_POST['idcliente'];
    $idveiculo = $_POST['idveiculo'];
    $datainicio = $_POST['datainicio'];
    $datadevolucao = $_POST['datadevolucao'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $pgsq1 = "SELECT quilometragem FROM veiculo WHERE idveiculo = :idveiculo";
    $pgsq1 = $pdo->prepare($pgsq1);
    $pgsq1->bindValue("idveiculo", $idveiculo);
    $pgsq1->execute();
    $kminicial = 0;
    if($pgsq1->rowCount() > 0) {
        $dados = $pgsq1->fetch();
        $kminicial = $dados['quilometragem'];
    }

    $pgsql = "SELECT cast(nextval('idaluguel_seq') as char(6)) as id";
    $pgsql = $pdo->prepare($pgsql);
    $pgsql->execute();

    if($pgsql->rowCount() > 0) {
        $dados = $pgsql->fetch();
        $idaluguel = $dados['id'];
    }

    if($u->aluguel($datainicio, $datadevolucao, $cidade, $estado, $idveiculo, $idfuncionario, $idcliente, $idaluguel, $kminicial) == true) {
        
        /*$pgsql = "SELECT * FROM aluguel WHERE idaluguel = :idaluguel";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindvalue('idaluguel',$idaluguel);
        $pgsql->execute();*/
        echo 'passou';
        if($pgsql->rowCount() > 0) {
            
             header("Location: alugado.php?idaluguel=$idaluguel");
            } else {
                header("Location: alugar.php");
            }
        } else {
            header("Location: alugar.php");
        }
    }
    
    else {
        echo 'passou';
        header("Location: alugar.php");
    }


?>