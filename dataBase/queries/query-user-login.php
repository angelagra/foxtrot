<?php
// Verificar se a senha existe no banco de dados.
$query = odbc_exec($db, "SELECT nomeUsuario, idUsuario, tipoPerfil
                         FROM  Usuario
                         WHERE loginUsuario = '$email'
                         AND   senhaUsuario =  HASHBYTES('SHA1','$senha')");

 // Utilizando a hash --> HASHBYTES('SHA1','$senha')
 // odbc_exec "Executa uma instru��o desejada para efetuarmos uma tarefa ou mais."
 // SELECT Instru��o do SQL Server para selecional tabelas.
 // FROM "passar o nome da Tabela"
 // WHERE "passar os valores que est�o na tabela"
 // AND "Passar tamb�m junto ao" WHERE.
 ?>
