<?php
  $id = $_GET['id'];

  // Verificando permi��o do usu�rio pra liberar acesso.
  if($_SESSION['tipoPerfil'] == 'A' || $_SESSION['tipoPerfil'] == 'a'){
    // Verificando se existe o produto a ser EXCLUIDO.
    $consulta = odbc_exec($db, "SELECT idUsuario FROM Usuario");
    while ($result = odbc_fetch_array($consulta)) {
      if($result['idUsuario'] == $id){
        $done = true;
        break;
      }else{
        $done = false;
        $msgUsuario = "ERRO - Usu�rio n�o existe!";
      }
    }

    // Verificando se o id � um n�mero.
    if($done == true && is_numeric($id)){
      $done = false;
      if($consulta = odbc_exec($db, "DELETE FROM Usuario WHERE idUsuario = {$id}")){
        if(odbc_num_rows($consulta) > 0)
          $msgUsuario = "Usu�rio excluido com sucesso!";
        else
          $msgUsuario = "ERRO - Usu�rio n�o existe!";
      }else{
        $msgUsuario = "ERRO - ao excluir usu�rio!";
      }
    }
  }else{
    $msgUsuario = "ERRO - Voc� n�o possui permi��o para excluir um Usu�rio!";
  }

  include('../../dataBase/queries/query-full-user.php');
  include('list-user.tpl.php');
?>
