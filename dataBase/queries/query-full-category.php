<?php
  $consulta = odbc_exec($db, "SELECT nomeCategoria,
                                     descCategoria,
                                     idCategoria
                              FROM   Categoria");

  $counter = 0;
  while ($resul = odbc_fetch_array($consulta)){
    // Passando cada campo de categoria para um array categorias
    $categorias[$counter] = $resul;
    $counter++;
  }
?>
