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
	$isExist = 'SELECT nom, prenom FROM eleves WHERE classCode="'.$classCode.'"';
	$exist = mysqli_query($connexion, $isExist);
  	$row = mysqli_num_rows($exist);

  	if ($row > 0) {
  		echo "t'existes déjà, patate, va te loguer normalement";
	}

	// On inscrit l'élève
	else {
		$sql = 'INSERT INTO eleves(nom, prenom, classCode) VALUES ("'.$nom.'","'.$prenom.'","'.$classCode.'")';
		$insert = mysqli_query($connexion,$sql);
		echo "inscription réussie";

	}

}
?>