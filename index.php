<?php

session_start();

if ($_GET['comando'] && $_GET['save']) {
    $comando = rawurlencode($_GET['comando']);
    $save = rawurlencode($_GET['save']);
    echo "Rota 1";
    $conteudo = file_get_contents("http://localhost:4567/{$comando}/{$save}");
} else if(isset($_GET['comando'])) {
    $comando = rawurlencode($_GET['comando']);
    echo $comando;
    $conteudo = file_get_contents("http://localhost:4567/{$comando}");
} else {
    echo "Rota 3";
    $conteudo = file_get_contents("http://localhost:4567");
}


$arrayAssociativo = json_decode($conteudo);

print_r($arrayAssociativo);
//$_SESSION['historico'] = isset($_SESSION['historico']) ? array_merge($_SESSION['historico'], $arrayAssociativo->messages) : [];

$messages = $arrayAssociativo->mensagem;

include "template.phtml";