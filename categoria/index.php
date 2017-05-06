<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela.css">
<?php
  include ('../menu/index.body.tpl.php');
?>
<section>
    <h1>Listagem de Categorias</h1>
</section>

<!-- Gerando uma tabela com as informações sobre Categorias do Banco -->
<div class="tabela-Categoria">
  </div>
  <table>
    <tr>
      <td>Categoria</td>
      <td>Descrição</td>
      <td>Apagar</td>
    </tr>
    <?php
      // foreach ($categorias as $categoria) {
      //   echo "<tr>
      //           <td>{$categoria['nomeCategoria']}</td>
      //           <td>{$categoria['descCategoria']}</td>
      //           <td><a href='?acao=apagar&id={$categoria['idCategoria']}'>Apagar Categoria</td>
      //         </tr>";
      // } // Fim foreach
    ?>
  </table>
</div>

<?php
  include ('../menu/index.head.tpl.php');
?>
