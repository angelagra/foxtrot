<?php
  // Verifica��o de acesso do usu�rio!
  include('../../dataBase/authentication/access.php');
  include('../../dataBase/connect/index.php');

  // Esperando a��o via GET ou POST do Usu�rio.
  if(isset($_REQUEST['acao'])){
    $acao = $_REQUEST['acao'];
    // Criando condi��es para as a��es
    switch ($acao) {
      // INCLUIR NOVA CATEGORIA ------------------------------------------------
      // -----------------------------------------------------------------------
      case 'incluir':
        include('check-user-new.php');
        break;
      // APAGAR CATEGORIA ------------------------------------------------------
      // -----------------------------------------------------------------------
      case 'excluir':
        include('check-user-delete.php');
        break;
      // EDITAR CATEGORIA ------------------------------------------------------
      // -----------------------------------------------------------------------
      case 'editar':
        // Verificando id se existe ou n�o (passando Nulo caso n�o exista).
        $idUsuario = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
        // Consultado usu�rio escolhido
        $consulta = odbc_exec($db, 'SELECT idUsuario, loginUsuario, nomeUsuario, tipoPerfil, usuarioAtivo
                                    FROM   Usuario
                                    WHERE  idUsuario ='.$idUsuario);
        // Criando um array com as informa��es do usu�rio escolhido
        $array_usuario = odbc_fetch_array($consulta);
        include('edit-user.tpl.php');
        break;
      // MENSAGEM PADR�O -------------------------------------------------------
      // -----------------------------------------------------------------------
      default:
        $msgUsuario = "A a&ccedil;&atilde;o escolhida n&atilde;o &eacute; v&aacute;lida!";
        include('../../dataBase/queries/query-full-user.php');
        include('list-user.tpl.php');
    } /* -- FIM DO SWITCH -- */
  }else{
    // Tratando informa��e do formul�rio para uma vare�vel
    $padroes = "/[^a-zA-Z0-9^.]+/";
    $padraoSenha = "/[\"\';#]+/";
    $substituicao = "";

    // CADASTRAR NOVO USU�RIO --------------------------------------------------
    // -------------------------------------------------------------------------
  	if(isset($_POST['btnNovoUsuario'])){
      $inputNome      = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputNome']))));
      $inputSenha     = preg_replace($padraoSenha, $substituicao, $_POST['inputSenha']);
      $inputPerfil    = $_POST['inputPerfil'] != 'A' && $_POST['inputPerfil'] != 'C' ? 'C' :	$_POST['inputPerfil'];
      $inputAtivo     = !isset($_POST['inputAtivo']) ? 0 : 1; //Pega a ativa��o

      $email_exploded =	explode('@',$_POST['inputLogin']);
      $email_comeco   = preg_replace($padroes, $substituicao, $email_exploded[0]);
      $email_fim      = preg_replace($padroes, $substituicao, $email_exploded[1]);
      $inputLogin     = $email_comeco.'@'.$email_fim;

  		if(odbc_exec($db, "INSERT INTO Usuario
  								      (loginUsuario, senhaUsuario,
  								       nomeUsuario, tipoPerfil, usuarioAtivo)
  							         VALUES
  								      ('$inputLogin', HASHBYTES('SHA1','$inputSenha'),
  								       '$inputNome', '$inputPerfil', $inputAtivo)")){
  			$msgUsuario = "Usu&aacute;rio ".utf8_encode($inputNome)." cadastrado com sucesso!";
  		}else{
  			$msgUsuario = "Erro ao cadastrar usu&aacute;rio!";
  		}
  	}
    // ATUALIZAR USU�RIO -------------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['btnGravarUsuario'])){
      $inputNome      = utf8_encode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputNome']))));
      $inputSenha     = preg_replace($padraoSenha, $substituicao, $_POST['inputSenha']);
      $inputPerfil    = $_POST['inputPerfil'] != 'A' && $_POST['inputPerfil'] != 'C' ? 'C' :	$_POST['inputPerfil'];
      $inputAtivo     = !isset($_POST['inputAtivo']) ? 0 : 1; //Pega a ativa��o

      $email_exploded =	explode('@',$_POST['inputLogin']);
      $email_comeco   = preg_replace($padroes, $substituicao, $email_exploded[0]);
      $email_fim      = preg_replace($padroes, $substituicao, $email_exploded[1]);
      $inputLogin     = $email_comeco.'@'.$email_fim;
      $idUsuario      = $_POST['btnGravarUsuario'];

      if(odbc_exec($db, "	UPDATE Usuario
                          SET
                                 loginUsuario = '$inputLogin',
                                 senhaUsuario = HASHBYTES('SHA1','$inputSenha'),
                                 nomeUsuario  = '$inputNome',
                                 tipoPerfil   = '$inputPerfil',
                                 usuarioAtivo = $inputAtivo
                          WHERE  idUsuario    = $idUsuario")){
        $msgUsuario = "Usu&aacute;rio ".utf8_decode($inputNome)." editado com sucesso!";
      }else{
          $erro = "Erro ao gravar atualiza&ccedil;&atilde;o da usu&aacute;rio!";
        }
      }

    // Listando as Categorias na p�gina. ---------------------------------------
    // -------------------------------------------------------------------------
    include('../../dataBase/queries/query-full-user.php');
    include('list-user.tpl.php');
  }
?>
