<?php
include_once('conexao.php'); //incluo a classe de conexao do banco de dados
class funcionario {

    public $idfuncionario;
    public $nome;
    public $telefone;
    public $celular;
    public $logradouro;
    public $numero;
    public $bairro; 
    public $cidade; 
    public $estado; 
    public $datanascimento; 
    public $cpf;
    public $dataadmissao;
    public $senha;


    private $conexao01;

    public function __construct() {
        $this->conexao01 = ConectaBanco::conexao();
    }

    public function insert() {
        
        //idfuncionario já é autoincremento, então não precisa inserir
        $stmt = $this->conexao01->prepare("INSERT INTO funcionario(idfuncionario, nome, telefone, celular, logradouro, numero, bairro, 
        cidade, estado, datanascimento, cpf, dataadmissao, senha)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");   
         $stmt->bindParam(1, $this->idfuncionario);
         $stmt->bindParam(2, $this->nome);
         $stmt->bindParam(3, $this->telefone);
         $stmt->bindParam(4, $this->celular);
         $stmt->bindParam(5, $this->logradouro);
         $stmt->bindParam(6, $this->numero);
         $stmt->bindParam(7, $this->bairro);
         $stmt->bindParam(8, $this->cidade);
         $stmt->bindParam(9, $this->estado);
         $stmt->bindParam(10, $this->datanascimento);
         $stmt->bindParam(11, $this->cpf);
         $stmt->bindParam(12, $this->dataadmissao);
         $stmt->bindParam(13, $this->senha);
         

         $stmt->execute();
         //$this->idfuncionario->conexao01->lastInsertId(); 
         //retorna o último id que foi gerado no banco
    }

    public function select_id($idfuncionario) {
        //faço uma consulta no banco de dados e seleciono na tabela funcionário onde a coluna id for igual ao idfuncionario que estou passando como parâmetro
        $rs = $this->conexao01->query("SELECT * FROM funcionario WHERE id = '$idfuncionario'");
        $row = $rs->fetch(PDO::FETCH_OBJ);
        //encima, temos que a varíavel row executa o resultado da consulta $rs e retorna ou vazil ou um objeto

        if(empty($row)){ //se a variável for vazia
            return NULL; 
        }
        //se ela não for vazia ela retorna o objeto para a tabela

        $this->idfuncionario = $row->idfuncionario;
        $this->nome = $row->nome;
        $this->telefone = $row->telefone;
        $this->celular = $row->celular;
        $this->logradouro = $row->logradouro;
        $this->numero = $row->numero;
        $this->bairro = $row->bairro;
        $this->cidade = $row->cidade;
        $this->estado = $row->estado;
        $this->datanascimento = $row->datanascimento;
        $this->cpf = $row->cpf;
        $this->dataadmissao = $row->dataadmissao;
        $this->senha = $row->senha;
        $this->usuario = $row->usuario;
        

    }


    public function listarALL() {
        //seleciono toda a minha tabela funcionário
        $rs = $this->conexao01->query("SELECT * FROM funcionario");
        $funcionarios = null;
        $i = 0;
        //enquanto ele estiver recebendo informação da consulta
        while($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $funcionario = new Funcionario();

            $funcionario->idfuncionario = $row->idfuncionario;
            $funcionario->nome = $row->nome;
            $funcionario->telefone = $row->telefone;
            $funcionario->celular = $row->celular;
            $funcionario->logradouro = $row->logradouro;
            $funcionario->numero = $row->numero;
            $funcionario->bairro = $row->bairro;
            $funcionario->cidade = $row->cidade;
            $funcionario->estado = $row->estado;
            $funcionario->datanascimento = $row->datanascimento;
            $funcionario->cpf = $row->cpf;
            $funcionario->dataadmissao = $row->dataadmissao;
            $funcionario->senha = $row->senha;
            $funcionario->usuario = $row->usuario;
            
            $funcionario->conexao01 = null;

            $funcionarios[$i] = $funcionario;
            $i++;
        }
        return $funcionarios;
    }


    public function update() {
        $stmt = conexao02->prepare("UPDATE funcionario SET nome = ?, telefone = ?, celular = ?, logradouro = ?, numero = ?, bairro = ?
        cidade = ?, estado = ?, datanascimento = ?, cpf = ?, dataadmissao = ?, senha = ?, usuario = ? where id = ?");
        
         $stmt->bindParam(1, $this->nome);
         $stmt->bindParam(2, $this->telefone);
         $stmt->bindParam(3, $this->celular);
         $stmt->bindParam(4, $this->logradouro);
         $stmt->bindParam(5, $this->numero);
         $stmt->bindParam(6, $this->bairro);
         $stmt->bindParam(7, $this->cidade);
         $stmt->bindParam(8, $this->estado);
         $stmt->bindParam(9, $this->datanascimento);
         $stmt->bindParam(10, $this->cpf);
         $stmt->bindParam(11, $this->dataadmissao);
         $stmt->bindParam(12, $this->senha);
         $stmt->bindParam(13, $this->usuario);
         
         return $stmt->execute();

    }


    
}
?>
