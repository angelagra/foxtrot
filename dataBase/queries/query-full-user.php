<?php
  // Consultando todas as categorias registradas no Banco de Dados.
  $consulta = odbc_exec($db, 'SELECT idUsuario,
                                     loginUsuario,
                                     nomeUsuario,
                                     tipoPerfil,
                                     usuarioAtivo
                              FROM   Usuario');

  $counter = 0;
  while ($result = odbc_fetch_array($consulta)){
    // Passando cada campo de categoria para um array categorias
    $usuarios[$counter] = $result;
    $counter++;
  }
?>
