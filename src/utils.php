<?php

function dump(mixed $dados): void
{
    echo '<pre>';
    var_dump($dados);
    echo '</pre>';
}

function sanitizar(mixed $entrada, string $tipo = 'texto'): mixed
{
       switch($tipo){
           case 'inteiro':
               return (int) filter_var($entrada, FILTER_SANITIZE_NUMBER_INT);
           case 'email':
               return filter_var($entrada, FILTER_SANITIZE_EMAIL);
           case 'texto':
           default:
               return filter_var($entrada, FILTER_SANITIZE_SPECIAL_CHARS);
       }
}

function codificarSenha(string $senha): string
{
    // Retorna o hash da senha
    return password_hash($senha, PASSWORD_DEFAULT);
}

function verificarSenha(string $senha, string $senhaBanco): string
{
    if(password_verify($senha, $senhaBanco)){
        return $senhaBanco;
    } else {
        return codificarSenha($senha);
    }
}