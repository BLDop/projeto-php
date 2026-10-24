
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #111;
            color: white;
            font-family: Arial, sans-serif;
        }

        header {
            background: #1b1b1b;
            padding: 20px 30px;
            border-bottom: 1px solid #333;
        }

        .container {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        aside {
            width: 230px;
            background: #191919;
            padding: 25px 15px;
            border-right: 1px solid #333;
        }

        aside a {
            display: block;
            color: #ccc;
            text-decoration: none;
            padding: 15px;
            border-radius: 8px;
        }

        aside a:hover,
        aside a.ativo {
            background: #353535;
            color: white;
        }

        main {
            flex: 1;
            padding: 35px;
        }

        .perfil {
            display: flex;
            align-items: center;
            gap: 20px;
            background: #1c1c1c;
            padding: 25px;
            border: 1px solid #333;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .foto {
            width: 90px;
            height: 90px;
            background: #444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
        }

        .conteudo {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .card {
            background: #1c1c1c;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .informacao {
            padding: 15px 0;
            border-bottom: 1px solid #333;
        }

        .informacao:last-child {
            border-bottom: none;
        }

        .informacao p {
            color: #aaa;
            margin: 0 0 8px;
        }

        button {
            background: #eee;
            color: #111;
            border: none;
            border-radius: 6px;
            padding: 11px 16px;
            cursor: pointer;
        }

        button:hover {
            background: #ccc;
        }

        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            background: #292929;
            color: white;
            border: 1px solid #444;
            border-radius: 6px;
        }

        .configuracao {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding: 15px 0;
            border-bottom: 1px solid #333;
        }

        .configuracao:last-child {
            border-bottom: none;
        }

        @media (max-width: 800px) {
            .container {
                flex-direction: column;
            }

            aside {
                width: 100%;
            }

            main {
                padding: 20px;
            }

            .conteudo {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>HelpDesk</h2>
</header>

<div class="container">

    <aside>
        <a href="index.php">Início</a>
        <a href="chamados.php">Meus Chamados</a>
        <a href="base-conhecimento.php">Base de Conhecimento</a>
        <a href="#" class="ativo">Meu Perfil</a>
        <a href="#configuracoes">Configurações</a>
    </aside>

    <main>
        <h1>Meu Perfil</h1>
        <p style="color: #aaa;">Gerencie suas informações pessoais.</p>

        <section class="perfil">
            <div class="foto">L</div>

            <div style="flex: 1;">
                <h2 id="nomePerfil">Seu Nome</h2>
                <p id="usuarioPerfil" style="color: #aaa;">@seuusuario</p>
                <p id="emailPerfil">seuemail@email.com</p>
            </div>

            <button onclick="editarPerfil()">Editar Perfil</button>
        </section>

        <div class="conteudo">

            <section class="card">
                <h2>Informações Pessoais</h2>

                <div class="informacao">
                    <p>Nome completo</p>
                    <span id="nomeInfo">Seu Nome Completo</span>
                </div>

                <div class="informacao">
                    <p>Nome de usuário</p>
                    <span id="usuarioInfo">seuusuario</span>
                </div>

                <div class="informacao">
                    <p>E-mail</p>
                    <span id="emailInfo">seuemail@email.com</span>
                </div>

                <div class="informacao">
                    <p>Telefone</p>
                    <span id="telefoneInfo">Não informado</span>
                </div>

                <div class="informacao">
                    <p>Localização</p>
                    <span id="cidadeInfo">Não informada</span>
                </div>
            </section>

            <div>
                <section class="card" id="configuracoes">
                    <h2>Configurações</h2>

                    <div class="configuracao">
                        <span>Alterar senha</span>
                        <button onclick="alert('Área de alteração de senha')">Abrir</button>
                    </div>

                    <div class="configuracao">
                        <span>Notificações</span>
                        <input type="checkbox" checked
                               style="width: auto; margin: 0;">
                    </div>

                    <div class="configuracao">
                        <span>Privacidade</span>
                        <button onclick="alert('Configurações de privacidade')">Abrir</button>
                    </div>

                    <div class="configuracao">
                        <span>Aparência</span>
                        <button onclick="alert('Tema escuro ativado')">Abrir</button>
                    </div>
                </section>

                <section class="card">
                    <h2>Conta</h2>
                    <button onclick="alert('Área de exclusão de conta')">
                        Excluir conta
                    </button>
                </section>
            </div>

        </div>
    </main>
</div>

<script>
    function editarPerfil() {
        let nome = prompt("Digite seu nome completo:");
        if (nome === null || nome.trim() === "") return;

        let usuario = prompt("Digite seu nome de usuário:");
        if (usuario === null || usuario.trim() === "") return;

        let email = prompt("Digite seu e-mail:");
        if (email === null || email.trim() === "") return;

        document.getElementById("nomePerfil").textContent = nome;
        document.getElementById("nomeInfo").textContent = nome;

        document.getElementById("usuarioPerfil").textContent = "@" + usuario;
        document.getElementById("usuarioInfo").textContent = usuario;

        document.getElementById("emailPerfil").textContent = email;
        document.getElementById("emailInfo").textContent = email;
    }
</script>

</body>
</html>
