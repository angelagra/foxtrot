<?php
  $id = $_GET['id'];
  $done = false;
  $msgUsuario = "ERRO - Produto não existe!";

  // Verificando se existe o produto a ser EXCLUIDO.
  $consulta = odbc_exec($db, "SELECT idProduto FROM Produto");
  while ($result = odbc_fetch_array($consulta)) {
    if($result['idProduto'] == $id){
      $done = true;
      break;
    }
  }

  // // Verificando se o Produto contem algum pedido registrado.
  // if($done == true){
  //   $check = odbc_exec($db, "SELECT idProduto FROM ItemPedido WHERE idProduto = {$id}");
  //   if($check['idProduto'] == $id){
  //     $done = true;
  //   }else{
  //     $done = false;
  //     $msgUsuario = "Não foi possível excluir o produto, pois existem pedidos relacionados ao produto!";
  //   }
  // }

  // Verificando se o id é um número.
  if($done == true && is_numeric($id)){
    $done = false;
    if($consulta = odbc_exec($db, "DELETE FROM Produto WHERE idProduto = {$id}")){
      if(odbc_num_rows($consulta) > 0)
      $msgUsuario = "Produto excluido com sucesso!";
      else
      $msgUsuario = "ERRO - Produto não existe!";
    }else{
      $msgUsuario = "Erro ao excluir produto!";
    }
  }

  include('../../dataBase/queries/query-full-product.php');
  include('list-product.tpl.php');
?>
