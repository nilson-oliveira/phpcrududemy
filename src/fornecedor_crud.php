<?php

function buscarFornecedores(PDO $conexao): array
{
    $sql = "SELECT * FROM fornecedores ORDER BY nome";
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}