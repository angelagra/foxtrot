<?php
include ('../../dataBase/authentication/access.php');
include ('../default-page/index.head.php');
?>
<link rel="stylesheet" href="../../styles/table.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-information page-submenu">
    <h1>Projeto integrador 2</h1>
    <h2>TSI - Tecnologia em Sistemas para Internet - Aplica&ccedil;&atilde;o Web Din&acirc;mica</h2>
</section>

<!-- LISTAGEM DAS CATEGORIAS DO BANCO DE DADOS -->
<div class="container-table">
  <div class="table">
    <div class="row">
      <div class="cell-status"><p> T&iacute;tulo </p></div>
      <div class="cell-status"><p> Descri&ccedil;&atilde;o</p></div>
      <div class="cell-status"><p> Obrigatoriedade</p></div>
      <div class="cell-status"><p> Dificuldade </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> usu&aacute;rios </p></div>
      <div class="cell-status"><p> O sistema permite cadastrar novos usu&aacute;rios. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> F&aacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Produto I </p></div>
      <div class="cell-status"><p> O usu&aacute;rios consegue cadastrar um novo produto, inserindo todas as informa&ccedil;&otilde;es, opcionais ou obrigat&oacute;rias, no banco de dados, bem como sua imagem. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> Dif&iacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Categoria I </p></div>
      <div class="cell-status"><p> Cadastrar uma nova categoria. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> M&eacute;dio </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Categoria II </p></div>
      <div class="cell-status"><p> Conseguir alterar uma categoria existente. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> F&aacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Categoria III </p></div>
      <div class="cell-status"><p> Excluir uma categoria. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> F&aacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Produto II </p></div>
      <div class="cell-status"><p> Alterar qualquer obrigat&oacute;rias de um produto, inclusive sua imagem. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> Dif&iacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Produto III </p></div>
      <div class="cell-status"><p> Excluir um produto existente. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> M&eacute;dio </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Integridade I </p></div>
      <div class="cell-status"><p> Ao excluir uma categoria, verificar se existem produtos cadastrados desta categoria e exibir uma mensagem personalizada informando que n&atilde;o ser&aacute; poss&iacute;vel a exclus&atilde;o. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> M&eacute;dio </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Integridade II </p></div>
      <div class="cell-status"><p> Ao excluir um produto, verificar se j&aacute; foram efetuadas vendas deste produto e exibir uma mensagem personalizada. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> M&eacute;dio </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Bing </p></div>
      <div class="cell-status"><p> Campo de busca que permite filtrar produtos pelo seu nome. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> M&eacute;dio </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Hacker Proof </p></div>
      <div class="cell-status"><p> Apenas usu&aacute;rios autorizados tem acesso ao sistema. </p></div>
      <div class="cell-status"><p> Obrigat&oacute;rio </p></div>
      <div class="cell-status"><p> F&aacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Google </p></div>
      <div class="cell-status"><p> Outros campos que permitem diferentes filtros sobre os produtos cadastrados. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> Muito Dif&iacute;cil </p></div>
      <div class="cell-status"><p> 0% </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Repositor </p></div>
      <div class="cell-status"><p> Definir e atualizar a quantidade em estoque de um determinado produto. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> F&aacute;cil </p></div>
      <div class="cell-status"><p> Conclu&iacute;do </p></div>
    </div>
  </div>
</div>

<?php include ('../default-page/index.footer.php'); ?>
