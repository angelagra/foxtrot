<?php
	include('../menu/index.head.tpl.php');
?>
	  <link rel="stylesheet" href="../estilo/formulario.css">
<?php
	include('../menu/index.body.tpl.php');
?>
<form method="post" action="../usuario/" id="frm">
	Nome:   <input type="text" name="nmProduto"><br><br>
	Descrição: <input type="text" name="desc"><br><br>
	Preço:  <input type="text" name="preco"><br><br>
  Quantidade no estoque: <input type="text" name="qntEstoque"><br><br>
  Desconto/Promoção: <input type="text" name="desconto" value=""><br><br>

	Categoria:	<select name="cat">
								<option value="A"> Categoria 1 </option>
								<option value="B"> Categoria 2 </option>
            		<option value="C"> Categoria 3 </option>
            		<option value="D"> Categoria 4 </option>
							</select><br><br>

Inserir imagem: <input type="file" name="arquivo"><br><br>

	Ativo: <input type="checkbox" name="ativo" checked><br><br>

	<input type="submit" value="Gravar" name="btnNovoProduto">
</form>

<?php
	include('../menu/index.footer.tpl.php');
?>
