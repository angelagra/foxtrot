<?php
  include ('../../dataBase/authentication/access.php');
  include ('../default-page/index.head.php');
?>
<?php include ('../default-page/index.body.menu.php'); ?>

<section class="page-information page-submenu">
    <h1>Bem Vindo <?php echo $_SESSION['nomeUsuario']; ?></h1>
    <h2>Ao sistema gerencial da loja Foxtrot.</h2>
</section>

<div class="box-product">
  <a href="../product/">
    <div class="box-effect">
      <p class="link-page link-right">PRODUTOS</p>
    </div>
  </a>
</div>

<div class="box-category">
  <a href="../category/">
    <div class="box-effect">
      <p class="link-page link-left">CATEGORIAS</p>
    </div>
  </a>
</div>

<div class="box-user">
  <a href="../user/">
    <div class="box-effect box-effect">
      <p class="link-page link-right">USUÁRIOS</p>
    </div>
  </a>
</div>

<?php include ('../default-page/index.footer.php'); ?>
