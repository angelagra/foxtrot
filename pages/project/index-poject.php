<?php
include ('../../dataBase/authentication/access.php');
include ('../default-page/index.head.php');
?>
<link rel="stylesheet" href="../../styles/table.css">
<?php include ('../default-page/index.body.php'); ?>

<!-- FORMULÁRIOS PARA O SUBMENU -->
<section class="page-information page-submenu">
    <h1>Projeto integrador 2</h1>
    <h2>TSI - Tecnologia em Sistemas para Internet - Aplicação Web Dinâmica</h2>
</section>

<!-- LISTAGEM DAS CATEGORIAS DO BANCO DE DADOS -->
<div class="container-table">
  <div class="table">
    <div class="row">
      <div class="cell-status"><p> Título </p></div>
      <div class="cell-status"><p> Descrição</p></div>
      <div class="cell-status"><p> Obrigatoriedade</p></div>
      <div class="cell-status"><p> Dificuldade </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Usuários </p></div>
      <div class="cell-status"><p> O sistema permite cadastrar novos usuários. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> Fácil </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Produto I </p></div>
      <div class="cell-status"><p> O usuário consegue cadastrar um novo produto, inserindo todas as informações, opcionais ou obrigatórias, no banco de dados, bem como sua imagem. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Difícil </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Categoria I </p></div>
      <div class="cell-status"><p> Cadastrar uma nova categoria. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Médio </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Categoria II </p></div>
      <div class="cell-status"><p> Conseguir alterar uma categoria existente. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Fácil </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Categoria III </p></div>
      <div class="cell-status"><p> Excluir uma categoria. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Fácil </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Produto II </p></div>
      <div class="cell-status"><p> Alterar qualquer informação de um produto, inclusive sua imagem. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Difícil </p></div>
      <div class="cell-status"><p> 90% </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Produto III </p></div>
      <div class="cell-status"><p> Excluir um produto existente. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Médio </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Integridade I </p></div>
      <div class="cell-status"><p> Ao excluir uma categoria, verificar se existem produtos cadastrados desta categoria e exibir uma mensagem personalizada informando que não será possível a exclusão. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Médio </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Integridade II </p></div>
      <div class="cell-status"><p> Ao excluir um produto, verificar se já foram efetuadas vendas deste produto e exibir uma mensagem personalizada. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> Médio </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Bing </p></div>
      <div class="cell-status"><p> Campo de busca que permite filtrar produtos pelo seu nome. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Médio </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Hacker Proof </p></div>
      <div class="cell-status"><p> Apenas usuários autorizados tem acesso ao sistema. </p></div>
      <div class="cell-status"><p> Obrigatório </p></div>
      <div class="cell-status"><p> Fácil </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Google </p></div>
      <div class="cell-status"><p> Outros campos que permitem diferentes filtros sobre os produtos cadastrados. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> Muito Difícil </p></div>
      <div class="cell-status"><p> 0% </p></div>
    </div>

    <div class="row">
      <div class="cell-status"><p> Repositor </p></div>
      <div class="cell-status"><p> Definir e atualizar a quantidade em estoque de um determinado produto. </p></div>
      <div class="cell-status"><p> Opcional </p></div>
      <div class="cell-status"><p> Fácil </p></div>
      <div class="cell-status"><p> Concluído </p></div>
    </div>
  </div>
</div>

<?php include ('../default-page/index.footer.php'); ?>
