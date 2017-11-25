<?php
if (isset($_GET['code']) && isset($_GET['id'])) {
	$code= htmlspecialchars($_GET['code']);
	$id= htmlspecialchars($_GET['id']);
	// Connexion à la DB
	require_once "../model/DBConnexion.php";
	// La requête servant à supprimer l'élève ayant le classCode et l'id contenu dans l'URL
	$sql = 'DELETE FROM eleves WHERE id_eleve="'.$id.'" AND classCode="'.$code.'"';
	// On effectue cette requête
	$req = mysqli_query($connexion, $sql);
	// On redirige ensuite vers le gestionnaire de classes, le paramètre sert afficher la classe ou le changement à été effectué
	header('Location: testUI.php?code='.$code);
}