<?php
require_once __DIR__ . '/../config.php';

exigirLogin();

$titulo = "Excluir Estoque |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-trash3-fill"></i> Excluir produto do estoque da loja</h3>

    <div class="alert alert-danger w-50 text-center mx-auto">
        <p> Deseja realmente excluir este produto desta loja?</p>

        <a href="listar.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Não</a>
        <a href="" class="btn btn-danger"><i class="bi bi-check-circle"></i> Sim</a>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>