<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . "/src/usuario_crud.php";
require_once BASE_PATH . "/src/utils.php";

$erro = null;

// Se o formulário for acionado, capturar as informações
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    if(empty($nome) || empty($email) || empty($senha)){
        $erro = "Preencha todos os campos!";
    } else {
        // Codificar a senha
        $senhaCodificada = codificarSenha($senha);

        // Enviar os dados para o banco
        inserirUsuario($conexao, $nome, $email, $senhaCodificada);

        // Redirecionar para a lista de usuários
        header("location:listar.php");
        exit;
    }
}

$titulo = "Adicionar Usuario |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-plus-circle-fill"></i> Adicionar Usuário</h3>

    <?php if($erro): ?>
        <p class="alert alert-danger text-center"><?=$erro?></p>
    <?php endif ?>


    <form method="post" class="w-75 mx-auto">
        <div class="form-group">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha" class="form-control" id="senha">
        </div>
        <button class="btn btn-success my-4" type="submit"><i class="bi bi-check-circle"></i> Salvar</button>
    </form>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>