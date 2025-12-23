<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/utils.php';
require_once BASE_PATH . '/src/usuario_crud.php';

$id = sanitizar($_GET["id"] ?? null, "inteiro");
$erro = null;

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = sanitizar($_POST["nome"]);
    $email = sanitizar($_POST["email"], 'email');
    $senha = $_POST["senha"];

    if(empty($nome) || empty($email)){
        $erro = "Nome e e-mail são obrigatórios!";
    } else {
        try {
            $senhaVerificada = empty($senha) ?
            $usuario['senha'] :
            verificarSenha($senha, $usuario['senha']);

            atualizarUsuario($conexao, $id, $nome, $email, $senhaVerificada);
            header("location:listar.php");
            exit;

        } catch(Throwable $e) {
            if($e->getCode() == "23000"){
                $erro = "Este e-mail já existe no registro!";
            } else {
                $erro = "Erro ao atualizar: ".$e->getMessage();
            }
        }
    }
}

$titulo = "Editar Usuário |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-pencil-fill"></i> Editar Usuário</h3>

    <?php if($erro): ?>
        <p class="alert alert-danger text-center"><?=$erro?></p>
    <?php endif ?>

    <form method="post" class="w-75 mx-auto">
        <input type="hidden" name="id" value="<?=$usuario["id"];?>">
        <div class="form-group">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?=$_POST["nome"]??$usuario["nome"]??" ";?>">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?=$_POST["email"]??$usuario["email"]??" ";?>">
        </div>
        <div class="form-group">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="Preencha apenas se for alterar">
        </div>
        <button class="btn btn-warning my-4" type="submit"><i class="bi bi-arrow-clockwise"></i> Salvar Alterações</button>
    </form>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>