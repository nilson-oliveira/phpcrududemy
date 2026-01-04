<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/fornecedor_crud.php';
require_once BASE_PATH . '/src/utils.php';

exigirLogin();

$id = sanitizar($_GET["id"] ?? null, "inteiro");
$erro = null;

if(!$id){
    header('Location: listar.php');
    exit;
}

try {
    $fornecedor = buscarFornecedorPorId($conexao, $id);
    if(!$fornecedor) $erro = "Fornecedor não encontrado!";
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
    <?php else: ?>
        <div class="alert alert-danger w-50 text-center mx-auto">
            <p>Deseja realmente excluir o fornecedor <b><?=$fornecedor['nome']?? '';?></b>?</p>
            <a href="listar.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Não</a>
            <a href="?id=<?=$id?>&confirmar-exclusao" class="btn btn-danger"><i class="bi bi-check-circle"></i> Sim</a>
        </div>
    <?php endif ?>

</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>