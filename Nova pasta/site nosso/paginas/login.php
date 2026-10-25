
<?php
session_start();

require_once '../dados/dados.php';

// Se ainda não existir uma lista na sessão, copia os usuários iniciais
if (!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = $usuarios;
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["User"];
    $senha = $_POST["password"];

    $loginCorreto = false;

    // Procura os usuários cadastrados na sessão
    foreach ($_SESSION["usuarios"] as $usuario) {
    if ($usuario["email"] == $email && $usuario["senha"] == $senha) {
        $loginCorreto = true;

        $_SESSION["usuario_logado"] = $usuario;

        break;
    }
}

    // Mostra a mensagem do login
    if ($loginCorreto) {
        $mensagem = "Login realizado com sucesso!";
    } else {
        $mensagem = "E-mail ou senha incorretos.";
    }
}

require_once '../includes/cabecalho.php';
?>

<link rel="stylesheet" href="../css/login.css">

<h1>Achados e Perdidos</h1>

<div class="Login">
    <form action="" method="post">
        <h2>User</h2>
        <input type="email" name="User" required>

        <h2>Senha</h2>
        <input type="password" name="password" required>

        <input type="submit" name="enter" value="Entrar">

        <?php
        if ($mensagem != "") {
            echo htmlspecialchars($mensagem);
        }
        ?>
    </form>
</div>

<?php
require_once '../includes/rodape.php';
?>
