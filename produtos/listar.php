<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/produto_crud.php';
require_once BASE_PATH . '/src/utils.php';


exigirLogin();

$erro = null;
$produtos = [];

try{
    $produtos = buscarProdutos($conexao);
}catch (Throwable $e){
    $erro = "Erro ao buscar produtos ". $e->getMessage();
}

dump($produtos);

$titulo = "Produtos |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3><i class="bi bi-box-fill"></i> Lista de Produtos</h3>

    <?php if($erro): ?>
        <p class="alert alert-danger text-center"><?=$erro?></p>
    <?php endif; ?>

    <p class="text-center my-4">
        <a href="inserir.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Adicionar Novo Produto</a>
    </p>

    <form method="get" class="mx-auto my-4">
        <div class="row g-2 justify-content-center">
            <div class="col-auto">
                <input class="form-control" type="search" name="search" placeholder="Buscar produto..." value="texto...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </div>
    </form>

    

    <div class="table-responsive">
        <table class="table table-hover align-middle caption-top">
            <caption>Quantidade de registros: <?= count($produtos) ?></caption>
            <thead class="align-middle table-light">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Fornecedor</th>
                    <th>Preço</th>
                    <th>Data de Validade</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto) : ?>
                    <tr>
                        <td><?= $produto['nome'] ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td><?= $produto['nome_fornecedor'] ?></td>
                        <td><?= $produto['preco'] ?></td>
                        <td><?= $produto['data_validade'] ?></td>
                        <td class="text-end">
                            <a class="btn btn-warning btn-sm" href="editar.php"><i class="bi bi-pencil-square"></i> Editar</a>
                        </td>
                        <td class="text-start">
                            <a class="btn btn-danger btn-sm" href="excluir.php"><i class="bi bi-trash"></i> Excluir</a>
                        </td>
                    </tr>
                <? endforeach; ?>
                
            </tbody>
        </table>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>