<?php
  session_start();

  // Verificamos se o usuário está logado, as vareáveis estão com o login do cliente.
  if(!isset($_SESSION['idUsuario'])
  || !isset($_SESSION['tipoPerfil'])
  || !isset($_SESSION['nomeUsuario'])){

    session_destroy();
    header('Location: ../');
    exit;
  }
?>
