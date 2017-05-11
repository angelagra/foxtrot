<?php
	include('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/formularios.css">
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

<section>
      <h1>Editar Produto</h1>
      <h3><a href="../produto">Voltar</a></h3>
 </section>

<form method="post" action="../produto" id="frm"><br><br>

	<fieldset  class="grupo">
		<div class="campo">
			<label>Nome do produto:</label>
			<input type = "text" name="nomeP" value="<?php echo $array_produto['nomeProduto']; ?>"><br><br>
		</div>

		<div class="campo">
		  <label>Descrição:</label>
		  <input type="text" name="desc" value="<?php echo $array_produto['descProduto']; ?>"><br><br>
		</div>

		<div class="campo">
		  <label>Preço:</label>
		  <input type="text" name="preco" value="<?php echo $array_produto['prec']; ?>"><br><br>
		</div>

		<div class="campo">
			<label>Quantidade no estoque:</label>
			<input type="text" name="qntEstoque"><br><br>
		</div>

		<div class="campo">
			<label>Desconto:</label>
			<input type="text" name="desconto" value=" "><br><br>
		</div>

		<div class="campo">
	  		<label>Categoria:</label> 
	  		<select name="cat">

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
		</div>

		<div class="campo">
			<label>Ativo:</label>

			<?php
			if($array_produto['ativoProduto'] == 1){
				echo '<input type="checkbox" name="ativo" checked>';
			}else{
				echo '<input type="checkbox" name="ativo">';
			}
			?>
			<input type="hidden" name="id" value="<?php echo $array_produto['idProduto']; ?>">
			<input type="hidden" name="acao" value="editar"><br><br>
		</div>

		<div class="campo">
			<label>Inserir imagem:</label> 
			<input type="file" name="arquivo"><br><br>
		</div>	

		<div class="campo">
			<button type="submit" name="btnGravarProduto">Gravar</button>
		</div>
	</fieldset>
</form>

<?php
	include('../menu/index.footer.tpl.php');
?>
