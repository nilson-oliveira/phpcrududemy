<?php
require_once __DIR__ . '/../config.php';

exigirLogin();

require_once BASE_PATH . '/src/utils.php';
require_once BASE_PATH . '/src/usuario_crud.php';

$id = sanitizar($_GET["id"] ?? null, "inteiro");
$erro = null;

if($id === $_SESSION["id"]){
    $erro = "<b>" . $_SESSION['nome'] . "</b>, não é possível se auto excluir!!!";
}

if(!$id){
    header("location:listar.php");
    exit;
}

try {
    $usuario = buscarUsuarioPorId($conexao, $id);
    if(!$usuario) $erro = "Usuário não encontrado!";
} catch(Throwable $e) {
    $erro = "Erro ao buscar usuário: ".$e->getMessage();
}

if(isset($_GET['confirmar-exclusao']) && !$erro){
    try{
        excluirUsuario($conexao, $id);
        header('location:listar.php');
        exit;
    } catch(Throwable $e){
        $erro = "Erro ao excluir funcionário: ".$e->getMessage();
    }
}

$titulo = "Excluir Usuário |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-trash3-fill"></i> Excluir Usuário</h3>

    <?php if($erro): ?>
        <p class="alert alert-danger text-center"><?=$erro?></p>
    <?php else: ?>
    <div class="alert alert-danger w-50 text-center mx-auto">
        <p>Deseja realmente excluir o usuário <b><?=$usuario['nome']?? '';?></b>?</p>
        <a href="listar.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Não</a>
        <a href="?id=<?= $id ?>&confirmar-exclusao" class="btn btn-danger"><i class="bi bi-check-circle"></i> Sim</a>
    </div>
    <?php endif ?>

</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>