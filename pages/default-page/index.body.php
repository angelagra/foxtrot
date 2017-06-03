</head>

<body>
  <div class="header-full-page">
    <header class="header">
      <ul>
        <li class="logo-foxtrot"><a href="../menu/">
          <img src="../../images/logo/logo-80x58.png" class="logo-foxtrot"/>
        </a></li>
        <li><a href="../user">Usu&aacute;rio</a></li>
        <li><a href="../category/">Categoria</a></li>
        <li><a href="../product">Produto</a></li>
        <li>
          <a href="../../dataBase/connect/disconnect.php">Sair</a>
          <br>
          <p><?php echo utf8_encode($_SESSION['nomeUsuario']); ?><p>
        </li>
      </ul>
    </header>
  </div>
  <div class="container-global">
