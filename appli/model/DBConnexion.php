<?php
define('DBSERVER', 'localhost');
define('DBNAME','interface');
define('DBUSER', 'root');
define('DBPWD', '');
// Connexion à la BDD
$connexion = mysqli_connect(DBSERVER, DBUSER ,DBPWD, DBNAME);
// Check la connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>