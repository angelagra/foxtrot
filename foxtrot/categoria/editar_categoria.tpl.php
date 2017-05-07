<?php
  include ('../menu/index.head.tpl.php');
  include ('../menu/index.body.tpl.php');
?>
<section>
    <h1>Editor de Categorias</h1>
</section>

  <div class="container-default">
    <form method="post" action="../categoria">
      Categoria: <input type="text" name="nome">
      Descrição: <textarea name="descricao"></textarea>
    </form>
  </div>

<?php
  include ('../menu/index.head.tpl.php');
?>
