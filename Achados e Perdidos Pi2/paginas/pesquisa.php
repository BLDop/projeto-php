<?php
session_start();

require_once __DIR__ . "/../dados/dados.php";

if (!isset($_SESSION["itens"])) {
    $_SESSION["itens"] = $itens;
}

$atalhos = array(
    array(
        "nome" => "Sala de Aula",
        "grupo" => "recentes",
        "imagem" => "celular.png"
    ),
    array(
        "nome" => "Academia",
        "grupo" => "recentes",
        "imagem" => "blusa.png"
    ),
    array(
        "nome" => "Biblioteca",
        "grupo" => "recentes",
        "imagem" => "oculos.png"
    ),
    array(
        "nome" => "Na rua da Unifio",
        "grupo" => "recentes",
        "imagem" => "cartao.png"
    ),
    array(
        "nome" => "Aparelho Tecnologico",
        "grupo" => "categorias",
        "imagem" => "aparelho.png"
    ),
    array(
        "nome" => "Roupas",
        "grupo" => "categorias",
        "imagem" => "roupas.png"
    ),
    array(
        "nome" => "Acessorios",
        "grupo" => "categorias",
        "imagem" => "acessorio.png"
    ),
    array(
        "nome" => "Outros",
        "grupo" => "categorias",
        "imagem" => "outros.png"
    )
);

$texto = trim($_GET["busca"] ?? "");
$pagina = $_GET["pagina"] ?? "";
$nomeItem = $_GET["nome"] ?? "";
$categoriaSelecionada = trim($_GET["categoria"] ?? "");

$categoriasDisponiveis = array(
    "Aparelho Tecnológico" => "aparelho.png",
    "Vestimenta" => "roupas.png",
    "Acessório" => "acessorio.png",
    "Material escolar" => "outros.png",
    "Outros" => "outros.png"
);

$objetosEncontrados = array();
$categorias = array();
$recentes = array();

foreach ($_SESSION["itens"] as $item) {
    $camposPesquisaveis = array(
        $item["objeto"] ?? "",
        $item["local"] ?? "",
        $item["descricao"] ?? "",
        $item["data"] ?? "",
        $item["categoria"] ?? ""
    );
    $correspondeBusca = $texto === "";

    foreach ($camposPesquisaveis as $campo) {
        if ($texto !== "" && stripos((string) $campo, $texto) !== false) {
            $correspondeBusca = true;
            break;
        }
    }

    if ($correspondeBusca) {
        $objetosEncontrados[] = $item;
    }
}

foreach ($categoriasDisponiveis as $nomeCategoria => $imagemCategoria) {
    $temObjetoCorrespondente = false;

    foreach ($objetosEncontrados as $item) {
        if (strcasecmp($item["categoria"] ?? "", $nomeCategoria) === 0) {
            $temObjetoCorrespondente = true;
            break;
        }
    }

    if (
        $texto === "" ||
        stripos($nomeCategoria, $texto) !== false ||
        $temObjetoCorrespondente
    ) {
        $categorias[] = array(
            "nome" => $nomeCategoria,
            "imagem" => $imagemCategoria
        );
    }
}

foreach ($atalhos as $atalho) {
    if (
        $atalho["grupo"] === "recentes" &&
        ($texto === "" || stripos($atalho["nome"], $texto) !== false)
    ) {
        $recentes[] = $atalho;
    }
}

$caminhoImagem = "../imagem/";
$linkPerfil = "perfil.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Achados e Perdidos</title>

    <link rel="stylesheet" href="../css/menu1.css">
    <link rel="stylesheet" href="../css/pesquisa2.css">
</head>

<body>

<?php
// Cabeçalho opcional
if (file_exists(__DIR__ . "/../includes/cabecalhomenu.php")) {
    require_once __DIR__ . "/../includes/cabecalhomenu.php";
}
?>

<?php if ($pagina === "categoria") { ?>

    <?php
    $itensDaCategoria = array();
    foreach ($_SESSION["itens"] as $item) {
        if (strcasecmp($item["categoria"] ?? "", $categoriaSelecionada) === 0) {
            $itensDaCategoria[] = $item;
        }
    }
    ?>

    <main class="perfil-aberto">
        <h1><?php echo htmlspecialchars($categoriaSelecionada, ENT_QUOTES, "UTF-8"); ?></h1>
        <?php if (count($itensDaCategoria) === 0) { ?>
            <p>Nenhum objeto encontrado nesta categoria.</p>
        <?php } else { ?>
            <div class="lista">
                <?php foreach ($itensDaCategoria as $item) { ?>
                    <article class="quadrado">
                        <strong><?php echo htmlspecialchars($item["objeto"] ?? "", ENT_QUOTES, "UTF-8"); ?></strong>
                        <small>
                            <?php echo htmlspecialchars($item["descricao"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </small>
                        <small>
                            Local: <?php echo htmlspecialchars($item["local"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </small>
                        <small>
                            Data: <?php echo htmlspecialchars($item["data"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </small>
                    </article>
                <?php } ?>
            </div>
        <?php } ?>
        <a href="pesquisa.php">Voltar à pesquisa</a>
    </main>

<?php } elseif ($pagina === "item") { ?>

    <main class="perfil-aberto">
        <h1>
            <?php echo htmlspecialchars($nomeItem, ENT_QUOTES, "UTF-8"); ?>
        </h1>

        <p>Você selecionou este item do menu.</p>

        <a href="pesquisa.php">Voltar ao menu</a>
    </main>

<?php } else { ?>

    <main>
        <!-- Barra superior e pesquisa -->
        <div class="linha-de-cima">

            <a class="botao-perfil" href="<?php
                echo htmlspecialchars($linkPerfil, ENT_QUOTES, "UTF-8");
            ?>">
                Perfil
            </a>

            <form class="form-pesquisa" action="pesquisa.php" method="get">
                <input
                    type="text"
                    name="busca"
                    placeholder="Pesquisar objetos perdidos..."
                    value="<?php echo htmlspecialchars($texto, ENT_QUOTES, "UTF-8"); ?>"
                >

                <button type="submit">Pesquisar</button>
            </form>
        </div>
        
        
        <?php if ($texto !== "") { ?>
            <div class="caixa-resultado">
                <p class="aviso">
                    Resultados para:
                    <strong><?php echo htmlspecialchars($texto, ENT_QUOTES, "UTF-8"); ?></strong>
                </p>
            </div>
        <?php } ?>

        <section class="itens-encontrados">
            <h2>Objetos encontrados</h2>
            <div class="lista">
                <?php if (count($objetosEncontrados) === 0) { ?>
                    <p>Nenhum objeto encontrado.</p>
                <?php } ?>

                <?php foreach ($objetosEncontrados as $item) { ?>
                    <article class="quadrado">
                        <strong><?php echo htmlspecialchars($item["objeto"] ?? "", ENT_QUOTES, "UTF-8"); ?></strong>
                        <small>
                            <?php echo htmlspecialchars($item["descricao"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </small>
                        <small>
                            Categoria: <?php echo htmlspecialchars($item["categoria"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </small>
                        <small>
                            Local: <?php echo htmlspecialchars($item["local"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </small>
                    </article>
                <?php } ?>
            </div>
        </section>

        <!-- Conteúdo do menu -->
        <div class="area-de-baixo">

            <!-- Adicionados recentemente -->
            <section class="lado">
                <h2>Adicionados recentemente</h2>

                <div class="lista">
                    <?php if (count($recentes) === 0) { ?>
                        <p>Nenhum item encontrado.</p>
                    <?php } ?>

                    <?php foreach ($recentes as $item) { ?>
                        <a
                            class="quadrado"
                            href="pesquisa.php?pagina=item&amp;nome=<?php echo urlencode($item["nome"]); ?>"
                        >
                            <img
                                src="<?php echo htmlspecialchars($caminhoImagem . $item["imagem"], ENT_QUOTES, "UTF-8"); ?>"
                                alt="<?php echo htmlspecialchars($item["nome"], ENT_QUOTES, "UTF-8"); ?>"
                            >

                            <small>
                                <?php echo htmlspecialchars($item["nome"], ENT_QUOTES, "UTF-8"); ?>
                            </small>
                        </a>
                    <?php } ?>
                </div>
            </section>

            <!-- Categorias -->
            <section class="lado lado-direito">
                <h2 class="titulo-menor">Categorias</h2>

                <div class="lista">
                    <?php if (count($categorias) === 0) { ?>
                        <p>Nenhuma categoria encontrada.</p>
                    <?php } ?>

                    <?php foreach ($categorias as $item) { ?>
                        <a
                            class="quadrado"
                            href="pesquisa.php?pagina=categoria&amp;categoria=<?php echo urlencode($item["nome"]); ?>"
                        >
                            <img
                                src="<?php echo htmlspecialchars($caminhoImagem . $item["imagem"], ENT_QUOTES, "UTF-8"); ?>"
                                alt="<?php echo htmlspecialchars($item["nome"], ENT_QUOTES, "UTF-8"); ?>"
                            >

                            <small>
                                <?php echo htmlspecialchars($item["nome"], ENT_QUOTES, "UTF-8"); ?>
                            </small>
                        </a>
                    <?php } ?>
                </div>
            </section>

        </div>
    </main>

<?php } ?>

<?php
if (file_exists(__DIR__ . "/../includes/rodape.php")) {
    require_once __DIR__ . "/../includes/rodape.php";
}
?>

</body>
</html>
