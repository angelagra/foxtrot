<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');

if(isset($erro)){
	include('../mensagem/msgErro.html');
}
if(isset($msg)){
	include('../mensagem/msgSucesso.html');
}
?>
<link rel="stylesheet" href="../estilo/formularios.css">

<section>
    <h1>Editar Usuario</h1>
    <h3><a href="../usuario">Voltar</a></h3>
</section>

<form method="post" action="../usuario/" name="form"><br><br>
	<fieldset class="grupo">
		
		<div class="campo">
			<label>Nome:</label> 
			<input type="text" name="nome" value="<?php echo $array_usuario['nomeUsuario']; ?>"><br><br>
		</div>

		<div class="campo">
		<label>E-mail:</label> 
		<input type="email" name="login" value="<?php echo $array_usuario['loginUsuario']; ?>"><br><br>
		</div>

		<div class="campo">
		<label>Senha:</label> 
		<input type="password" name="senha"><br><br>
		</div>

		<div class="campo">
		<label>Perfil:</label>	
		<select name="perfil">
			<?php
			if($array_usuario['tipoPerfil'] == 'A'){
				echo '<option value="A" selected>
						Administrador
						</option>
						<option value="C">
						Cliente
						</option>';
			}else{
				echo '<option value="A">
						Administrador
						</option>
						<option value="C" selected>
						Cliente
						</option>';
			}
			?>
		</select><br><br>
		</div>

		<div class="campo">
		<label>Ativo:</label>
			<?php
			if($array_usuario['usuarioAtivo'] == 1){
				echo '<input type="checkbox" name="ativo" checked>';
			}else{
				echo '<input type="checkbox" name="ativo">';
			}
			?>
			<input type="hidden" name="id" value="<?php echo $array_usuario['idUsuario']; ?>">
			<input type="hidden" name="acao" value="editar">
			<br><br>
		</div>

		<div class="campo">
		<button type="submit" name="btnGravarUsuario">Atualizar</button>
		</div>
	</fieldset>
</form>

<?php
include('../menu/index.footer.tpl.php');
?>