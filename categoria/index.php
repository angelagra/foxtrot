<?php
  include('../db/index.php');
  include('../autenticacao/controleAcesso.php');

  // Esperando ação via GET ou POST do Usuário.
  if(isset($_REQUEST['acao'])){
    $acao = $_REQUEST['acao'];

    // Criando condições para as ações
    switch ($acao) {
      // -----------------------------------------------------------------------
      case 'incluir':
        $nome=$_POST['nome'];
        $desc=$_POST['descricao'];

        var_dump($nome); exit;

        if(odbc_exec($db, " INSERT INTO Categoria
                            (nomeCategoria,
                            descCategoria)
                            VALUES
                            '$nome',
                            '$desc'
                          ")){
          echo "Feito";
        }else{
          echo "Erro ao cadastrar categoria";
        }
        break;

      // -----------------------------------------------------------------------
      case 'excluir':
        break;

      // -----------------------------------------------------------------------
      case 'editar':
        if('A' == $_SESSION['tipoPerfil']){
          include('editar_categoria.tpl.php');

        }else{
          echo "Você não tem permissão para editar esta catagoria";
        }
        break;

      // -----------------------------------------------------------------------

      default:
        break;
    }
  }else{ //fim $_REQUEST['acao']
    // Criando a consulta das Categorias
    $consulta = odbc_exec($db, "SELECT nomeCategoria, descCategoria, idCategoria
                                FROM Categoria");
    $aux = 0;
    while ($resul = odbc_fetch_array($consulta)){
      // Passando cada campo de categoria para um array categorias
      $categorias[$aux] = $resul;
      $aux++;
    }
    include('lista_categoria.tpl.php');
  }
?>
