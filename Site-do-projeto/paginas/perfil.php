<?php
$nome = "Luydi Gabriel";
$email = "luydi@email.com";
$curso = "Engenharia de Software";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil</title>

    <style>
        body {
            background: #111;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px 15px;
        }

        .perfil {
            background: #252525;
            max-width: 350px;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #444;
        }

        .foto {
            background: #444;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        h1 {
            font-size: 24px;
        }

        .tipo {
            color: #aaa;
        }

        .informacoes {
            background: #191919;
            padding: 15px;
            border-radius: 10px;
            text-align: left;
            margin: 20px 0;
        }

        button {
            background: #444;
            color: white;
            border: 1px solid #666;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <div class="perfil">
        <div class="foto">👤</div>

        <h1><?php echo $nome; ?></h1>
        <p class="tipo">Estudante</p>

        <div class="informacoes">
            <p><strong>Nome:</strong> <?php echo $nome; ?></p>
            <p><strong>E-mail:</strong> <?php echo $email; ?></p>
            <p><strong>Curso:</strong> <?php echo $curso; ?></p>
        </div>

        <button onclick="editarPerfil()">Editar perfil</button>
    </div>

    <script>
        function editarPerfil() {
            alert("Edição de perfil em desenvolvimento!");
        }
    </script>
</body>
</html>
