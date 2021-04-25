<?php
include_once('veiculo.php');

$veiculo = new Veiculo();

$veiculo->modelo = 'UNO';
$veiculo->placa = 'FJD-454W';
$veiculo->ano = '2010';
$veiculo->quilometragem = '80.000km';
$veiculo->motor = '1.0';
$veiculo->marca = 'Fiat';

$veiculo->insert_veiculo();
    
?>