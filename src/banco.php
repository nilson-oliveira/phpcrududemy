<?php

// Parâmetros de acesso ao BD
$servidor = "db";
$usuario = "root";
$senha = "root";
$banco = "flybynight_estoque";

// Script de conexão
try {
    // Configuração do DSN (Data Source Name)
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);

    // Habilitando o lançamento de erros e exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    echo "Conexão feita com sucesso!";
} catch (Throwable $erro) {
    die("Falha na conexão: ".$erro->getMessage());
}