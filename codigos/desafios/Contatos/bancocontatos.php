<?php

$bdSevidor = '127.0.0.1';
$bdUsuario = 'sistemacontatos';
$bdSenha = 'contatos';
$bdBanco = 'contatos';

$conexao = mysqli_connect($bdSevidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno()) {
    echo "Problemas para conectar no Banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_contato($conexao)
{
    $sqlBusca = 'SELECT * FROM contatos';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $contatos = [];

    while ($contato = mysqli_fetch_assoc($resultado)){
        $contatos[] = $contato;
    }

    return $contatos;
}

function gravar_contato($conexao, $contato)
{
    $sqlGravar = "INSERT INTO contatos
    (contato, telefone, email, nascimento, descricao, favorito)
    VALUES
    (
        '{$contato['contato']}',
        '{$contato['telefone']}',
        '{$contato['email']}',
        '{$contato['nascimento']}',
        '{$contato['descricao']}',
        {$contato['favorito']}
    )";

    mysqli_query($conexao, $sqlGravar);
}