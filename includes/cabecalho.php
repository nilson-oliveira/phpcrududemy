<?php
require_once __DIR__ . '/../config.php';

?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <title><?= $titulo ?? '' ?> Fly By Night - Gerenciamento de Estoque</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= BASE_URL ?>/images/coruja.png" type="image/png" sizes="128x128">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap-icons.min.css">
</head>

<body>

<div class="bg-primary text-white py-2">
    <div class="container">
    <a href="<?=BASE_URL?>/usuarios/listar.php" class="btn btn-sm btn-outline-light">
        <i class="bi bi-people"> Gerenciar Usuários</i>
    </a>
    </div>
</div>

<header class="sticky-top border-bottom border-primary-subtle bg-body">
    <div class="container">
        <div class="row align-items-center py-2 justify-content-between">
            <div class="col-4">
                <h1 class="mb-2 fs-4"><a href="<?= BASE_URL ?>/index.php" class="text-decoration-none">Fly By Night</a></h1>
                <h2 class="fs-6 lead">Gerenciamento de Estoque</h2>
            </div>
            <div class="col-8">
                <nav>
                    <ul class="nav justify-content-end">
                        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/index.php"><i class="bi bi-house-fill"></i> Início</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/fornecedores/listar.php"><i class="bi bi-people-fill"></i> Fornecedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/produtos/listar.php"><i class="bi bi-box-fill"></i> Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/lojas/listar.php"><i class="bi bi-tags-fill"></i> Lojas</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/estoque/listar.php"><i class="bi bi-stack"></i> Estoques</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</header>


<main class="container my-4">
