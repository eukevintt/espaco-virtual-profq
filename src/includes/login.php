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

function logout()
{
    $_SESSION['nick'] = "";
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['nivel'] = "";
}

function is_logado()
{
    if (empty($_SESSION['user'])) {
        return false;
    } else {
        return true;
    }
}

function is_admin()
{
    $nivel = $_SESSION['nivel'] ?? null;
    if (is_null($nivel)) {
        return false;
    } else {
        if ($nivel == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}

function is_usuario()
{
    $nivel = $_SESSION['nivel'] ?? null;
    if (is_null($nivel)) {
        return false;
    } else {
        if ($nivel == 'usu') {
            return true;
        } else {
            return false;
        }
    }
}
