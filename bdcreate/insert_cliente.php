<?php

include_once('cliente.php');

$cliente = new Cliente();

$cliente->nome = 'Leticia Araujo dos Santos';
$cliente->telefone = '1113845558';
$cliente->celular = '96169888';
$cliente->logradouro = 'rua japones';
$cliente->numero = '389';
$cliente->bairro = 'zona sul';
$cliente->cidade = 'São Paulo';
$cliente->estado = 'São Paulo';
$cliente->datanascimento = '23-03-1992';
$cliente->cpfcnpj = '19989317565';
$cliente->numcnh = '38759247632';
$cliente->validadecnh = '22-03-2022';
$cliente->email = 'letlindinha@hotmail.com';

$cliente->insert_cliente();

?>