<?php
session_start();

if (isset($_POST['newClass']) && isset($_POST['nomClasse'])) {
	$classCode = rand(1000,9999);
	$nomClasse = htmlspecialchars($_POST['nomClasse']);
}

  require_once "../model/DBConnexion.php";

  $isExist = 'SELECT classCode FROM classe WHERE classCode="'.$classCode.'"';
  $exist = mysqli_query($connexion, $isExist);
  $row = mysqli_num_rows($exist);

  if ($row > 0) {
  	# code à éxecutér pour produite un nouveau classCode
  	echo "cette classe existe déjà (message au dev)";
  }

  else {
  	echo "on insère";
  	$sql = 'INSERT INTO classe(classCode, prof_ID, nomClasse) VALUES ("'.$classCode.'", "'.$_SESSION['id'].'", "'.$nomClasse.'")';
  	$insert = mysqli_query($connexion, $sql);
  	header('Location: ../view/class.php?res=1');
  }

?>