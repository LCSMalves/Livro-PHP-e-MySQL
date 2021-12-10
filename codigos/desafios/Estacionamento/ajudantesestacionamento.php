<?php

function traduz_data_para_banco($data)
{
    if ($data == "") {
        return "0000-00-00 00:00:00";
    } else {
        return $data;
    }
}

function traduz_data_para_exibir($data)
{
    if ($data == "" or $data == "0000-00-00 00:00:00") {
        return "";
    }

    $objeto_data = DateTime::createFromFormat('Y-m-d H:i:s', $data);

    $tranformado = "{$objeto_data->format('H:i')}h - {$objeto_data->format('d/m/Y')}";
    
    return $tranformado;
   
}