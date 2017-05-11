<?php
	include('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/formulario.css">
  <!-- passar o caminha para o estilo do formulário -->
<?php
	include('../menu/index.body.tpl.php');
	if(isset($erro)){
     echo "<center><font color='red'> $erro </font></center>";
   }
	if(isset($msg)) {
    	echo"<center><font color = 'green'> $msg </font></center>";
    }
?>

<form method="post" action="../produto" id="frm"><br><br>

	<div class="campo">
		<label>Nome do produto:</label>
		<input type = "text" name="nomeP" value="<?php echo $array_produto['nomeProduto']; ?>"><br><br>
	</div>
	
  Descrição:<input type="text" name="desc"
	value="<?php echo $array_produto['desc']; ?>"><br><br>

  Preço:<input type="text" name="preco"
	value="<?php echo $array_produto['prec']; ?>"><br><br>

	Quantidade no estoque:<input type="text" name="qntEstoque"><br><br>
	Desconto: <input type="text" name="desconto" value=""><br><br>

  Categoria: <select name="cat">

				<?php
				if($array_produto['idCategoria'] == 'A'){
					echo '<option value="A" selected>
							Categoria 1
						  </option>
						  <option value="B">
						    Categoria 2
						  </option>;
              <option value="C">
						    Categoria 3
						  </option>;
              <option value="D">
						    Categiria 4
						  </option>';
				} elseif($array_produto['idCategoria'] == 'B') {
          echo '<option value="A">
							Categoria 1
						  </option>
						  <option value="B" selected>
						    Categoria 2
						  </option>;
              <option value="C">
						    Categoria 3
						  </option>;
              <option value="D">
						    Categiria 4
						  </option>';
				} elseif($array_produto['idCategoria'] == 'C') {
          echo '<option value="A">
							Categoria 1
						  </option>
						  <option value="B">
						    Categoria 2
						  </option>;
              <option value="C" selected>
						    Categoria 3
						  </option>;
              <option value="D">
						    Categiria 4
						  </option>';
				} elseif($array_produto['idCategoria'] == 'D') {
          echo '<option value="A">
							Categoria 1
						  </option>
						  <option value="B" >
						    Categoria 2
						  </option>;
              <option value="C">
						    Categoria 3
						  </option>;
              <option value="D" selected>
						    Categiria 4
						  </option>';
				}
				?>

			</select><br><br>

	Ativo:

				<?php
				if($array_produto['ativoProduto'] == 1){
					echo '<input type="checkbox" name="ativo" checked>';
				}else{
					echo '<input type="checkbox" name="ativo">';
				}
				?>
			<input type="hidden" name="id" value="<?php echo $array_produto['idProduto']; ?>">
			<input type="hidden" name="acao" value="editar">
		<br><br>

		Inserir imagem: <input type="file" name="arquivo"><br><br>
		
	<input type="submit" value="Gravar" name="btnGravarProduto">
</form>

<?php
	include('../menu/index.footer.tpl.php');
?>
