<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/form.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-submenu page-information">
  <div class="box-info">
    <h1>Editar Categoria</h1>
  </div>
  <!-- Adicionar novo Produto -->
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="../category/">Voltar para categoria</a></h3>
    </button>
  </div>
 </section>


<!-- Formulário para atualização de uma categoria -->
<form method="post" action="../category/" name="form"><br><br>
  <div class="form-box">
    <!-- Campo para adicionar o nome da Categoria -->
    <div class="campo">
      <label class="label-box">Categoria:</label>
      <input type="text" name="inputCategoria" value="<?php echo utf8_encode($arryCategoria['nomeCategoria']);?>">
    </div>
    <!-- Campo para adicionar uma breve descrição da categoria -->
    <div class="campo">
      <label class="label-box">Descri&ccedil;&atilde;o:</label>
      <textarea type="text" name="inputDescricao" rows="10" style="width: 30%" value="<?php echo utf8_encode($arryCategoria['descCategoria']);?>"></textarea>
    </div>
    <!-- Botão para validar os campos acima no banco de dados -->
    <!--
      Passamos a informação do idCategoria como valor do botão para não perder o dado quando
      voltar para a página de listagem de Categorias e assim finaliaz a atualização
    -->
    <div class="campo">
      <button type="submit" name="btnAtualizar" value="<?php echo $arryCategoria['idCategoria'];?>">Atualizar</button>
    </div>
  </div>
</form>

<?php include ('../default-page/index.footer.php'); ?>
