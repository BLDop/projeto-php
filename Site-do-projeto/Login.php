<?php require_once'includes/cabecalho.php'

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
         </form>
      </div>
  </body>
</html>

<?php  require_once'includes/rodape.php'?>