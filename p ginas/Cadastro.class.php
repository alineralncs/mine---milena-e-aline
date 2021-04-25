<?php

class CadastroCliente {
    public function cad($idcliente, $nome, $tel, $cel, $loge, $num, $bar, $cidade, $estado, $datanascimento, $dados, $numcnh, $validadecnh, $email) {
        global $pdo;

        //$idcliente = "nextval('idcliente_seq')";
        $pgsql = "INSERT INTO cliente(idcliente, nome, telefone, celular, logradouro, numero, bairro, cidade, estado, datanascimento, cpfcnpj, numcnh,
        validadecnh, email)VALUES(:idcliente, :nome, :tel, :cel, :loge, :num, :bar, :cidade, :estado, :datanascimento, :dados, :numcnh, :validadecnh, :email)";
        
        $pgsql = $pdo->prepare($pgsql);
           
        $pgsql->bindValue('idcliente',$idcliente); 
        $pgsql->bindValue("nome", $nome);
        $pgsql->bindValue("tel", $tel);
        $pgsql->bindValue("cel", $cel);
        $pgsql->bindValue("loge", $loge);
        $pgsql->bindValue("num", $num);
        $pgsql->bindValue("bar", $bar);
        $pgsql->bindValue("cidade", $cidade);
        $pgsql->bindValue("estado", $estado);
        $pgsql->bindValue("datanascimento", $datanascimento);
        $pgsql->bindValue("dados", $dados);
        $pgsql->bindValue("numcnh", $numcnh);
        $pgsql->bindValue("validadecnh", $validadecnh);
        $pgsql->bindValue("email", $email);
        echo 'passou aqui <br><br>';        
        
        if($pgsql->execute()) {
            
            $dado = $pgsql->fetch();
            $_SESSION['idcadastro'] = $dado['idcliente'];
            
            echo $_SESSION['idcadastro'];
            //sleep(10);
            return true;
        }
        else {
            return false;
        }
    }
}
?>