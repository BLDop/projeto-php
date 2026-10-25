<?php

// aqui fica os itens do menu pedro

$itens = array(
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
        "nome" => "Bliblioteca",
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

// o local de pesquisa
$texto = "";

if (isset($_GET["busca"])) {
    $texto = trim($_GET["busca"]);
}

// Separar os itens
$recentes = array();
$categorias = array();

foreach ($itens as $item) {

    if (
        $texto == "" ||
        stripos($item["nome"], $texto) !== false
    ) {

        if ($item["grupo"] == "recentes") {
            $recentes[] = $item;
        } else {
            $categorias[] = $item;
        }

    }
}

// Pagina selecionada
$pagina = "";

if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu menu de fotos</title>

    <link rel="stylesheet" href="trabalho_css.css">

</head>


<body>

<?php if ($pagina == "perfil") { ?>

    <div class="perfil-aberto">
        <h1>Perfil</h1>
        <p>Esta é a área do perfil.</p>
        <a href="trabalho_php.php">Voltar ao menu</a>
    </div>

<?php } elseif ($pagina == "item" && isset($_GET["nome"])) { ?>

    <div class="perfil-aberto">
        <h1>
            <?php
            echo htmlspecialchars(
                $_GET["nome"],
                ENT_QUOTES,
                "UTF-8"
            );
            ?>
        </h1>

        <p>Você abriu este item do menu.</p>

        <a href="trabalho_php.php">Voltar ao menu</a>
    </div>

<?php } else { ?>

    <!-- Parte superior -->
    <div class="linha-de-cima">

        <a class="botao-perfil"
           href="../paginas/perfil.php">
            Perfil
        </a>

        <form action="trabalho_php.php" method="get">

            <input
                type="text"
                name="busca"
                placeholder="Pesquisa..."
                value="<?php
                    echo htmlspecialchars(
                        $texto,
                        ENT_QUOTES,
                        "UTF-8"
                    );
                ?>"
            >

            <button type="submit">OK</button>

        </form>

    </div>

    <!-- resultado da pesquisa -->
     <p class="barrade"> Barra de pesquisa: </p>
    <div class="caixa-resultado">

        <?php if ($texto != "") { ?>

            <p class="aviso">
                Pesquisa por:
                <?php
                echo htmlspecialchars(
                    $texto,
                    ENT_QUOTES,
                    "UTF-8"
                );
                ?>
            </p>

        <?php } ?>

    </div>

    <!-- area inferior -->
    <div class="area-de-baixo">

        <!-- adicionados recentemente -->
        <section class="lado">

            <h2>Adicionados recentemente</h2>

            <div class="lista">
                

                <?php if (count($recentes) == 0) { ?>

                    <p>Nenhum item encontrado.</p>

                <?php } ?>

                <?php foreach ($recentes as $item) { ?>
                    
                    <a
                        class="quadrado"
                        href="trabalho_php.php?pagina=item&amp;nome=<?php
                            echo urlencode($item["nome"]);
                        ?>"
                    >

                        <img
                             
                        src="../imagem/cartao.png"
                        
                            src="<?php
                                echo htmlspecialchars(
                                    $item["imagem"],
                                    ENT_QUOTES,
                                    "UTF-8"
                                );
                            ?>"
                            alt="<?php
                                echo htmlspecialchars(
                                    $item["nome"],
                                    ENT_QUOTES,
                                    "UTF-8"
                                );
                            ?>"
                        >

                        <small>
                            <?php
                            echo htmlspecialchars(
                                $item["nome"],
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>
                        </small>

                    </a>

                <?php } ?>

            </div>

        </section>

        <!-- categorias -->
        <section class="lado lado-direito">

            <h2 class="titulo-menor">Categorias</h2>

            <div class="lista">

                <?php if (count($categorias) == 0) { ?>

                    <p>Nenhuma categoria encontrada.</p>

                <?php } ?>

                <?php foreach ($categorias as $item) { ?>

                    <a
                        class="quadrado"
                        href="trabalho_php.php?pagina=item&amp;nome=<?php
                            echo urlencode($item["nome"]);
                        ?>"
                    >

                        <img
    src="<?php echo htmlspecialchars($item["imagem"], ENT_QUOTES, "UTF-8"); ?>"
    alt="<?php echo htmlspecialchars($item["nome"], ENT_QUOTES, "UTF-8"); ?>"
>

                        <small>
                            <?php
                            echo htmlspecialchars(
                                $item["nome"],
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>
                        </small>

                    </a>

                <?php } ?>

            </div>

        </section>

    </div>

<?php } ?>


</body>

<link rel="stylesheet" href="../css/menu1.css">


</html>
