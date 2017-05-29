<?php include ('../default-page/index.head.php'); ?>
<link rel="stylesheet" href="../../styles/form.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-submenu page-information">
  <div class="box-info">
    <h1>Editar Produto</h1>
  </div>
  <!-- Adicionar novo Produto -->
  <div class="box-btn">
    <button type="button" name="btn-add" class="btn-add">
      <h3><a class="btn-link" href="../product/">Voltar aos produtos</a></h3>
    </button>
  </div>
 </section>

<!-- FORMULÁRIOS PARA CADASTRAR NOVO PRODUTO -->
<form method="post" action="../product/" id="frm">
	<div class="form-box">
    <div class="form-box-1">
      <!-- Campo para adicionar o nome do Produto -->
      <div class="campo">
        <label class="label-box">Nome:</label>
        <input type="text" name="inputProduto" value="<?php echo $array_produto['nomeProduto'];?>">
      </div>
      <!-- Campo para adicionar o preço do Produto -->
      <div class="campo">
        <label class="label-box">Preço:</label>
        <input type="text" name="inputPreco" value="<?php echo $array_produto['precProduto'];?>">
      </div>
      <!-- Campo para adicionar a desconto do Produto -->
      <div class="campo">
        <label class="label-box">Desconto:</label>
        <input type="text" name="inputDesconto" value="<?php echo $array_produto['descontoPromocao'];?>">
      </div>
      <!-- Campo para adicionar a quantidade do Produto -->
      <div class="campo">
        <label class="label-box">Quantidade no estoque:</label>
        <input type="text" name="inputEstoque" value="<?php echo $array_produto['qtdMinEstoque'];?>">
      </div>
    </div> <!-- fim div form-box-1 -->

    <div class="form-box-2">
      <!-- Campo para adicionar a descrição do Produto -->
  		<div class="campo">
  		  <label class="label-box">Descrição:</label>
  		  <textarea type="text" name="inputDescricao" rows="10" style="width: 100%"><?php echo $array_produto['descProduto'];?></textarea>
  		</div>
    </div> <!-- fim div form-box-2 -->

    <div class="form-box-3">
      <!-- Campo para adicionar a categoria do Produto -->
      <div class="campo">
        <label class="label-box">Categoria:</label>
        <select name="inputCategoria">
          <?php
          // Criando a opções das categorias
          $consulta = odbc_exec($db, "SELECT nomeCategoria, idCategoria FROM Categoria");
          while ($r = odbc_fetch_array($consulta))
          echo '<option value="'.$r['idCategoria'].'">'.$r['nomeCategoria'].'</option>';
          ?>
        </select>
      </div>
      <!-- Campo para adicionar a ativo do Produto -->
      <div class="campo">
        <label class="label-box">Ativo:</label>
        <?php
        if($array_produto['ativoProduto'] == 1)
        echo '<input type="checkbox" name="inputAtivo" value="'.$array_produto['ativoProduto'].'" checked>';
        else
        echo '<input type="checkbox" name="inputAtivo" value="'.$array_produto['ativoProduto'].'">';
        ?>
      </div>
      <!-- Campo para adicionar a imagem do Produto -->
      <div class="campo">
        <label for="inputImagem" class="label-box inputFile">Adicionar Imagem</label>
        <?php
          $conteudo_base64 = base64_encode($array_produto['imagem']); 
        ?>
        <img width="80" height="80" <?php echo "src='data:image/jpeg;base64,$conteudo_base64'"?>>
        <input type="file" id="inputImagem" name="inputImagem">
        <span id='inputImagem'></span>
      </div>
      <!-- Botão para validar os campos acima no banco de dados -->
      <div class="campo">
        <button type="submit" name="btnGravarProduto" value="<?php echo $array_produto['idProduto'];?>">Salvar</button>
      </div>
    </div> <!-- fim div form-box-3 -->
	</div> <!-- Fim div form-box -->
</form>

<?php include ('../default-page/index.footer.php'); ?>
