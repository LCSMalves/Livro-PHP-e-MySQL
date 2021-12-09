<?php

$bdSevidor = '127.0.0.1';
$bdUsuario = 'sistemaestacionamento';
$bdSenha = 'sistema';
$bdBanco = 'estacionamento';

$conexao = mysqli_connect($bdSevidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno()) {
    echo "Problemas para conectar no Banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_estacionamento($conexao)
{
    $sqlBusca = 'SELECT * FROM veiculos';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $carros = [];

    while ($carro = mysqli_fetch_assoc($resultado)){
        $carros[] = $carro;
    }

    return $carros;
}


function gravar_estacionamento($conexao, $estacionamento)
{
    $sqlGravar = "INSERT INTO veiculos
    (placa, marca, modelo, hora_entrada, hora_saida)
    VALUES
    (
        '{$estacionamento['placa']}',
        '{$estacionamento['marca']}',
        '{$estacionamento['modelo']}',
        '{$estacionamento['hora_entrada']}',
        '{$estacionamento['hora_saida']}'
    )";

    mysqli_query($conexao, $sqlGravar);
}