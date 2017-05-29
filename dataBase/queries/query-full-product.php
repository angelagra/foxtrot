<?php
  $consulta = odbc_exec($db, 'SELECT P.idProduto,
                                     P.nomeProduto,
                                     P.descProduto,
                                     P.precProduto,
                                     P.descontoPromocao,
                                     C.nomeCategoria,
                                     P.ativoProduto,
                                     U.nomeUsuario,
                                     P.qtdMinEstoque,
                                     P.imagem
                              FROM Produto AS P
                                   LEFT OUTER JOIN Categoria AS C
                                   ON P.idCategoria = C.idCategoria
                                   LEFT OUTER JOIN Usuario AS U
                                   ON P.idUsuario = U.idUsuario');

  $counter = 0;
  while ($result = odbc_fetch_array($consulta)) {
    // Passando cada campo do array uma categorias.
    $produtos[$counter] = $result;
    $counter++;
  }
?>
