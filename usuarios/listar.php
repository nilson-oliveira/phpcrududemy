<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/usuario_crud.php';

$erro = null;
$usuarios = [];

try {
    $usuarios = buscarUsuarios($conexao);
} catch (Throwable $e) {
    $erro = "Erro ao buscar usuários. Detalhes: <br>" . $e->getMessage();
}


$titulo = "Usuários |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3><i class="bi bi-person-gear"></i> Gerenciar Usuários</h3>

    <?php if($erro): ?>
    <p class="alert alert-danger text-center"><?=$erro?></p>
    <?php endif ?>

    <p class="text-center my-4">
        <a href="inserir.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Adicionar Novo Usuário</a>
    </p>

    <div class="table-responsive">
        <table class="table table-hover align-middle caption-top">
            <caption>Quantidade de registros: <?=count($usuarios)?></caption>
            <thead class="align-middle table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($usuarios as $usuario) : ?>
                    <tr>
                        <td><?=$usuario["id"];?> </td>
                        <td><?=$usuario["nome"];?> </td>
                        <td><?=$usuario["email"];?> </td>
                        <td class="text-end">
                            <a class="btn btn-warning btn-sm" href="editar.php?id=<?=$usuario["id"];?>"><i class="bi bi-pencil-square"></i> Editar</a>
                        </td>
                        <td class="text-start">
                            <a class="btn btn-danger btn-sm" href="excluir.php?id=<?=$usuario["id"];?>"><i class="bi bi-trash"></i> Excluir</a>
                        </td>
                    </tr>
            <?php endforeach?>

            </tbody>
        </table>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>