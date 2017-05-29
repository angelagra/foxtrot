<html>
  <head>
    <meta charset="utf-8">
    <title>Foxtrot</title>
    <link rel="stylesheet" href="../../styles/default.css">
    <link rel="stylesheet" href="../../styles/login.css">
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
    <link rel="shortcut icon" href="../../images/logo/logo-favicon.ico" type="image/png">
  </head>

  <link rel="stylesheet" href="../estilo/login.css">
  <body>
    <img src="../../images/logo/logoFoxtrot-240x175.png" class="img-login"/>
    <div class="wrapper">
      <div class="container">
        <h1 class="h1-login">
          <?php
            if(isset($msgUsuario)) echo "$msgUsuario";
            else echo "Bem Vindo";
          ?>
        </h1>
        <form method="post" class="frm">
          <input name="email" id="email" type="text" placeholder="Entre com seu E-mail" />
          <input name="senha" id="senha" type="password" placeholder="Entre com sua Senha" />
          <button type="submit" id="bnt-login" class="color-default" value="Entrar">Entrar</button>
        </form>
      </div> <!-- Fim div class container -->
    </div> <!-- Fim class wrapper -->
  </body>
</html>
