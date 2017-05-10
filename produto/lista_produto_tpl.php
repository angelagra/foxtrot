<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela1.css">
<?php
  include ('../menu/index.body.tpl.php');
?>
<section>
    <h1>Listagem de Produtos</h1>
</section>

<!-- Gerando uma tabela com as informações sobre produtos do Banco -->

<div class="tabela-Categoria">
<table>
<tr>
  <td>ID Produto</td>
  <td>Nome</td>
  <td>Descrição</td>
  <td>Preço</td>
  <td>Desconto Promocao</td>
  <td>Categoria</td>
  <td>ativoProduto</td>
  <td>ID Usuario</td>
  <td>Quantidade no estoque</td>
  <td>Imagem</td>
  <td><a href="?acao=incluir">Adicionar Produto</a></td>
</tr>
    <?php

    foreach($produtos as $produto){
      $conteudo_base64 = base64_encode($produto['imagem']);
        echo "<tr>
                <td>{$produto['idProduto']}</td>
                <td>{$produto['nomeProduto']}</td>
                <td>{$produto['descProduto']}</td>
                <td>{$produto['precProduto']}</td>
                <td>{$produto['descontoPromocao']}</td>
                <td>{$produto['idCategoria']}</td>
                <td>{$produto['ativoProduto']}</td>
                <td>{$produto['idUsuario']}</td>
                <td>{$produto['qtdMinEstoque']}</td>
                <td><img width='200' src='data:image/jpeg;base64,$conteudo_base64'></td>
                <td>
                  <a href='?acao=editar&id={$produto['idProduto']}'>Editar</a>
                </td>
                <td>
                  <a href='?acao=excluir&id={$produto['idProduto']}'>Excluir</a>
                </td>
              </tr>";
    } // Fim foreach
    ?>
  </table>
  </div>
</div>

<?php
  include('../menu/index.head.tpl.php');
?>
