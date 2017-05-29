<?php
  // Verificação de acesso do usuário!
  include('../../dataBase/authentication/access.php');
  include('../../dataBase/connect/index.php');

  // Esperando ação via GET ou POST do Usuário.
  if(isset($_REQUEST['acao'])){
    $acao = $_REQUEST['acao'];
    // Criando condições para as ações
    switch ($acao) {
      // INCLUIR NOVA CATEGORIA ------------------------------------------------
      // -----------------------------------------------------------------------
      case 'incluir':
        // Se o formulário não foi apresentado, entrar no formulário.
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
        // Verificando id se existe ou não (passando Nulo caso não exista).
        $idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
        // Consultado categoria escolhida
        $consulta = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria
                                    FROM   Categoria
                                    WHERE  idCategoria ='.$idCategoria);
        // idCategoria está sendo concatenado, pois ele é um número. e não interfere no banco de dados.
        // Criando um array com as informações da categoria escolhida
        $arryCategoria = odbc_fetch_array($consulta);
        include('edit-category.tpl.php');
        break;
      // MENSAGEM PADRÃO -------------------------------------------------------
      // -----------------------------------------------------------------------
      default:
        $msgUsuario = "A ação escolhida não é válida!";
        include('../../dataBase/queries/query-full-category.php');
        include('list-category.tpl.php');
    } /* -- FIM DO SWITCH -- */
  }else{
    // Tratando informaçõe do formulário para uma vareável
    $padroes = "/[^a-zA-Z0-9 ]+/";
    $substituicao = "";

    // CADASTRAR NOVA CATEGORIA ------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['bntSalvar'])){
      // Tratando categoria e descrição ...
      $inputCategoria = preg_replace($padroes, $substituicao, $_POST['inputCategoria']);
      $inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);

      // Efetuando cadastro da NOVA CATEGORIA ----------------------------
      if(odbc_exec($db, "INSERT INTO Categoria
                        (nomeCategoria,
                         descCategoria)
                        VALUES
                        ('$inputCategoria',
                         '$inputDescricao')")){
        $msgUsuario = "A categoria $inputCategoria foi cadastrada com sucesso.";
      }else{
        $msgUsuario = "Erro ao cadastar uma nova categoria.";
      }
    } // Fim da ação bntSalvar

    // ATUALIZAR NOVA CATEGORIA ------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['btnAtualizar'])){
      // Tratando categoria e descrição ...
      $inputCategoria = preg_replace($padroes, $substituicao, $_POST['inputCategoria']);
      $inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);
      $idCategoria    = preg_replace($padroes, $substituicao, $_POST['btnAtualizar']);

      // Efetuando atualização na categoria passada via GET.
      if(odbc_exec($db, "UPDATE Categoria
                         SET
                         nomeCategoria = '$inputCategoria',
                         descCategoria = '$inputDescricao'
                         WHERE
                         idCategoria = '$idCategoria'")){
        $msgUsuario = "Categoria $inputCategoria atualizada com sucesso!";
      }else{
        $msgUsuario = "Erro ao gravar atualização da categoria.";
      }
    } // Fim da ação btnAtualizar

    // Listando as Categorias na página. ---------------------------------------
    // -------------------------------------------------------------------------
    include('../../dataBase/queries/query-full-category.php');
    include('list-category.tpl.php');
  }
?>
