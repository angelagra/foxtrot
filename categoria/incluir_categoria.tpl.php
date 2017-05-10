<?php
  include ('../menu/index.head.tpl.php');
  include ('../menu/index.body.tpl.php');
?>

<link rel="stylesheet" href="../estilo/tabela.css">

  <section>
      <h1>Nova Categoria</h1>
      <h3><a href="../categoria">Voltar</a></h3>
  </section>

 
    <form method="post" action="../categoria" name="form"><br><br>
      <fieldset>      
        <div class="campo">
          <label>Categoria:</label>
          <input type="text" name="nome" placeholder="Digite o nome da categoria" style="width: 17em">
        </div>

        <div class="campo">
          <label>Descrição:</label>
          <textarea name="descricao" placeholder="Digite um pouco sobre a descrição da categoria" rows="6" style="width: 20em" id="descricao"></textarea>
        </div>

        <div class="campo">
          <button type="submit" name="salvar" value="salvar">Salvar</button>
        </div>

      </fieldset>
    </form>
  

<?php
  include ('../menu/index.head.tpl.php');
?>
