<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/form.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-submenu page-information">
  <div class="box-info">
    <h1>Adicionar Usuário</h1>
  </div>
  <!-- Adicionar novo Produto -->
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="../user/">Voltar aos usuários</a></h3>
    </button>
  </div>
 </section>

<!-- Formulário para cadastro de um novo usuário -->
<form method="post" action="../user/">
	<div class="form-box">
    <!-- Campo para adicionar o nome do usuário -->
		<div class="campo">
			<label class="label-box">Nome:</label>
			<input type="text" name="inputNome" style="width: 17em">
		</div>
    <!-- Campo para adicionar e-mail -->
		<div class="campo">
			<label class="label-box">E-mail:</label>
			<input type="email" name="inputLogin" style="width: 17em">
		</div>
    <!-- Campo para adicionar a senha -->
		<div class="campo">
			<label class="label-box">Senha:</label>
			<input type="password" name="inputSenha" style="width: 17em">
		</div>
    <!-- Campo para adicionar o tipo -->
		<div class="campo">
			<label class="label-box">Perfil:</label>
			<select name="inputPerfil">
				<option value="A"> Administrador </option>
				<option value="C"> Cliente </option>
			</select>
		</div>
    <!-- Campo para adicionar ativado ou desativado -->
    <!-- Como padrão, já vai ativado -->
		<div class="campo">
			<label class="label-box">Ativo:</label>
			<input type="checkbox" name="inputAtivo" checked>
		</div>
    <!-- Campo para adicionar enviar os dados -->
		<div class="campo">
			<button type="submit" name="btnNovoUsuario">Gravar</button>
		</div>
	</div>
</form>

<?php include ('../default-page/index.footer.php'); ?>
