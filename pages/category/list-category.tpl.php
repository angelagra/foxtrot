<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/table.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-information page-submenu">
  <div class="box-info">
    <h1>Listagem de Categorias</h1>
  </div>
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="?acao=incluir">Adicionar Categoria</a></h3>
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
      <div class="cell-category"><p> Categorias </p></div>
      <div class="cell-category"><p> Descri&ccedil;&otilde;es </p></div>
      <div class="cell-category"><p> A&ccedil;&otilde;es </p></div>
    </div>
  <?php
  foreach ($categorias as $categoria) {
    echo "<div class='row'>
            <div class='cell-category'><p>".utf8_encode($categoria['nomeCategoria'])."</p></div>
            <div class='cell-category'><p>".utf8_encode($categoria['descCategoria'])."</p></div>
            <div class='cell-category'>
              <a href='?acao=editar&id={$categoria['idCategoria']}'>
                <img src='../../images/icon/editar.png'/>
              </a>
              <a href='?acao=excluir&id={$categoria['idCategoria']}'>
                <img src='../../images/icon/excluir.png'/>
              </a>
            </div>
          </div>";
       }
  ?>
  </div> <!-- Fim table -->
</div> <!-- Fim container-table -->

<?php include ('../default-page/index.footer.php'); ?>
