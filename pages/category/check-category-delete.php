<?php
  $id = $_GET['id'];
  $done = false;
  $msgUsuario = "ERRO - Categoria não existe!";

  // Verificando se existe o produto a ser EXCLUIDO.
  $consulta = odbc_exec($db, "SELECT idCategoria FROM Categoria");
  while ($result = odbc_fetch_array($consulta)) {
    if($result['idCategoria'] == $id){
      $done = true;
      break;
    }
  }

   // Verificando se a categoria contem algum produto registrado.
   if($done == true){
     $check = odbc_exec($db, 'SELECT idCategoria FROM Produto WHERE idCategoria = '.$id);
     while ($result = odbc_fetch_array($check)){
       if($result['idCategoria'] == $id){
         $msgUsuario = "Não foi possível excluir a categoria, pois existem produtos relacionados a categoria!";
         $done = false;
         break;
       }
     }
   }

  // Verificando se o id é um número.
  if($done == true && is_numeric($id)){
    $done = false;
    if($consulta = odbc_exec($db, "DELETE FROM Categoria WHERE idCategoria = {$id}")){
      if(odbc_num_rows($consulta) > 0)
        $msgUsuario = "Categoria excluido com sucesso!";
      else
        $msgUsuario = "ERRO - Categoria não existe!";
    }else{
      $msgUsuario = "Erro ao excluir categoria!";
    }
  }

  include('../../dataBase/queries/query-full-category.php');
  include('list-category.tpl.php');
?>
