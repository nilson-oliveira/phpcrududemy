<?php

function iniciarSessao(): void
{
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
}

function exigirLogin(): void
{
    iniciarSessao();

    if(!isset($_SESSION['id'])){
        header("Location:".BASE_URL."/login.php?acesso_proibido");
        exit;
    }
}

function usuarioEstaLogado(): bool
{
    iniciarSessao();
    return isset($_SESSION['id']);
}

function login(int $id, string $nome): void
{
    iniciarSessao();
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
}