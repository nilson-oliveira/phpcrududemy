<?php
require_once __DIR__ . '/config.php';
require_once BASE_PATH . '/src/utils.php';
require_once BASE_PATH . '/src/usuario_crud.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = sanitizar($_POST['email'] ?? '', 'email');
    $senha = $_POST['senha'] ?? '';

    if(empty($email) || empty($senha)){
        header('location:login.php?campos_obrigatorios');
        exit;
    }

    $usuario = buscarPorEmail($conexao, $email);

    if($usuario && password_verify($senha, $usuario['senha'])){
        login($usuario['id'], $usuario['nome']);
        header("location:index.php");
        exit;
    } else {
        header("location:index.php?login_invalido");
        exit;
    }

}

$mensagens = [
        'acesso_proibido' => ['Acesso proibido! Você precisa estar logado.', 'danger'],
        'campos_obrigatorios' => ['E-mail e Senha são obrigatórios!', 'warning'],
        'login_invalido' => ['E-mail e ou Senha invalidos!', 'danger'],
];

$titulo = "Login |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h1 class="mb-2">Fly By Night</h1>
    <h2 class="fs-6 lead">Gerenciamento de Estoque</h2>

    <hr>
    <h3>Login</h3>

    <?php
        foreach($mensagens as $elemento => [$mensagem, $tipo]):
        if(isset($_GET[$elemento])):
    ?>
    <div class="alert alert-<?=$tipo?> text-center">
        <?=$mensagem?>
    </div>
    <?php
    endif;
    endforeach;
    ?>

    <p class="lead">Entre com seu e-mail e senha para acessar o sistema.</p>

    <form action="" method="POST" class="w-50 mx-auto text-start mt-3">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>