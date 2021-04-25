<?php

class Usuario {
    public function login($user, $pass) {
        global $pdo;
        $pgsql = "SELECT * FROM funcionario WHERE idfuncionario = :idfuncionario AND senha = :senha";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindValue("idfuncionario", $user);
        $pgsql->bindValue("senha", MD5($pass));
        $pgsql->execute();

        if($pgsql->rowCount() > 0) {
            $dado = $pgsql->fetch();

            $_SESSION['idfunc'] = $dado['idfuncionario'];

            return true;
        } else {
            return false;
        }
    }

    public function log($idfuncionario) {
        global $pdo;

        $array = array();

        $pgsql = "SELECT nome FROM funcionario where idfuncionario = :idfuncionario";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindValue("idfuncionario", $idfuncionario);
        $pgsql->execute();

        if($pgsql->rowCount() > 0) {
            $array = $pgsql->fetch();
        }
        return $array;
    }
}
?>