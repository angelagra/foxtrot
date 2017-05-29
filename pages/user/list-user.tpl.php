<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/table.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-information page-submenu">
  <h1>Listagem de Usuário</h1>
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="?acao=incluir">Adicionar Usuário</a></h3>
    </button>
  </div>
</section>

<!-- MENSAGENS DE ERROS -->
<?php /* mensagens de Erros ou Sucesso */
  if(isset($msgUsuario)){
    echo "<section class='message-user'><h5 class='msgUsuario'>$msgUsuario</h5></section>";
  }
?>

<!-- LISTAGEM DAS CATEGORIAS DO BANCO DE DADOS -->
<div class="container-table">
	<div class="table">
		<div class="row">
			<div class="cell-user"><p>ID Usuario</p></div>
			<div class="cell-user"><p>Nome</p></div>
			<div class="cell-user"><p>Login</p></div>
			<div class="cell-user"><p>Perfil</p></div>
			<div class="cell-user"><p>Situação</p></div>
			<div class="cell-user"><p>Ações</p></div>
		</div>
		<?php
		foreach($usuarios as $usuario){
      if($usuario['usuarioAtivo'] == "1") $usuarioAtivo = "Ativo";
      else $usuarioAtivo = "Desativado";

      if($usuario['tipoPerfil'] == "A") $tipoPerfil = "Administrador";
      elseif($usuario['tipoPerfil'] == "C") $tipoPerfil = "Usuário";
      else $tipoPerfil = "Sem Perfil";
			echo "
          <div class='row'>
            <div class='cell-user'><p>{$usuario['idUsuario']}</p></div>
            <div class='cell-user'><p>{$usuario['nomeUsuario']}</p></div>
            <div class='cell-user'><p>{$usuario['loginUsuario']}</p></div>
            <div class='cell-user'><p>{$tipoPerfil}</p></div>
            <div class='cell-user'><p>{$usuarioAtivo}</p></div>
            <div class='cell-user'>
              <a href='?acao=editar&id={$usuario['idUsuario']}'>
                <img alt='excluir' src='../../images/icon/editar.png'/>
              </a>
              <a href='?acao=excluir&id={$usuario['idUsuario']}'>
                <img alt='excluir' src='../../images/icon/excluir.png'/>
              </a>
            </div>
          </div>
         ";
		} // Fim foreach
		?>
	</div> <!-- Fim table -->
</div> <!-- Fim container-table -->

<?php include ('../default-page/index.footer.php'); ?>
