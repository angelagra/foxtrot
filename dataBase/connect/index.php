<?php
// Login e Senha para o foxtrot
// admin pipoca

// -----------------------------------------------------------------------------
// Conectando no Banco de Dados.

// $db_host = "10.135.0.53\sqledutsi";
// $db_name = "Kanino";

$db_host = "foxtrot-pi.database.windows.net";
$db_name = "foxtrot";

$user = "TSI";
$password = "SistemasInternet123";
$dsn = "Driver={SQL Server}; Server=$db_host; Port=1433; Database=$db_name;";
// -----------------------------------------------------------------------------

// Validando Conecção ao Banco de Dados.
if(!$db = odbc_connect($dsn, $user, $password)){
  header('Location: ../../');
  exit;
}
//------------------------------------------------------------------------------
?>

<!-- 45.33.114.157 -->
<!-- dontpad.com/pi2senac -->
