<?php

function buscarProdutos(PDO $conexao):array
{
    $sql = "SELECT * FROM produtos ORDER BY nome";
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}