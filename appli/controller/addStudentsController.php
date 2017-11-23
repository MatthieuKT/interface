<?php
// Connexion à la DB
require_once "../model/DBConnexion.php";
// Si tous les champs sont bien remplis
if (isset($_POST['inputNom']) && isset($_POST['inputPrenom']) && isset($_POST['classCode'])) {

	// On rend inoffensives les balises HTML que le visiteur aurait pu entrer dans nos input
	$nom = htmlspecialchars($_POST['inputNom']);
	$prenom = htmlspecialchars($_POST['inputPrenom']);
	$classCode= htmlspecialchars($_POST['classCode']);

	echo $classCode;

	// On regarde si le nom et prénom saisis sont bien de type string
	if (is_string($nom) && is_string($prenom)) {
		$sql = 'INSERT INTO eleves (classCode, nom_eleve, prenom_eleve) VALUES ( "'.$classCode.'", "'.$nom.'", "'.$prenom.'")';
		$insert = mysqli_query($connexion, $sql);
	}
	header('Location: ../view/deleteClass.php');
}
