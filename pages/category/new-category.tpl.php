<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/form.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-submenu page-information">
  <div class="box-info">
    <h1>Nova Categoria</h1>
  </div>
  <!-- Adicionar novo Produto -->
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="../category/">Voltar para Categoria</a></h3>
    </button>
  </div>
 </section>

<!-- Formulário para cadastro de uma nova categoria -->
<form method="post" action="../category/" name="form">
  <div class="form-box">
    <!-- Campo para adicionar o nome da Categoria -->
    <div class="campo">
      <label class="label-box">Categoria:</label>
      <input type="text" name="inputCategoria" placeholder="Nome da categoria (50 Caracteres)">
    </div>
    <!-- Campo para adicionar uma breve descrição da categoria -->
    <div class="campo">
      <label class="label-box">Descri&ccedil;&atilde;o:</label>
      <textarea name="inputDescricao" rows="10" style="width: 30%" placeholder="Digite uma breve descri&ccedil;&atilde;o sobre a categoria (100 Caracteres)"></textarea>
    </div>
    <!-- Botão para validar os campos acima no banco de dados -->
    <div class="campo">
      <button type="submit" name="bntSalvar">Salvar</button>
    </div>
  </div>
</form>

<?php include ('../default-page/index.footer.php'); ?>
