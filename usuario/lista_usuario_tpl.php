<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela.css">
<?php
  include ('../menu/index.body.tpl.php');
?>
  <section>
      <h1>Listagem de Usuário</h1>
  </section>

	<!-- Gerando uma tabela com as informações sobre Usuários do Banco -->
	<div class="tabela-Categoria">
			<table>
				<tr>
					<td>ID Usuario</td>
					<td>Login</td>
					<td>Nome</td>
					<td>Perfil</td>
					<td>Ativo</td>
					<td colspan="2" align="center">
						<a href="?acao=incluir">
							<font color="green"> + Novo Usuario </font>
						</a>
					</td>
				</tr>
				<?php
				foreach($usuarios as $usuario){
					echo "<tr>
									<td>{$usuario['idUsuario']}</td>
									<td>{$usuario['loginUsuario']}</td>
									<td>{$usuario['nomeUsuario']}</td>
									<td>{$usuario['tipoPerfil']}</td>
									<td>{$usuario['usuarioAtivo']}</td>
									<td>
										<a href='?acao=editar&id={$usuario['idUsuario']}'> Editar </a>
									</td>
									<td>
										<a href='?acao=excluir&id={$usuario['idUsuario']}'> Excluir </a>
									</td>
								</tr>";
				} // Fim foreach
				?>
			</table>
		</div> <!-- Fim tabela-Categoria -->

<?php
  include ('../menu/index.head.tpl.php');
?>
