<?php
include_once('conexao.php');
class veiculo {
    public $modelo;
    public $placa;
    public $ano;
    public $quilometragem;
    public $idveiculo;
    public $motor;
    public $marca;


    private $conexao03;

    public function __construct(){
        $this->conexao03 = ConectaBanco::conexao();
    }

    public function insert_veiculo() {
    $stmt = $this->conexao03->prepare("INSERT INTO veiculo(modelo, placa, ano, quilometragem, motor, marca)VALUES(?,?,?,?,?,?)");

        $stmt->bindParam(1, $this->modelo);
        $stmt->bindParam(2, $this->placa);
        $stmt->bindParam(3, $this->ano);
        $stmt->bindParam(4, $this->quilometragem);
        $stmt->bindParam(5, $this->motor);
        $stmt->bindParam(6, $this->marca);
        


        $stmt->execute();
        $this->idveiculo = $this->conexao03->lastInsertId();
        
        
    }

   
}
?>