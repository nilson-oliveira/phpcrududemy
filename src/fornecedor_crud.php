<?php

function buscarFornecedores(PDO $conexao): array
{
    $sql = "SELECT * FROM fornecedores ORDER BY nome";
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function inserirFornecedor(PDO $conexao, $nome): void
{
    $sql = "INSERT INTO fornecedores (nome) VALUES (:nome)";
    $consulta = $conexao->prepare($sql);
    $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
    $consulta->execute();
}