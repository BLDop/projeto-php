<?php
session_start();

require_once "../dados/dados.php";


// cria a lista na sessao usando os itens iniciais
if (!isset($_SESSION["itens"])) {
    $_SESSION["itens"] = isset($itens) ? $itens : [];
}

$mensagem = "";
$tipoMensagem = "";

// Mmstra a mensagem depois de cadastrar
if (isset($_SESSION["mensagem_item"])) {
    $mensagem = $_SESSION["mensagem_item"];
    $tipoMensagem = "sucesso";

    unset($_SESSION["mensagem_item"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $objeto = trim($_POST["objeto"] ?? "");
    $local = trim($_POST["local"] ?? "");
    $data = trim($_POST["data"] ?? "");
    $descricao = trim($_POST["descricao"] ?? "");
    $categoria = trim($_POST["categoria"] ?? "");

    // ve se todos os campos foram preenchidos
    if (
        $objeto == "" ||
        $local == "" ||
        $data == "" ||
        $descricao == "" ||
        $categoria == ""
    ) {
        $mensagem = "Preencha todos os campos.";
        $tipoMensagem = "erro";
    } else {
        // monta o array com os dados do item
        $novoItem = [
            "id" => count($_SESSION["itens"]) + 1,
            "objeto" => $objeto,
            "local" => $local,
            "descricao" => $descricao,
            "data" => $data,
            "categoria" => $categoria
        ];

        // adiciona o item à lista
        $_SESSION["itens"][] = $novoItem;

        $_SESSION["mensagem_item"] =
            "Item cadastrado com sucesso!";

        // evita cadastrar novamente ao atualizar a página
        header("Location: cadastro-item.php");
exit;
    
    }
}

require_once "../includes/cabecalho.php";
?>

<link rel="stylesheet" href="../css/cadastro-item.css">

<section class="pagina-cadastro-item">

    <h1 class="titulo-cadastro-item">Cadastro de Itens</h1>

    <div class="caixa-cadastro-item">

        <h2>Cadastrar item</h2>

        <form action="" method="POST">

            <label for="objeto">Objeto</label>
            <input
                type="text"
                id="objeto"
                name="objeto"
                placeholder="Digite o nome do objeto"
                required
            >

            <label for="local">Local onde perdeu ou encontrou</label>
            <input
                type="text"
                id="local"
                name="local"
                placeholder="Digite o local"
                required
            >

            <label for="data">Dia</label>
            <input
        type="text"
        id="data"
        name="data"
        placeholder="DD/MM/AAAA"
        pattern="\d{2}/\d{2}/\d{4}"
        maxlength="10"
        required
           >
 

            <label for="descricao">Descrição</label>
            <textarea
                id="descricao"
                name="descricao"
                placeholder="Descreva o item"
                required
            ></textarea>

            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria" required>
                <option value="">Selecione uma categoria</option>
                <option value="Aparelho Tecnológico">
                    Aparelho Tecnológico
                </option>
                <option value="Vestimenta">Vestimenta</option>
                <option value="Acessório">Acessório</option>
                <option value="Material escolar">
                    Material escolar
                </option>
                <option value="Outros">Outros</option>
            </select>

            <button type="submit">Cadastrar</button>

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
