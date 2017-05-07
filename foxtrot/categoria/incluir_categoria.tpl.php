<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/formulario.css">
<?php
  include ('../menu/index.body.tpl.php');
?>
  <section>
      <h1>Nova Categoria</h1>
  </section>

  <div class="container-frm">
    <form method="post" action="../categoria">
      <input type="text" name="nome" placeholder="Digite o nome da categoria">
      <textarea name="descricao" readonly="readonly" placeholder="Digite um pouco sobre a descrição da categoria"></textarea>

      <button type="submit" name="salvar" value="salvar">Salvar</button>
    </form>
  </div>

<?php
  include ('../menu/index.head.tpl.php');
?>
