<?php
include_once('conexao.php');
class Cliente {
    public $idcliente;
    public $nome;
    public $telefone;
    public $celular;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;
    public $datanascimento;
    public $cpfcnpj;
    public $numcnh; 
    public $validadecnh;
    public $email;

    private $conexao02;

    public function __construct() {
        $this->conexao02 = ConectaBanco::conexao();
    }

    public function insert_cliente() {
        $stmt = $this->conexao02->prepare("INSERT INTO cliente(nome, 
        telefone, celular, logradouro, numero, bairro, cidade, estado, 
        datanascimento, cpfcnpj, numcnh, validadecnh, email)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->telefone);
        $stmt->bindParam(3, $this->celular);
        $stmt->bindParam(4, $this->logradouro);
        $stmt->bindParam(5, $this->numero);
        $stmt->bindParam(6, $this->bairro);
        $stmt->bindParam(7, $this->cidade);
        $stmt->bindParam(8, $this->estado);
        $stmt->bindParam(9, $this->datanascimento);
        $stmt->bindParam(10, $this->cpfcnpj);
        $stmt->bindParam(11, $this->numcnh);
        $stmt->bindParam(12, $this->validadecnh);
        $stmt->bindParam(13, $this->email);

        $stmt->execute();
        $this->idcliente = $this->conexao02->lastInsertId();

    }

    public function select_id_cliente($idcliente) {
        $rs = $this->conexao02->query("SELECT * FROM cliente WHERE id = '$idcliente'");
        $row = $rs->fetch(PDO::FECTH_OBJ);
        if(empty($row)) {
            return NULL;
        }

        $this->idcliente = $row->idcliente;
        $this->nome = $row->nome;
        $this->telefone = $row->telefone;
        $this->celular = $row->celular;
        $this->logradouro = $row->logradouro;
        $this->numero = $row->numero;
        $this->bairro = $row->bairro;
        $this->cidade = $row->cidade;
        $this->estado = $row->estado;
        $this->datanascimento = $row->datanascimento;
        $this->cpfcnpj = $row->cpfcnpj;
        $this->numcnh = $row->numcnh;
        $this->validadecnh = $row->validadecnh;
        $this->email = $row->email;       
        
    }

    public function listarALL_cliente() {
        $rs = $this->conexao02->query("SELECT * FROM cliente");
        $clientes = null;
        $i = 0;

        while($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $cliente = new Cliente();

            $cliente->idcliente = $row->idcliente;
            $cliente->nome = $row->nome;
            $cliente->telefone = $row->telefone;
            $cliente->celular = $row->celular;
            $cliente->logradouro = $row->logradouro;
            $cliente->numero = $row->numero;
            $cliente->bairro = $row->bairro;
            $cliente->cidade = $row->cidade;
            $cliente->estado = $row->estado;
            $cliente->datanascimento = $row->datanascimento;
            $cliente->cpfcnpj = $row->cpfcnpj;
            $cliente->numcnh = $row->numcnh;
            $cliente->validadecnh = $row->validadecnh;
            $cliente->email = $row->email;    
            
            $cliente->conexao02 = null;

            $clientes[$i] = $cliente;
            $i++;
            
        }
        return $clientes;
    }

    public function update_cliente() {
        $stmt = conexao02->prepare("UPDATE cliente SET nome = ?, telefone = ?, 
        logradouro = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, datanascimento = ?,
        cpfcnpj = ?, numcnh = ?, validadecnh = ?, email = ? where id = ?");
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->telefone);
            $stmt->bindParam(3, $this->celular);
            $stmt->bindParam(4, $this->logradouro);
            $stmt->bindParam(5, $this->numero);
            $stmt->bindParam(6, $this->bairro);
            $stmt->bindParam(7, $this->cidade);
            $stmt->bindParam(8, $this->estado);
            $stmt->bindParam(9, $this->datanascimento);
            $stmt->bindParam(10, $this->cpfcnpj);
            $stmt->bindParam(11, $this->numcnh);
            $stmt->bindParam(12, $this->validadecnh);
            $stmt->bindParam(13, $this->email);

            return $stmt->execute();
    }
}
?>