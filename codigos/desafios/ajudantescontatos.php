<?php

function traduz_favorito($favorito)
{
    if ($favorito == 1) {
        return 'Sim';
    }

    return 'Não';
}

function traduz_data_para_banco($data)
{
    if ($data == "") {
        return "0000-00-00";
    }

    $objeto_data = DateTime::createFromFormat('d/m/Y', $data);

    return $objeto_data->format('Y-m-d');
}

function traduz_data_para_exibir($data)
{
    if ($data == "" or $data == "0000-00-00") {
        return "";
    }

    $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
    
    return $objeto_data->format('d/m/Y');
}
