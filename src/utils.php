<?php

function codificarSenha(string $senha): string
{
    // Retorna o hash da senha
    return password_hash($senha, PASSWORD_DEFAULT);
}