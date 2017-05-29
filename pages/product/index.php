<?php
// Muda configuração do PHP para trabalhar com imagens no DB
ini_set ('odbc.defaultlrl', 9000000);
set_time_limit(0); // Carregar IMG

// Verificação de acesso do usuário!
include('../../dataBase/authentication/access.php');
include('../../dataBase/connect/index.php');

// Esperando ação via GET ou POST do Usuário.
if(isset($_REQUEST['acao'])){
  $acao = $_REQUEST['acao'];
  // Criando condições para as ações
  switch ($acao) {
    // INCLUIR NOVO PRODUTO --------------------------------------------------
    // -----------------------------------------------------------------------
    case 'incluir':
      include('new-product.tpl.php');
      break;
    // APAGAR CATEGORIA ------------------------------------------------------
    // -----------------------------------------------------------------------
    case 'excluir':
      include('check-product-delete.php');
      break;
    // EDITAR CATEGORIA ------------------------------------------------------
    // -----------------------------------------------------------------------
    case 'editar':
      // Verificando id se existe ou não (passando Nulo caso não exista).
      $idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
      // Consultado produto escolhida
      $query_produto = odbc_exec($db, 'SELECT
                                             idProduto, nomeProduto,
                                             descProduto, precProduto,
                                             descontoPromocao, idCategoria,
                                             ativoProduto, idUsuario,
                                             qtdMinEstoque, imagem
                                       FROM  Produto
                                       WHERE idProduto = '.$idProduto);

        $array_produto = odbc_fetch_array($query_produto);

        include('edit-product.tpl.php');
        break;
    // MENSAGEM PADRÃO -------------------------------------------------------
    // -----------------------------------------------------------------------
    default:
      $msgUsuario = "A ação escolhida não é válida!";
      include('../../dataBase/queries/query-full-product.php');
      include('list-product.tpl.php');
  } /* -- FIM DO SWITCH -- */
}else{

  // CADASTRAR NOVO PRODUTOS --------------------------------------------------
	// --------------------------------------------------------------------------
  if(isset($_POST['btnNovoProduto'])){
  		// Tratando informaçõe do formulário para uma vareável
  		$padroes = "/[^a-zA-Z0-9 ]+/";
  		$padroesInteiro = "/[^0-9.,]+/";
  		$substituicao = "";
  		// Tratando inputs para salvar no Banco de Dados...
  		$inputProduto 	= preg_replace($padroes, $substituicao, $_POST['inputProduto']);
  		$inputPreco 	  = preg_replace($padroesInteiro, $substituicao, $_POST['inputPreco']);
  		$inputEstoque 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputEstoque']);
  		$inputDesconto 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputDesconto']);
  		$inputCategoria = preg_replace($padroesInteiro, $substituicao, $_POST['inputCategoria']);
  		$inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);
  		$inputAtivo     = !isset($_POST['inputAtivo']) ? 0 : 1; //Pega a ativação
      // Tratando a Imagem.
      if(empty($_FILES['inputImagem']['tmp_name'])){
        $conteudo = NULL;
      }else{
        $inputImagem = $_FILES['inputImagem']['tmp_name'];
    		$imagem = fopen($inputImagem, "r");
    		$conteudo = fread($imagem, filesize($inputImagem));
      }
  		// Efetuando cadastro da NOVO PRODUTO ----------------------------
  		$stmt = odbc_prepare($db,"INSERT INTO Produto
                                (nomeProduto,
                                 precProduto,
                                 idCategoria,
                                 ativoProduto,
                                 qtdMinEstoque,
                                 descontoPromocao,
                                 descProduto,
                                 imagem)
                                VALUES
                                 (?,?,?,?,?,?,?,?)");
  		$result = odbc_execute($stmt, array( $inputProduto, $inputPreco, $inputCategoria, $inputAtivo, $inputEstoque, $inputDesconto, $inputDescricao, $conteudo));

  		if(!odbc_errormsg($db)) $msgUsuario = "Produto foi cadastrado com sucesso.";
  		else $msgUsuario = "Erro ao tentar cadastrar novo produto.";

      if(isset($imagem)) fclose($imagem);
  	} // Fim da ação btnNovoProduto

  // ATUALIZAR NOVO PRODUTOS -------------------------------------------------
	// -------------------------------------------------------------------------
	if(isset($_POST['btnGravarProduto'])){
		// Tratando informaçõe do formulário para uma vareável
		$padroes = "/[^a-zA-Z0-9 ]+/";
		$padroesInteiro = "/[^0-9 .,]+/";
		$substituicao = "";

		// Tratando inputs para salvar no Banco de Dados...
		$inputProduto		= preg_replace($padroes, $substituicao, $_POST['inputProduto']);
		$inputPreco 		= preg_replace($padroesInteiro, $substituicao, $_POST['inputPreco']);
		$inputEstoque 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputEstoque']);
		$inputDesconto 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputDesconto']);
		$inputCategoria = preg_replace($padroesInteiro, $substituicao, $_POST['inputCategoria']);
		$inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);
		$idProduto 			= preg_replace($padroesInteiro, $substituicao, $_POST['btnGravarProduto']);
		$inputAtivo     = !isset($_POST['inputAtivo']) ? 0 : 1; // Pega a ativação
    // Tratando a Imagem.
    if(empty($_FILES['inputImagem']['tmp_name'])){
      $conteudo = NULL;
    }else{
      $inputImagem = $_FILES['inputImagem']['tmp_name'];
      $imagem = fopen($inputImagem, "r");
      $conteudo = fread($imagem, filesize($inputImagem));
    }
    $stmt  = odbc_prepare($db, "UPDATE
                                Produto
                                SET
                                nomeProduto=?,
                                precProduto=?,
                                qtdMinEstoque=?,
                                descontoPromocao=?,
                                idCategoria=?,
                                ativoProduto=?,
                                descProduto=?,
                                imagem=?
                                WHERE
                                idProduto=?");

    $resut = odbc_execute($stmt,array($inputProduto, $inputPreco, $inputEstoque, $inputDesconto, $inputCategoria,$inputAtivo, $inputDescricao, $conteudo, $idProduto));

    if(!odbc_errormsg($db)) $msgUsuario = "Produto foi editado com sucesso.";
    else $msgUsuario = "Erro ao tentar editar novo produto.";

    if(isset($imagem)) fclose($imagem);
	} // Fim da ação btnAtualizar

  if(isset($_POST['btn-search'])){
    $search = '%'.$_POST['search'].'%';

    $searchConsulta = odbc_exec($db, "SELECT P.idProduto,
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
                                ON P.idUsuario = U.idUsuario
                              WHERE nomeProduto LIKE '$search'");

    $counter = 0;
    while ($result = odbc_fetch_array($searchConsulta)) {
      // Passando cada campo do array uma categorias.
      $produtos[$counter] = $result;
      $counter++;
    }
    include('list-product.tpl.php');
    exit;
  } /* -- btn-search -- */

  if(isset($_POST['btn-filter'])){
    if(isset($_POST['filter-category'])) $filterCategoria = $_POST['filter-category'];
    else $filterCategoria = NULL;

    if(isset($_POST['filter-ativo'])) $filterAtivo = $_POST['filter-ativo'];
    else $filterAtivo = NULL;

    if(isset($filterCategoria) && isset($filterAtivo)){
      $searchConsulta = odbc_exec($db, "SELECT P.idProduto,
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
                                  ON P.idUsuario = U.idUsuario
                                WHERE P.idCategoria LIKE '$filterCategoria'
                                AND   P.ativoProduto LIKE '$filterAtivo'");
    }else{
      $searchConsulta = odbc_exec($db, "SELECT P.idProduto,
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
                                  ON P.idUsuario = U.idUsuario
                                WHERE P.ativoProduto LIKE '$filterAtivo'");
    }
    $counter = 0;
    while ($result = odbc_fetch_array($searchConsulta)) {
      // Passando cada campo do array uma categorias.
      $produtos[$counter] = $result;
      $counter++;
    }
    include('list-product.tpl.php');
    exit;
  } /* -- btn-search -- */

  // Listando os produtos na página.
  include('../../dataBase/queries/query-full-product.php');
  include('list-product.tpl.php');
}
?>
