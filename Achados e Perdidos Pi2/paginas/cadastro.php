<?php
session_start();

require_once "../dados/dados.php";

if (!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = isset($usuarios) ? $usuarios : [];
}

$mensagem = "";
$tipoMensagem = "";

// Mostra a mensagem depois do cadastro
if (isset($_SESSION["mensagem_cadastro"])) {
    $mensagem = $_SESSION["mensagem_cadastro"];
    $tipoMensagem = "sucesso";

    unset($_SESSION["mensagem_cadastro"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = trim($_POST["id"] ?? "");
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $confirmar_senha = $_POST["confirmar_senha"] ?? "";

    // Confere se as senhas são iguais
    if ($senha != $confirmar_senha) {
        $mensagem = "As senhas não são iguais.";
        $tipoMensagem = "erro";
    } else {
        // Verifica se o ID ou o e-mail já estão cadastrados
        $cadastroExiste = false;

        foreach ($_SESSION["usuarios"] as $usuario) {
            if ($usuario["id"] == $id || $usuario["email"] == $email) {
                $cadastroExiste = true;
                break;
            }
        }

        if ($cadastroExiste) {
            $mensagem = "Esse ID ou e-mail já está cadastrado.";
            $tipoMensagem = "erro";
        } else {
            $novoUsuario = [
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "senha" => $senha,
                "tipo" => "usuario"
            ];

            $_SESSION["usuarios"][] = $novoUsuario;

            // Guarda a mensagem para mostrar após recarregar a página
            $_SESSION["mensagem_cadastro"] = "Cadastro realizado com sucesso!";

            // Volta para a página sem reenviar o formulário
            header("Location: cadastro.php");
            exit;
        }
    }
}


require_once "../includes/cabecalho.php";
?>

<link rel="stylesheet" href="../css/cadastro.css">

<section class="pagina-cadastro">

    <h1 class="titulo-cadastro">Cadastro</h1>

    <div class="caixa-cadastro">

        <p class="texto1">Criar conta</p>

        <form action="" method="POST">

            <label class="texto2" for="nome">Nome</label>
            <input class="senha1"
                   id="nome"
                   type="text"
                   name="nome"
                   placeholder="Seu nome"
                   required>

            <label class="texto3" for="email">Email</label>
            <input class="senha2"
                   id="email"
                   type="email"
                   name="email"
                   placeholder="E-mail"
                   required>

            <label class="texto4" for="id">ID da faculdade</label>
<input class="senha3"
       id="id"
       type="text"
       name="id"
       placeholder="Digite seu ID da faculdade"
       required>

            <label class="texto5" for="senha">Senha</label>
            <input class="senha4"
                   id="senha"
                   type="password"
                   name="senha"
                   placeholder="Digite sua senha"
                   required>

            <label class="texto6" for="confirmar_senha">Confirmar Senha</label>
            <input class="senha5"
                   id="confirmar_senha"
                   type="password"
                   name="confirmar_senha"
                   placeholder="Confirme sua senha"
                   required>

            <button class="botao" type="submit">Criar</button>

            <?php if ($mensagem != "") { ?>
                <p class="mensagem <?php echo $tipoMensagem; ?>">
                    <?php echo htmlspecialchars($mensagem); ?>
                </p>
            <?php } ?>

        </form>
    </div>

</section>

<?php
require_once "../includes/rodape.php";
?>
