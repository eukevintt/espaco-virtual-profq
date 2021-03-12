<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['nivel'] = "";
}


function gerarHash($senha)
{
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash)
{
    $verificador = password_verify($senha, $hash);
    return $verificador;
}
