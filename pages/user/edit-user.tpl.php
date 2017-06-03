<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/form.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-submenu page-information">
  <div class="box-info">
    <h1>Editar Usuário</h1>
  </div>
  <!-- Adicionar novo Produto -->
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="../user/">Voltar aos usuários</a></h3>
    </button>
  </div>
 </section>

<form method="post" action="../user/" name="form">
	<div class="form-box">
		<div class="campo">
			<label class="label-box">Nome:</label>
			<input type="text" name="inputNome" value="<?php echo $array_usuario['nomeUsuario']; ?>">
		</div>

		<div class="campo">
		<label class="label-box">E-mail:</label>
		<input type="email" name="inputLogin" value="<?php echo $array_usuario['loginUsuario']; ?>">
		</div>

		<div class="campo">
		<label class="label-box">Senha:</label>
		<input type="password" name="inputSenha">
		</div>

		<div class="campo">
		<label class="label-box">Perfil:</label>
		<select name="inputPerfil">
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
		</select>
		</div>

		<div class="campo">
		<label class="label-box">Ativo:</label>
			<?php
			if($array_usuario['usuarioAtivo'] == 1) echo '<input type="checkbox" name="inputAtivo" checked>';
      else echo '<input type="checkbox" name="inputAtivo">';
			?>
		</div>

		<div class="campo">
		<button type="submit" name="btnGravarUsuario" value="<?php echo $array_usuario['idUsuario']; ?>">Atualizar</button>
		</div>
	</div>
</form>

<?php include ('../default-page/index.footer.php'); ?>
