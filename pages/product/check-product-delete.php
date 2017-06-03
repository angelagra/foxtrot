<?php
  $id = $_GET['id'];
  $done = false;
  $msgUsuario = "ERRO - Produto n�o existe!";

  // Verificando se existe o produto a ser EXCLUIDO.
  $consulta = odbc_exec($db, "SELECT idProduto FROM Produto");
  while ($result = odbc_fetch_array($consulta)) {
    if($result['idProduto'] == $id){
      $done = true;
      break;
    }
  }

  // Verificando se o Produto contem algum pedido registrado.
  if($done == true){
     $check = odbc_exec($db, 'SELECT idProduto FROM ItemPedido WHERE idProduto = '.$id);
     while ($result = odbc_fetch_array($check)){
       if($result['idCategoria'] == $id){
         $msgUsuario = "N�o foi poss�vel excluir o produto, pois existem pedidos relacionados ao produto!";
         $done = false;
         break;
       }
     }
   }


  // Verificando se o id � um n�mero.
  if($done == true && is_numeric($id)){
    $done = false;
    if($consulta = odbc_exec($db, "DELETE FROM Produto WHERE idProduto = {$id}")){
      if(odbc_num_rows($consulta) > 0)
      $msgUsuario = "Produto excluido com sucesso!";
      else
      $msgUsuario = "ERRO - Produto n�o existe!";
    }else{
      $msgUsuario = "Erro ao excluir produto!";
    }
  }

  include('../../dataBase/queries/query-full-product.php');
  include('list-product.tpl.php');
?>
