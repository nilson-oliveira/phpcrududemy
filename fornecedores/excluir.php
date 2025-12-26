<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/fornecedor_crud.php';
require_once BASE_PATH . '/src/utils.php';

exigirLogin();

$id = sanitizar($_GET["id"] ?? null, "inteiro");
$erro = null;

try {
    $fornecedor = buscarFornecedorPorId($conexao, $id);
} catch (Throwable $e){
    $erro = "Erro ao listar fornecedor: " . $e->getMessage();
}

if (isset($_GET['confirmar-exclusao'])) {
    try{
        excluirFornecedor($conexao, $id);
        header("location:listar.php");
        exit;
    } catch (Throwable $e){
        $erro = "Erro ao excluir fornecedor: " . $e->getMessage();
    }
}

$titulo = "Excluir Fornecedor |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-trash3-fill"></i> Excluir Fornecedor</h3>

    <?php if($erro): ?>
        <p class="alert alert-danger text-center"><?=$erro?></p>
    <?php endif ?>

    <div class="alert alert-danger w-50 text-center mx-auto">
        <p>Deseja realmente excluir o fornecedor <b><?=$fornecedor['nome']?? '';?></b>?</p>
        <a href="listar.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Não</a>
        <a href="excluir.php?id=<?=$id?>&confirmar-exclusao" class="btn btn-danger"><i class="bi bi-check-circle"></i> Sim</a>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>