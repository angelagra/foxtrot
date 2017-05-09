<?php
  include ('../menu/index.head.tpl.php');
  include ('../menu/index.body.tpl.php');
?>
<link rel="stylesheet" href="../estilo/tabela.css">

<section>
    <h1>Editar Categorias</h1>
    <h3><a href="../categoria">Voltar</a></h3>
</section>

  <form method="post" action="../categoria" name="form"><br><br>
    <fieldset class="grupo">
      <div class="campo">
        <label>Categoria:</label>
        <input type="text" name="nome" style="width: 17em"><br><br>
      </div>

      <div class="campo">
        <label>Descrição:</label>
        <textarea name="descricao" rows="6" style="width: 20em" id="descricao"></textarea>
      </div>

      <div class="campo">
        <button type="submit" name="btnGravarUsuario">Gravar</button>
      </div>
    </fieldset>
  </form>
  

<?php
  include ('../menu/index.head.tpl.php');
?>
