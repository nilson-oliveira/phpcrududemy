<?php
require_once __DIR__ . '/../config.php';

exigirLogin();

$titulo = "Estoque por Produto |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3><i class="bi bi-clipboard-data"></i> Estoque por Produtos</h3>

    <form method="get" class="mx-auto my-4">
        <div class="row g-2 justify-content-center">
            <div class="col-auto ">
                <label class="col-form-label text-muted" for="produto_id">Selecione o Produto:</label>
            </div>
            <div class="col-auto">
                <select class="form-select" name="produto_id" id="produto_id">
                    <option value=""></option>
                    
                        <option value="id do produto">
                            Nome do produto...
                        </option>
                    
                </select>
            </div>
        </div>
    </form>

    
        <p class="fw-semibold">Estoque deste produto:</p>

        
            <div class="table-responsive">
                <table class="table table-hover align-middle caption-top">
                    <caption>Quantidade de registros: 0</caption>
                    <thead class="align-middle table-light">
                        <tr>
                            <th>Loja</th>
                            <th>Estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td>Nome da loja...</td>
                                <td>Quantidade do estoque...</td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
        
    
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>