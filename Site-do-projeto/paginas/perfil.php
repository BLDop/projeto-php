
<?php
session_start();

if (!isset($_SESSION["usuario_logado"])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION["usuario_logado"];

require_once '../includes/cabecalho.php';
?>

<link rel="stylesheet" href="../css/perfil.css">

<section class="pagina-perfil">

    <h1>Meu Perfil</h1>

    <div class="caixa-perfil">

        <h2>Dados da conta</h2>

        <p>Nome</p>
        <div class="informacao">
            <?php echo htmlspecialchars($usuario["nome"] ?? "Não informado"); ?>
        </div>

        <p>E-mail</p>
        <div class="informacao">
            <?php echo htmlspecialchars($usuario["email"] ?? "Não informado"); ?>
        </div>

        <p>ID</p>
        <div class="informacao">
            <?php echo htmlspecialchars((string) ($usuario["id"] ?? "Não informado")); ?>
        </div>

        <p>Tipo de usuário</p>
        <div class="informacao">
            <?php echo htmlspecialchars($usuario["tipo"] ?? "Não informado"); ?>
        </div>

    </div>

</section>

<?php
require_once '../includes/rodape.php';
?>
