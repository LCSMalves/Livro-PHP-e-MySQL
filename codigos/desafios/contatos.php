<?php 

session_start(); 

            
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
        $contato['nascimento'] = $_GET['nascimento'];
    } else {
        $contato['nascimento'] = '';
    }

    if (array_key_exists('descricao', $_GET)){
        $contato['descricao'] = $_GET['descricao'];
    } else {
        $contato['descricao'] = '';
    }

    if (array_key_exists('favorito', $_GET)){
        $contato['favorito'] = $_GET['favorito'];
    } else {
        $contato['favorito'] = '';
    }

    $_SESSION['lista_contatos'][] = $contato;
}
            
$lista_contatos = [];

if (array_key_exists('lista_contatos', $_SESSION)) {
    $lista_contatos = $_SESSION['lista_contatos'];
} else {
    $lista_contatos = [];
}

include "templatecontatos.php";