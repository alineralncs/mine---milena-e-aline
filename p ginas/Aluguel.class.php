<?php 
class Aluguel{
    public function aluguel($datainicio, $datadevolucao, $cidade, $estado, $idveiculo, $idfuncionario, $idcliente, $idaluguel, $kminicial) {
        global $pdo;

        //$idcliente = "nextval('idcliente_seq')";
        $pgsql = "INSERT INTO aluguel(datainicio, datadevolucao, cidade, estado, idveiculo, funcionario, idcliente, idaluguel, kminicial)
        VALUES(:datainicio, :datadevolucao, :cidade,:estado, :idveiculo, :funcionario, :idcliente, :idaluguel, :kminicial)";
        
        $pgsql = $pdo->prepare($pgsql);
           
        $pgsql->bindValue('datainicio',$datainicio); 
        $pgsql->bindValue("datadevolucao", $datadevolucao);
        $pgsql->bindValue("cidade", $cidade);
        $pgsql->bindValue("estado", $estado);
        $pgsql->bindValue("idveiculo", $idveiculo);
        $pgsql->bindValue("funcionario", $idfuncionario);
        $pgsql->bindValue("idcliente", $idcliente);
        $pgsql->bindValue("idaluguel", $idaluguel);
        $pgsql->bindValue("kminicial", $kminicial);
        echo 'passou aqui';
        
        if($pgsql->execute()) {
            
            $dado = $pgsql->fetch();
            $_SESSION['aluguel'] = $dado['idaluguel'];
            
            echo $_SESSION['aluguel'];
            //sleep(10);
            return true;
        }
        else {
            return false;
        }
    }
    public function atualizar($datainicio, $datadevolucao, $idfuncionario, $idaluguel) {
        global $pdo;
        
        //$idcliente = "nextval('idcliente_seq')";
        $pgsql = "UPDATE aluguel set datainicio = :datainicio, datadevolucao = :datadevolucao, funcionario = :idfuncionario WHERE idaluguel = :idaluguel";
        
        
        $pgsql = $pdo->prepare($pgsql);
           
        $pgsql->bindValue('datainicio',$datainicio); 
        $pgsql->bindValue("datadevolucao", $datadevolucao);
        $pgsql->bindValue("idaluguel", $idaluguel);
        $pgsql->bindValue("idfuncionario", $idfuncionario);        
       
        
        if($pgsql->execute()) {
            
            $dado = $pgsql->fetch();
            return true;
        }
        else {
            return false;
        }
    }


}