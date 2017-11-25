<?php 
if (isset($_GET['code']) && isset($_POST['nom_eleve']) && isset($_POST['prenom_eleve'])) {
 	$code = htmlspecialchars($_GET['code']);
 	$nom_eleve = htmlspecialchars($_POST['nom_eleve']);
 	$prenom_eleve = htmlspecialchars($_POST['prenom_eleve']);

 	if (is_string($nom_eleve) && is_string($prenom_eleve)) {
 		if ( strlen($nom_eleve) > 2 && strlen($prenom_eleve) > 2 ) {
 			require_once "../model/DBConnexion.php";
 			$isExist = 'SELECT nom_eleve, prenom_eleve FROM eleves WHERE nom_eleve="'.$nom_eleve.'" AND prenom_eleve="'.$prenom_eleve.'"';
			$exist = mysqli_query($connexion, $isExist);
			$row = mysqli_num_rows($exist);

			if ($row > 0) {
				echo "cet élève existe déjà dans cette classe";
			}

			else {
			 	$addEleves = mysqli_query($connexion,'INSERT INTO eleves(classCode, nom_eleve, prenom_eleve) VALUES ("'.$code.'", "'.$nom_eleve.'"
				, "'.$prenom_eleve.'")');
				header('Location: testUI.php?code='.$code);
			}
 		}
 	}
 } 
 ?>
