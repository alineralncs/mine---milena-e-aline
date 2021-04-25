<?php

class ConectaBanco {
    
    public static $conn;
    //cria um objeto PDO no padrão singleton, então toda vez que o banco de dados for utilizado, o objeto será único para cada um   
    public static function conexao() {
        //global $conn;
        if(!isset(self::$conn)) {
            $servidor = "localhost";
            $porta = 5432;
            $bancoDeDados = "mine";
            $usuario = "postgres";
            $senha = "ciecmilena2001";
            
            
            try {
                self::$conn = new PDO("pgsql:host = $servidor; port = $porta; dbname = $bancoDeDados; user =  $usuario; password = $senha");
                //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            catch(Excpetion $e) {
                echo $e->getMessage();
            }

            return self::$conn;

        }
    }
}
    
?>