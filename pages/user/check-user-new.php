<?php
  if($_SESSION['tipoPerfil'] == 'A' || $_SESSION['tipoPerfil'] == 'a'){
    $done = true;
  }else{
    $done = false;
    $msgUsuario = "ERRO - Voc&ecirc; n&atilde;o possui permis&atilde;o para adicionar um Usu&aacute;rio!";
  }

  if($done == true){
    $done = false;
    include('new-user.tpl.php');
  }else{
    include('../../dataBase/queries/query-full-user.php');
    include('list-user.tpl.php');
  }
?>
