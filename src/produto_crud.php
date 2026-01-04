<?php

//function buscarProdutos(PDO $conexao):array
//{
//    $sql = "SELECT * FROM produtos
//         ORDER BY nome";
//    $consulta = $conexao->prepare($sql);
//    $consulta->execute();
//    return $consulta->fetchAll(PDO::FETCH_ASSOC);
//}


function buscarProdutos(PDO $conexao):array
{
    $sql = "SELECT p.*, f.nome AS nome_fornecedor, data_validade FROM 
        produtos p
        LEFT JOIN fornecedores f
        ON p.fornecedor_id = f.id
        LEFT JOIN detalhes_produto d
        ON p.id = d.produto_id;";
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}
