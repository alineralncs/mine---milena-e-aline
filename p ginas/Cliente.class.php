<?php
class CCliente {
    public function verifica($dado_cliente){
        global $pdo;
        $cpfcnpj = $dado_cliente;
        $pgsql = "SELECT * FROM cliente WHERE cpfcnpj = :cpfcnpj";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindValue("cpfcnpj", $dado_cliente);
        $pgsql->execute();

        if($pgsql->rowCount() > 0) {

            $dado = $pgsql->fetch();

            $_SESSION['icliente'] = $dado['idcliente'];
            $_SESSION['cnpj'] = $dado['cpfcnpj'];
            $_SESSION['name'] = $dado['nome'];

            return true; 
        } else {
            $_SESSION['cnpj'] = $dado_cliente;
            return false;
        }
    }

    public function cciente($id) {
        global $pdo;

        $array = array();

        $pgsql = "SELECT nome FROM cliente where idcliente = :idcliente";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindValue("idcliente", $id);
        $pgsql->execute();

        if($pgsql->rowCount() > 0) {
            $array = $pgsql->fetch();
        }
        return $array;
    }
}
?>