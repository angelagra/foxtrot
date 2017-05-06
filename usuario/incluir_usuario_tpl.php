<?php
	include('../menu/index.head.tpl.php');
?>
	<!-- passar o caminha para o estilo do formulário -->
<?php
	include('../menu/index.body.tpl.php');
?>

<form method="post" action="../usuario/">
	Nome:   <input type="text" name="nome">
	E-mail: <input type="email" name="login">
	Senha:  <input type="password" name="senha">

	Perfil:	<select name="perfil">
						<option value="A"> Administrador </option>
						<option value="C"> Cliente </option>
					</select>

	Ativo: <input type="checkbox" name="ativo" checked>

	<input type="submit" value="Gravar" name="btnNovoUsuario">
</form>

<?php
	include('../menu/index.footer.tpl.php');
?>
