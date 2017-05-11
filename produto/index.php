<?php
set_time_limit(0);
include('../db/index.php');
include('../autenticacao/controleAcesso.php');

if(isset($_REQUEST['acao'])){ // Esperando qualquer ação via GET ou POST
	$acao = $_REQUEST['acao'];

	switch($acao){
		// -------------------------------------------------------------------------
		case "incluir":
			// Cadastrar um novo produto.

			//Insere um novo produto
			if(isset($_POST['btnNovoProduto'])){
				//Pega o nome
				$nomeP = $_POST['nmProduto'];

				//Pega a descrição
				$descricao = $_POST['desc'];

				//Pega e trata o preço
				$prec = is_numeric($_POST['prec']) ? $_POST['prec'] : header('Location: ../produto/incluir_produto_tpl.php');

				//Pega e trata a quantidade no estoque
				$quant = is_numeric($_POST['qntEstoque']) ? $_POST['qntEstoque'] : header('Location: ../produto/incluir_produto_tpl.php');

				//Pega e trata desconto
				$descont = is_numeric($_POST['desconto']) ? $_POST['desconto'] : header('Location: ../produto/incluir_produto_tpl.php');

				//Pega e trata categoria
				switch($_POST['cat']) {
					case "A":
							$categoria = $_POST['A'];
							break;
					case "B":
							$categoria = $_POST['B'];
							break;
					case "C":
							$categoria = $_POST['C'];
							break;
					case "D";
							$categoria = $_POST['D'];
							break;
					default:
						echo "Insira uma categoria";
						header('Location: ../produto/incluir_produto_tpl.php');
				}

				//Pega a ativação
				$_POST['ativo'] =
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;

        //Trata imagem
        $conteudo = $_FILE['arquivo'];
        $img = base64_decode($conteudo);


				if(odbc_exec($db, "	INSERT INTO
										Produto
										(nomeProduto,
										descProduto,
										precProduto,
										descontoPromocao,
										idCategoria,
										ativoProduto,
										idUsuario,
										qtdMinEstoque,
                    imagem
										)
									VALUES
										('$nomeP',
										 '$descricao',
										 '$prec',
										 '$descont',
										 '$categoria',
										 '$usuario',
										 '$ativ',
									 	 '$quant',
                     '$img')")){
					$msg = "Produto gravado com sucesso";
				}else{
					$erro = "Erro ao gravar o produto";
				}
			}

			$q = odbc_exec($db, 'SELECT
                            idProduto,
														nomeProduto,
														descProduto,
														precProduto,
														descontoPromocao,
														idCategoria,
														qtdMinEstoque,
														ativoProduto,
                            imagem
												FROM
														Produto');
			$i = 0;
			while($r = odbc_fetch_array($q)) {
				$produtos[$i] = $r;
				$i++;
			}

			include('incluir_produto_tpl.php');

			break;
		// -------------------------------------------------------------------------
		case 'excluir':
			// Verificando se o ID enviado é um número
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "DELETE FROM Produto
																WHERE idProduto = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						// odbc_num_rows() retorna o número de linhas afetadas
						$msg = "Produto excluido com sucesso";
					}else{
						$erro = "Produto não existe";
					}
				}else{
					$erro = "Erro ao excluir produto";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}

			$q = odbc_exec($db, "SELECT
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									descontoPromocao,
                  idCategoria,
                  ativoProduto,
                  idUsuario,
                  qtdMinEstoque,
                  imagem
								FROM
									Produto");
			$i = 0;
			while($r = odbc_fetch_array($q)){
				$produtos[$i] = $r;
				$i++;
			}
			include('lista_produto_tpl.php');

			break;
		// -------------------------------------------------------------------------
		case 'editar':

		//Edita o produto
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';

			if(isset($_POST['btnGravarProduto'])){

				//Pega e trata categoria
				switch($_POST['cat']) {
					case "A":
							$categoria = $_POST['A'];
							break;
					case "B":
							$categoria = $_POST['B'];
							break;
					case "C":
							$categoria = $_POST['C'];
							break;
					case "D";
							$categoria = $_POST['D'];
							break;
					default:
						echo "Insira uma categoria";
						header('Location: ../produto/incluir_produto_tpl.php');
				}

				//Pega a ativação
				$_POST['ativo'] =
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativ = (bool) $_POST['ativo'];
				$ativ = $ativ === true ? 1 : 0;

        //Trata imagem
        $conteudo = $_FILE['arquivo'];
        $img = base64_decode($conteudo);

				if(odbc_exec($db, '	UPDATE
										Produto
									SET
										idProduto,
										nomeProduto = "$nomeP",
										descProduto = "$descricao",
										precProduto = "$prec",
										descontoPromocao = "$descont",
										idCategoria = "$categoria",
										ativoProduto = "$ativ",
										idUsuario = "$usuario",
										qtdMinEstoque = "$quant",
										imagem = "$img"
									WHERE
										idProduto = $idProduto')){
					$msg = "Produto gravado com sucesso";
				}else{
					$erro = "Erro ao gravar o produto";
				}
			}

			$query_produto = odbc_exec($db, "SELECT
											idProduto,
											nomeProduto,
								 			descProduto,
											precProduto,
											descontoPromocao,
                 							idCategoria,
                							ativoProduto,
                							idUsuario,
                							qtdMinEstoque
											FROM
											Produto
											WHERE
											idProduto = '$idProduto'");

			$array_produto = odbc_fetch_array($query_produto);

			include('editar_produto_tpl.php');

			break;

		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}

}else{

	$q = odbc_exec($db, "SELECT
                        idProduto,
											  nomeProduto,
												descProduto,
												precProduto,
												descontoPromocao,
												idCategoria,
												qtdMinEstoque,
												ativoProduto,
                        idUsuario,
                        imagem
										FROM
												Produto");
	$i = 0;
	while($r = odbc_fetch_array($q)) {
		$produtos[$i] = $r;
		$i++;
	}
	include('lista_produto_tpl.php');
}
?>
