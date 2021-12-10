<?php 

session_start(); 

require "bancocontatos.php";
require "ajudantescontatos.php";
            
if (array_key_exists('contato', $_GET) && $_GET['contato'] !='') {
    
    $contato = [];

    $contato['contato'] = $_GET['contato'];

    if (array_key_exists('telefone', $_GET)){
        $contato['telefone'] = $_GET['telefone'];
    } else {
        $contato['telefone'] = '';
    }

    if (array_key_exists('email', $_GET)){
        $contato['email'] = $_GET['email'];
    } else {
        $contato['email'] = '';
    }

    if (array_key_exists('nascimento', $_GET)){
        $contato['nascimento'] = traduz_data_para_banco($_GET['nascimento']);
    } else {
        $contato['nascimento'] = '';
    }

    if (array_key_exists('descricao', $_GET)){
        $contato['descricao'] = $_GET['descricao'];
    } else {
        $contato['descricao'] = '';
    }

    if (array_key_exists('favorito', $_GET)){
        $contato['favorito'] = 1;
    } else {
        $contato['favorito'] = 0;
    }

    gravar_contato($conexao, $contato);
}
            
$lista_contatos = [];

$lista_contatos = buscar_contato($conexao);

include "templatecontatos.php";