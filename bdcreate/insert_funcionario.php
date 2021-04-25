<?php
include_once('funcionario.php');

$funcionario = new Funcionario();
$funcionario->idfuncionario =   136694;
$funcionario->nome = 'Andressa Calixto da Silva';
$funcionario->telefone = '7736758877';
$funcionario->celular = '7799414892';
$funcionario->logradouro = 'rua Orlando de Carvalho';
$funcionario->numero = '410';
$funcionario->bairro = 'Morada da Lua';
$funcionario->cidade = 'Palmas';
$funcionario->estado = 'Tocantins';
$funcionario->datanascimento = '26-12-2000';
$funcionario->cpf = '49284984799';
$funcionario->dataadmissao = '10-01-2021';
$funcionario->senha = 'tqham91hab';

$funcionario->insert();




?>