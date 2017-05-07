<html>
  <head>
    <meta charset="utf-8">
    <title> PI 2 -- Exemplo para loja virtual </title>
    <link rel="stylesheet" href="../estilo/login.css">
    <link rel="stylesheet" href="../estilo/estilo-default.css">
  </head>

  <body>
    <img src="../img/logoFoxtrot-240x175.png" />

    <div class="wrapper">

      <div class="container">
        <h1>
          <?php
            if(isset($erro)) echo "$erro";
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

  <footer class="desenvolvedor color-default">
    <p>Projeto integrador 2 - Centro Universitário Senac Santo Amaro - Tecnologia em Sistemas para Internet</p>
    <a href="https://www.linkedin.com/in/angelagra/" target="_blank">Angela</a>
    <a href="https://www.linkedin.com/in/saulo-sinesio-377850127/" target="_blank">Anna</a>
    <a href="https://www.linkedin.com/in/saulo-sinesio-377850127/" target="_blank">Saulo Sinesio</a>
  </footer>

  </body>
</html>
