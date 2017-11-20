<?php
session_start();

if (isset($_POST["nom"]) && isset($_POST["prenom"])) {
	$classCode = $_SESSION["classCode"];
	$nom = htmlspecialchars($_POST["nom"]);
	$prenom = htmlspecialchars($_POST["prenom"]);

	// contrôle des noms et prénoms avec les regex etc...

	// Connexion à la DB 
	require_once "../model/DBConnexion.php";

	// On met un if exist
	$isExist = 'SELECT nom, prenom FROM eleves WHERE nom="'.$nom.'" AND prenom="'.$prenom.'"';
	$exist = mysqli_query($connexion, $isExist);
  	$row = mysqli_num_rows($exist);
  	// Si il existe, alors on le connecte
  	if ($row > 0) {
  		session_start();
		$_SESSION['nom'] = $nom;
		$_SESSION['prenom'] = $prenom;
		$_SESSION['classCode'] = $classCode;
		// On le renvopie vers son espace perso
		header('Location:../view/maPage.php');
	}

	// On inscrit l'élève
	else {
		$sql = 'INSERT INTO eleves(nom, prenom, classCode) VALUES ("'.$nom.'","'.$prenom.'","'.$classCode.'")';
		$insert = mysqli_query($connexion,$sql);
		// On démarre une session pour sa page
		session_start();
		$_SESSION['nom'] = $nom;
		$_SESSION['prenom'] = $prenom;
		$_SESSION['classCode'] = $classCode;
		// On le renvopie vers son espace perso
		header('Location:../view/maPage.php');
	}

}
?>