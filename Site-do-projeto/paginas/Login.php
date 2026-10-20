<?php
require_once'../includes/cabecalho.php';
require_once '../dados/dados.php';
/**@var array $usuarios */
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["User"];
    $senha = $_POST["password"];

    $loginCorreto = false;
//aqui procura os dados dos usuarios np dados.php
    foreach ($usuarios as $usuario) {
        if ($usuario["email"] == $email && $usuario["senha"] == $senha) {
            $loginCorreto = true;
        }
    }
//se os dados estiverem certos o login muda de false para true 
    //se der true ele vai mandar "login realizado..." em todos os outros casos vai aparecer" email ou senha incorreto"
    if ($loginCorreto) {
        $mensagem = "Login realizado com sucesso!";
    } else {
        
        $mensagem = "E-mail ou senha incorretos.";
    }
}
?>
<html>

    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="/css/login.css">
    </head>
    <body>
        <h1>Achados e Perdidos</h1>
              <!-- Parte do login -->
      <div class="Login">
         <form action="" method="post">
          <h2>User</h2>
          <input type="email" name="User" required>
          <h2>Senha</h2>
          <input type="password" name="password" required>
          <input type="submit" name="enter" value="Entrar">
    <?php
//se a mensagem for diferente de um texto vazio, mostra a mensagem no echo
        if ($mensagem != "") {
            echo $mensagem;
        }
        ?>
         </form>
      </div>
  </body>
</html>

<?php  require_once'../includes/rodape.php'?>
