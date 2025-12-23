<?php
require_once __DIR__ . '/config.php';

exigirLogin();

require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3><i class="bi bi-journal-check fs-4"></i> Resumo</h3>
    <div class="row">
        <div class="col-6 col-md-4 text-center">
            <h3><span class="badge text-bg-primary">0</span></h3>
            <p><b>Produtos cadastrados</b></p>
        </div>

        <div class="col-6 col-md-4 text-center">
            <h3><span class="badge text-bg-primary">0</span></h3>
            <p><b>Fornecedores</b></p>
        </div>

        <div class="col-6 col-md-4 text-center">
            <h3><span class="badge text-bg-primary">0</span></h3>
            <p><b>Lojas ativas</b></p>
        </div>

        <div class="col-6 col-md-4 text-center">
            <h3><span class="badge text-bg-danger">0</span></h3>
            <p><b>Lojas sem estoque</b></p>
        </div>

        <div class="col-6 col-md-4 text-center">
            <h3><span class="badge text-bg-warning">0</span></h3>
            <p><b>Estoque < 5</b></p>
        </div>

        <div class="col-6 col-md-4 text-center">
            <h3><span class="badge text-bg-danger">0</span></h3>
            <p><b>Produtos vencidos ou vencendo em até 30 dias</b></p>
        </div>
    </div>
</section>

<section class="text-center border rounded-3 p-4 border-primary-subtle">

    <h3><i class="bi bi-file-earmark-text fs-4"></i> Relatórios</h3>

    
    <a href="<?= BASE_URL ?>/relatorios/produtos-por-loja.php" class="btn my-1 btn-lg btn-outline-primary"><i class="bi bi-box-seam"></i> Produtos por Loja</a>
    <a href="<?= BASE_URL ?>/relatorios/produtos-por-fornecedor.php" class="btn my-1 btn-lg btn-outline-primary"><i class="bi bi-people"></i> Produtos por Fornecedor</a>
    <a href="<?= BASE_URL ?>/relatorios/estoque-por-produto.php" class="btn my-1 btn-lg btn-outline-primary"><i class="bi bi-clipboard-data"></i> Estoque por Produto</a>
    <a href="<?= BASE_URL ?>/relatorios/estoque-baixo.php" class="btn my-1 btn-lg btn-outline-primary"><i class="bi bi-exclamation-triangle"></i> Estoque Baixo</a>
    
        
</section>


<?php require_once BASE_PATH . '/includes/rodape.php'; ?>
