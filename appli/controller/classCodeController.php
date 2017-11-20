<?php
if (isset($_POST['classCode'])) {
  $classCode = htmlspecialchars($_POST['classCode']);
  // Connexion à la DB
  require_once "../model/DBConnexion.php";
  // On vérifie que le ClassCode existe 
  $isExist = 'SELECT classCode FROM classe WHERE classCode="'.$classCode.'"';
  $exist = mysqli_query($connexion, $isExist);
  $row = mysqli_num_rows($exist);
  // Si il existe, on renvoie vers la page d'inscription
  if ($row > 0) {
  	session_start();
  	$_SESSION['classCode'] = $classCode;
	  header('Location:../view/inscription.php');
  }
  // Si il ne l'a pas trouvé dans la DB, on renvoie vers la page de login avec un message d'erreur 
  else {
  	header('Location:../../index.php?res=1'); 
  }
}
?>