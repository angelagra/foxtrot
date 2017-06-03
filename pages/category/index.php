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
        // Se o formul�rio n�o foi apresentado, entrar no formul�rio.
        include('new-category.tpl.php');
        break;
      // APAGAR CATEGORIA ------------------------------------------------------
      // -----------------------------------------------------------------------
      case 'excluir':
        include('check-category-delete.php');
        break;
      // EDITAR CATEGORIA ------------------------------------------------------
      // -----------------------------------------------------------------------
      case 'editar':
        // Verificando id se existe ou n�o (passando Nulo caso n�o exista).
        $idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
        // Consultado categoria escolhida
        $consulta = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria
                                    FROM   Categoria
                                    WHERE  idCategoria ='.$idCategoria);
        // idCategoria est� sendo concatenado, pois ele � um n�mero. e n�o interfere no banco de dados.
        // Criando um array com as informa��es da categoria escolhida
        $arryCategoria = odbc_fetch_array($consulta);
        include('edit-category.tpl.php');
        break;
      // MENSAGEM PADR�O -------------------------------------------------------
      // -----------------------------------------------------------------------
      default:
        $msgUsuario = "A a&ccedil;&atilde;o escolhida n&atilde;o &eacute; v&aacute;lida!";
        include('../../dataBase/queries/query-full-category.php');
        include('list-category.tpl.php');
    } /* -- FIM DO SWITCH -- */
  }else{
    // Tratando informa��e do formul�rio para uma vare�vel
    $padroes = "/[^a-zA-Z0-9 ]+/";
    $substituicao = "";

    // CADASTRAR NOVA CATEGORIA ------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['bntSalvar'])){
      // Tratando categoria e descri��o ...
      $inputCategoria = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputCategoria']))));
      $inputDescricao = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputDescricao']))));

      // Efetuando cadastro da NOVA CATEGORIA ----------------------------
      if(odbc_exec($db, "INSERT INTO Categoria
                        (nomeCategoria,
                         descCategoria)
                        VALUES
                        ('$inputCategoria',
                         '$inputDescricao')")){
        $msgUsuario = "A categoria ".utf8_encode($inputCategoria)." foi cadastrada com sucesso.";
      }else{
        $msgUsuario = "Erro ao cadastar uma nova categoria.";
      }
    } // Fim da a��o bntSalvar

    // ATUALIZAR NOVA CATEGORIA ------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['btnAtualizar'])){
      // Tratando categoria e descri��o ...
      $inputCategoria = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputCategoria']))));
      $inputDescricao = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputDescricao']))));
      $idCategoria    = preg_replace($padroes, $substituicao, $_POST['btnAtualizar']);

      // Efetuando atualiza��o na categoria passada via GET.
      if(odbc_exec($db, "UPDATE Categoria
                         SET
                         nomeCategoria = '$inputCategoria',
                         descCategoria = '$inputDescricao'
                         WHERE
                         idCategoria = '$idCategoria'")){
        $msgUsuario = "Categoria ".utf8_encode($inputCategoria)." atualizada com sucesso!";
      }else{
        $msgUsuario = "Erro ao gravar atualiza&ccedil;&atilde;o da categoria.";
      }
    } // Fim da a��o btnAtualizar

    // Listando as Categorias na p�gina. ---------------------------------------
    // -------------------------------------------------------------------------
    include('../../dataBase/queries/query-full-category.php');
    include('list-category.tpl.php');
  }
?>
