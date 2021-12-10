<?php

session_start();

require "ajudantesestacionamento.php";
require "bancoestacionamento.php";

if (array_key_exists('placa', $_GET) && $_GET['placa'] != '') {
    
    $estaciomaneto = [];

    $estaciomaneto['placa'] = $_GET['placa'];

    if (array_key_exists('marca', $_GET)) {
        $estaciomaneto['marca'] = $_GET['marca'];
    } else {
        $estaciomaneto['marca'] = '';
    }

    if (array_key_exists('modelo', $_GET)) {
        $estaciomaneto['modelo'] = $_GET['modelo'];
    } else {
        $estaciomaneto['modelo'] = '';
    }

    if (array_key_exists('hora_entrada', $_GET)) {
        $estaciomaneto['hora_entrada'] = traduz_data_para_banco($_GET['hora_entrada']);
    } else {
        $estaciomaneto['hora_entrada'] = '';
    }

    if (array_key_exists('hora_saida', $_GET)) {
        $estaciomaneto['hora_saida'] = traduz_data_para_banco($_GET['hora_saida']);
    } else {
        $estaciomaneto['hora_saida'] = '';
    }

    gravar_estacionamento($conexao, $estaciomaneto);

}


$lista_estacionamento = [];

$lista_estacionamento = buscar_estacionamento($conexao);



include "templateestacionamento.php";