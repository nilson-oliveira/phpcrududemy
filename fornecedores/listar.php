<?php
require_once __DIR__ . '/../config.php';


$titulo = "Fornecedores |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3><i class="bi bi-people-fill"></i> Lista de Fornecedores</h3>


    <p class="text-center my-4">
        <a href="inserir.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Adicionar Novo Fornecedor</a>
    </p>

    <div class="table-responsive">
        <table class="table table-hover align-middle caption-top">
            <caption>Quantidade de registros: 0</caption>
            <thead class="align-middle table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>ID do fornecedor...</td>
                        <td>Nome do fornecedor...</td>
                        <td class="text-end">
                            <a class="btn btn-warning btn-sm" href="editar.php"><i class="bi bi-pencil-square"></i> Editar</a>
                        </td>
                        <td class="text-start">
                            <a class="btn btn-danger btn-sm" href="excluir.php"><i class="bi bi-trash"></i> Excluir</a>
                        </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>