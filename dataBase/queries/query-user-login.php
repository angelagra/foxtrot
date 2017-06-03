<?php
// Verificar se a senha existe no banco de dados.
$query = odbc_exec($db, "SELECT nomeUsuario, idUsuario, tipoPerfil
                         FROM  Usuario
                         WHERE loginUsuario = '$email'
                         AND   senhaUsuario =  HASHBYTES('SHA1','$senha')");

 // Utilizando a hash --> HASHBYTES('SHA1','$senha')
 // odbc_exec "Executa uma instrução desejada para efetuarmos uma tarefa ou mais."
 // SELECT Instrução do SQL Server para selecional tabelas.
 // FROM "passar o nome da Tabela"
 // WHERE "passar os valores que estão na tabela"
 // AND "Passar também junto ao" WHERE.
 ?>
