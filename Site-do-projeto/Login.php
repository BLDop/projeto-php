<?php 
require_once'includes/cabecalho.php';
require_once 'dados.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email = $_POST["User"];
$senha = $_POST["password"];
// vao procurra o usuario no array la
// e depois ve se as informações estão certas
}
?>
<html>

    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="login.css">
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
         </form>
      </div>
  </body>
</html>

<?php  require_once'includes/rodape.php'?>
