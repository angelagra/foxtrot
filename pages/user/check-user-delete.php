<?php
  $id = $_GET['id'];

  // Verificando permição do usuário pra liberar acesso.
  if($_SESSION['tipoPerfil'] == 'A' || $_SESSION['tipoPerfil'] == 'a'){
    // Verificando se existe o produto a ser EXCLUIDO.
    $consulta = odbc_exec($db, "SELECT idUsuario FROM Usuario");
    while ($result = odbc_fetch_array($consulta)) {
      if($result['idUsuario'] == $id){
        $done = true;
        break;
      }else{
        $done = false;
        $msgUsuario = "ERRO - Usu&aacute;rio n&atilde;o existe!";
      }
    }

    // Verificando se o id é um número.
    if($done == true && is_numeric($id)){
      $done = false;
      if($consulta = odbc_exec($db, "DELETE FROM Usuario WHERE idUsuario = {$id}")){
        if(odbc_num_rows($consulta) > 0)
          $msgUsuario = "Usu&aacute;rio excluido com sucesso!";
        else
          $msgUsuario = "ERRO - Usu&aacute;rio n&atilde;o existe!";
      }else{
        $msgUsuario = "ERRO - ao excluir usu&aacute;rio!";
      }
    }
  }else{
    $msgUsuario = "ERRO - Voc&ecirc; n&atilde;o possui permis&atilde;o para excluir um Usu&aacute;rio!";
  }

  include('../../dataBase/queries/query-full-user.php');
  include('list-user.tpl.php');
?>
