<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/table.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-submenu page-information">
  <div class="box-info">
    <h1>Listagem de Produtos</h1>
  </div>
  <!-- Adicionar novo Produto -->
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="?acao=incluir">Adicionar Produto</a></h3>
    </button>
  </div>

  <!-- Filtrar a listagem por categoria e/ou produtos ativos -->
  <form action="../product/" method="POST" enctype="multipart/form-data">
  <div class="box-select">
    <span class="select">
      <select name="filter-category">
        <option value disabled selected>Categoria</option>
        <?php
          $consulta = odbc_exec($db, "SELECT nomeCategoria, idCategoria FROM Categoria");
            while ($r = odbc_fetch_array($consulta))
              echo '<option value="'.$r['idCategoria'].'">'.$r['nomeCategoria'].'</option>';
        ?>
        </select>
        <select name="filter-ativo">
          <option value="1">Ativado</option>
          <option value="0">Desativado</option>
        </select>
        <button type="submit" name="btn-filter" class="btn-filter">Filtrar</button>
      </span>
    </div>
  </form>

  <!-- Filtrar a listagem por categoria e/ou produtos ativos -->
  <form action="../product/" method="POST">
    <div class="box-search">
      <div class="box-unity">
        <input type="search" name="search" class="search">
        <button type="submit" name="btn-search" class="btn-search">
          <img src="../../images/icon/icon-search.png" class="icon-search">
        </button>
      </div>
    </div>
  </form>
</section>

<!-- MENSAGENS DE ERROS -->
<?php
  if(isset($msgUsuario)){
    echo "<section class='message-user'>
            <h5 class='msgUsuario'>$msgUsuario</h5>
          </section>";
  }
?>

<!-- LISTAGEM DAS CATEGORIAS DO BANCO DE DADOS -->
<div class="container-table">
  <div class="table">
    <div class="row">
      <div class="cell-product"><p>ID</p></div>
      <div class="cell-product"><p>Imagem</p></div>
      <div class="cell-product"><p>Nome</p></div>
      <div class="cell-product"><p>Descri&ccedil;&atilde;o</p></div>
      <div class="cell-product"><p>Pre&ccedil;o</p></div>
      <div class="cell-product"><p>Promo&ccedil;&atilde;o</p></div>
      <div class="cell-product"><p>Quantidade</p></div>
      <div class="cell-product"><p>Categoria</p></div>
      <div class="cell-product"><p>Situa&ccedil;&atilde;o</p></div>
      <div class="cell-product"><p>Usu&aacute;rio</p></div>
      <div class="cell-product"><p>A&ccedil;&otilde;es</p></div>
    </div>
    <?php
    foreach($produtos as $produto){
      if($produto['ativoProduto'] == "1") $produtoAtivo = "Ativo";
      else $produtoAtivo = "Desativado";

      $conteudo_base64 = base64_encode($produto['imagem']);
      echo "
            <div class='row'>
            <div class='cell-product'><p class='position'>{$produto['idProduto']}</p></div>
              <div class='cell-product'><p><img class='img-product' src='data:image/jpeg;base64,$conteudo_base64'></p></div>
              <div class='cell-product'><p>".utf8_encode($produto['nomeProduto'])."</p></div>
              <div class='cell-product'><p>".utf8_encode($produto['descProduto'])."</p></div>
              <div class='cell-product'><p>{$produto['precProduto']}</p></div>
              <div class='cell-product'><p>{$produto['descontoPromocao']}</p></div>
              <div class='cell-product'><p>{$produto['qtdMinEstoque']}</p></div>
              <div class='cell-product'><p>".utf8_encode($produto['nomeCategoria'])."</p></div>
              <div class='cell-product'><p>{$produtoAtivo}</p></div>
              <div class='cell-product'><p>{$produto['nomeUsuario']}</p></div>
              <div class='cell-product'>
                <a href='?acao=editar&id={$produto['idProduto']}'>
                  <img alt='editar' src='../../images/icon/editar.png'/>
                </a>
                <a href='?acao=excluir&id={$produto['idProduto']}'>
                  <img alt='excluir' src='../../images/icon/excluir.png'/>
                </a>
              </div>
            </div>";
    } // Fim foreach
    ?>
  </div> <!-- Fim table -->
</div> <!-- Fim container-table -->

<?php include ('../default-page/index.footer.php'); ?>
