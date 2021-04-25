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
    $idaluguel = $_POST['idaluguel'];

    
    if($u->atualizar($datainicio, $datadevolucao, $idfuncionario, $idaluguel) == true) {
        
        $pgsql = "SELECT * FROM aluguel WHERE idaluguel = :idaluguel";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindvalue('idaluguel',$idaluguel);
        $pgsql->execute();
        echo 'passou';
        if($pgsql->rowCount() > 0) {
            $dados = $pgsql->fetch();
            //if(($dados['datainicio']<>$datainicio) && ($dados['datadevolucao'] <> $datadevolucao) && ($dados['funcionario']=$idfuncionario)) {
               header("Location: alugado2.php?idaluguel=$idaluguel");
            //}
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