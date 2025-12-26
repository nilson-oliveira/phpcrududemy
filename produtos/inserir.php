<?php
require_once __DIR__ . '/../config.php';

exigirLogin();

$titulo = "Adicionar Produto |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>


<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-plus-circle-fill"></i> Adicionar Produto</h3>



    <form method="post" class="w-75 mx-auto">
        <fieldset>
            <legend>Produto</legend>
            <div class="form-group mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="descricao">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="preco">Preço:</label>
                <input class="form-control" type="number" step="0.01" name="preco" id="preco">
            </div>


            <div class="form-group mb-3">
                <label class="form-label" for="quantidade">Quantidade:</label>
                <input class="form-control" type="number" name="quantidade" id="quantidade">
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="fornecedor_id">Fornecedor:</label>
                <select class="form-select" name="fornecedor_id" id="fornecedor_id">
                    <option value=""></option>
                    <option value="id do fornecedor">Nome do fornecedor</option>                   
                </select>
            </div>
        </fieldset>

        <fieldset class="mt-4">
            <legend>Detalhes do Produto</legend>
            <div class="form-group mb-3">
                <label class="form-label" for="peso">Peso (kg):</label>
                <input class="form-control" type="number" step="0.01" name="peso" id="peso">
            </div>

            <div class="form-group mb-3">
                <label for="dimensoes">Dimensões:</label>
                <input class="form-control" type="text" name="dimensoes" id="dimensoes">
            </div>

            <div class="form-group mb-3">
                <label for="codigo_barras">Código de Barras:</label>
                <input class="form-control" type="text" name="codigo_barras" id="codigo_barras">
            </div>

            <div class="form-group mb-3">
                <label for="codigo_barras">Data de Validade:</label>
                <input class="form-control" type="date" name="data_validade" id="data_validade">
            </div>
        </fieldset>


        <button class="btn btn-success my-4" type="submit"><i class="bi bi-check-circle"></i> Salvar</button>
    </form>


</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>
