<?php
// Muda configura?o do PHP para trabalhar com imagens no DB
ini_set ('odbc.defaultlrl', 9000000);
set_time_limit(0); // Carregar IMG

// Verifica?o de acesso do usu?io!
include('../../dataBase/authentication/access.php');
include('../../dataBase/connect/index.php');

// Esperando a?o via GET ou POST do Usu?io.
if(isset($_REQUEST['acao'])){
  $acao = $_REQUEST['acao'];
  // Criando condi?es para as a?es
  switch ($acao) {
    // INCLUIR NOVO PRODUTO --------------------------------------------------
    // -----------------------------------------------------------------------
    case 'incluir':
      $msgUsuario = "Aten&ccedil;&atilde;o! Todos os campos devem ser preenchidos";
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
      $msgUsuario = "Aten&ccedil;&atilde;o! Todos os campos devem ser preenchidos";
      // Verificando id se existe ou n? (passando Nulo caso n? exista).
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
    // MENSAGEM PADR? -------------------------------------------------------
    // -----------------------------------------------------------------------
    default:
      $msgUsuario = "A a&ccedil;&atilde;o escolhida n&atilde;o &eacute; v&aacute;lida!";
      include('../../dataBase/queries/query-full-product.php');
      include('list-product.tpl.php');
  } /* -- FIM DO SWITCH -- */
}else{

  // CADASTRAR NOVO PRODUTOS --------------------------------------------------
	// --------------------------------------------------------------------------
  if(isset($_POST['btnNovoProduto'])){
		if($_POST['inputProduto'] != NULL && 
       $_POST['inputPreco'] != NULL && 
       $_POST['inputEstoque'] != NULL && 
       $_POST['inputDesconto'] != NULL && 
       $_POST['inputCategoria'] != NULL && 
       $_POST['inputDescricao'] != NULL && 
       $_FILES['inputImagem'] != NULL){
      // Tratando informa?e do formul?io para uma vare?el
      $padroes = "/[^a-zA-Z0-9 ]+/";
      $padroesInteiro = "/[^0-9.,]+/";
      $substituicao = "";
      // Tratando inputs para salvar no Banco de Dados...
      $inputProduto   = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputProduto']))));
      $inputPreco     = preg_replace($padroesInteiro, $substituicao, $_POST['inputPreco']);
      $inputEstoque   = preg_replace($padroesInteiro, $substituicao, $_POST['inputEstoque']);
      $inputDesconto  = preg_replace($padroesInteiro, $substituicao, $_POST['inputDesconto']);
      $inputCategoria = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputCategoria']))));
      $inputDescricao = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputDescricao']))));
      $inputAtivo     = !isset($_POST['inputAtivo']) ? 0 : 1; //Pega a ativa?o
      // Tratando a Imagem.
      $inputImagem = $_FILES['inputImagem']['tmp_name'];
      $imagem = fopen($inputImagem, "rb");
      $conteudo = fread($imagem, filesize($inputImagem));
      
      // Efetuando cadastro da NOVO PRODUTO ----------------------------
      $sql =  "INSERT INTO Produto
                                (nomeProduto,
                                 precProduto,
                                 idCategoria,
                                 ativoProduto,
                                 qtdMinEstoque,
                                 descontoPromocao,
                                 descProduto,
                                 imagem)
                                VALUES
                                 (?,?,?,?,?,?,?,?)";
      $prepare = odbc_prepare($db, $sql);
      $parametro = array($inputProduto, $inputPreco, $inputCategoria, $inputAtivo, $inputEstoque,
        $inputDesconto, $inputDescricao, $conteudo);
 

      if($resposta = odbc_execute($prepare, $parametro)){ 
        $msgUsuario = "Produto foi cadastrado com sucesso.";
      }else{
        $msgUsuario = "Erro ao tentar cadastrar novo produto.";
      }

      }else{
        $msgUsuario = "Por favor, Preencher todos os Campos";
        include('new-product.tpl.php');
        exit;
      }    
    } // Fim da a?o btnNovoProduto

  // ATUALIZAR NOVO PRODUTOS -------------------------------------------------
	// -------------------------------------------------------------------------
	if(isset($_POST['btnGravarProduto'])){
    if($_POST['inputProduto'] != NULL && 
       $_POST['inputPreco'] != NULL && 
       $_POST['inputEstoque'] != NULL && 
       $_POST['inputDesconto'] != NULL && 
       $_POST['inputCategoria'] != NULL && 
       $_POST['inputDescricao'] != NULL){
  		// Tratando informa?e do formul?io para uma vare?el
  		$padroes = "/[^a-zA-Z0-9 ]+/";
  		$padroesInteiro = "/[^0-9.,]+/";
  		$substituicao = "";

  		// Tratando inputs para salvar no Banco de Dados...
  		$inputProduto		= utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputProduto']))));
  		$inputPreco 		= preg_replace($padroesInteiro, $substituicao, $_POST['inputPreco']);
  		$inputEstoque 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputEstoque']);
  		$inputDesconto 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputDesconto']);
  		$inputCategoria = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputCategoria']))));
  		$inputDescricao = utf8_decode(str_replace(';', '', str_replace("'", '', str_replace('"', '', $_POST['inputDescricao']))));
  		$idProduto 			= preg_replace($padroesInteiro, $substituicao, $_POST['btnGravarProduto']);
  		$inputAtivo     = !isset($_POST['inputAtivo']) ? 0 : 1; // Pega a ativa?o
      // Tratando a Imagem.
      if(empty($_FILES['inputImagem']['tmp_name'])){
        $query_produto = odbc_exec($db, 'SELECT imagem
                                         FROM  Produto
                                         WHERE idProduto = '.$_POST['btnGravarProduto']);

        $array_produto = odbc_fetch_array($query_produto);
        $conteudo = $array_produto['imagem'];
      }else{
        $inputImagem = $_FILES['inputImagem']['tmp_name'];
        $imagem = fopen($inputImagem, "rb");
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

        if(isset($resut)) 
          $msgUsuario = "Produto foi atualizado com sucesso.";
        else 
          $msgUsuario = "Erro ao tentar atualizar novo produto.";

        if(!empty($_FILES['inputImagem']['tmp_name'])){
          fclose($imagem);
        }

    }else{
      $msgUsuario = "Por favor, Preencher todos os Campos";
      $query_produto = odbc_exec($db, 'SELECT
                                             idProduto, nomeProduto,
                                             descProduto, precProduto,
                                             descontoPromocao, idCategoria,
                                             ativoProduto, idUsuario,
                                             qtdMinEstoque, imagem
                                       FROM  Produto
                                       WHERE idProduto = '.$_POST['btnGravarProduto']);

      $array_produto = odbc_fetch_array($query_produto);

      include('edit-product.tpl.php');
      exit;
    } 
	} // Fim da a?o btnAtualizar


  // PROCURAR PRODUTOS -------------------------------------------------------
  // -------------------------------------------------------------------------
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

    if(isset($searchConsulta)){
      $counter = 0;
      while ($result = odbc_fetch_array($searchConsulta)) {
        // Passando cada campo do array uma categorias.
        $produtos[$counter] = $result;
        $counter++;
      }

      if(isset($produtos)){
        include('list-product.tpl.php');
        exit;
      }else{
        // Listando os produtos na p?ina.
        $msgUsuario = "Nenhum produto encontrado !";
        include('../../dataBase/queries/query-full-product.php');
        include('list-product.tpl.php');
        exit;
      }
    }
  }/* -- btn-search -- */


  // FILTRAR PRODUTOS --------------------------------------------------------
  // -------------------------------------------------------------------------
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

    if(isset($searchConsulta)){
      $counter = 0;
      while ($result = odbc_fetch_array($searchConsulta)) {
        // Passando cada campo do array uma categorias.
        $produtos[$counter] = $result;
        $counter++;
      }

      if(isset($produtos)){
        include('list-product.tpl.php');
        exit;
      }else{
        // Listando os produtos na p?ina.
      $msgUsuario = "Nenhum produto encontrado !";
       include('../../dataBase/queries/query-full-product.php');
       include('list-product.tpl.php');
       exit;
      }
    }
  } /* -- btn-filter -- */

  // Listando os produtos na p?ina.
  include('../../dataBase/queries/query-full-product.php');
  include('list-product.tpl.php');
}
?>
