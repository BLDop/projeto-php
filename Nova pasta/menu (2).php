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

    <style>
         .barrade{
                margin-left:110px;
            }

        body {
            margin: 0;
            background: white;
            font-family: Arial, sans-serif;
            color: #111;
        }

        /* parte superior */

        .linha-de-cima {
            display: flex;
            align-items: center;
            padding: 10px 12px;
            gap: 22px;
        }

        .botao-perfil {
            background: #d8d8d8;
            color: #111;
            text-decoration: none;
            border-radius: 50%;
            width: 68px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        form {
            display: flex;
            width: 86%;
            gap: 6px;
        }

        input {
            width: 100%;
            background: #d8d8d8;
            border: 0;
            border-radius: 24px;
            padding: 7px 14px;
            font-size: 21px;
        }

        button {
            background: #d8d8d8;
            border: 0;
            border-radius: 18px;
            padding: 0 13px;
            cursor: pointer;
        }

        /* resultado da pesquisa */

        .caixa-resultado {
            background: #d8d8d8;
            border-radius: 48px;
            margin: 20px 2.2% 36px 4.5%;
            min-height: 100px;
            padding: 28px 26px;
            font-size: 21px;
            box-sizing: border-box;
        }

        .caixa-resultado p {
            margin-top: 16px;
        }

        .aviso {
            font-size: 15px;
        }

        /* Área inferior */

        .area-de-baixo {
            display: flex;
            border-top: 1px solid #555;
        }

        .lado {
            width: 48%;
            padding: 25px 2.5% 40px 4.8%;
        }

        .lado-direito {
            border-left: 2px solid #aaa;
            padding-left: 5.5%;
            width: 47%;
        }

        h2 {
            background: #d8d8d8;
            border-radius: 25px;
            font-size: 21px;
            font-weight: normal;
            text-align: center;
            padding: 7px 4px;
            width: 92%;
            margin: 0 auto 50px;
        }

        .titulo-menor {
            width: 43%;
            margin-left: 18%;
        }

        /* grade dos botoes */

        .lista {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 38px 28px;
        }

        .quadrado {
    background: #d8d8d8;
    border-radius: 20px;
    height: 220px;
    padding: 8px;
    box-sizing: border-box;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    text-decoration: none;
    color: #111;
    overflow: hidden;
}

        /* imagens dos adicionados recentemente */

        .quadrado img {
    width: 100%;
    height: 170px;
    object-fit: cover;
    object-position: center;
    border-radius: 12px;
    display: block;
}


        .quadrado small {
    font-size: 13px;
    margin-top: 8px;
    text-align: center;
}

        .quadrado:hover {
            background: #c9c9c9;
        }

        /* perfil e páginas dos itens */

        .perfil-aberto {
            background: #d8d8d8;
            border-radius: 35px;
            margin: 35px;
            padding: 30px;
        }

        .perfil-aberto a {
            color: #111;
        }

        /* celulares */

        @media (max-width: 650px) {

            .linha-de-cima {
                gap: 10px;
            }

            .botao-perfil {
                width: 58px;
                height: 58px;
                font-size: 17px;
            }

            input {
                font-size: 17px;
                min-width: 0;
            }

            button {
                padding: 0 8px;
            }

            .caixa-resultado {
                margin: 18px 12px 25px;
                min-height: 125px;
                border-radius: 30px;
                font-size: 18px;
            }

            .area-de-baixo {
                display: block;
            }

            .lado,
            .lado-direito {
                width: auto;
                padding: 25px 20px 35px;
                border-left: 0;
            }

            .lado-direito {
                border-top: 1px solid #aaa;
            }

            h2 {
                font-size: 18px;
                margin-bottom: 30px;
            }

            .titulo-menor {
                width: 70%;
                margin-left: auto;
                margin-right: auto;
            }

            .lista {
                gap: 18px;
            }

            .quadrado {
                height: 135px;
                font-size: 18px;
            }

            .quadrado img {
                height: 85px;
            }

            .perfil-aberto {
                margin: 15px;
                padding: 20px;
            }
        }
    </style>
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
           href="trabalho_php.php?pagina=perfil">
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
</html>
