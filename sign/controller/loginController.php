<?php
if (isset($_POST['mail']) && isset($_POST['pass'])) {
		$mail = htmlspecialchars($_POST['mail']);
		$pass = htmlspecialchars($_POST['pass']);
		// Il faut sécuriser ici !!
        $pass_hache = $_POST['pass'];

		// Connexion à la DB
		require_once "../model/DBConnexion.php";

		$isExist = "SELECT mail FROM prof WHERE mail='".$mail."'";
		$exist = mysqli_query($connexion, $isExist);
		$row = mysqli_num_rows($exist);

		// Si la requête retourne une ligne, c'est que l'utilisateur existe dans la DB
		if($row > 0) {
			$resultat = mysqli_query($connexion, "SELECT id, nom, prenom FROM prof WHERE mail='".$mail."'");			
			$donnees = mysqli_fetch_assoc($resultat);
			mysqli_free_result($resultat);

			session_start();
			$_SESSION['id'] = $donnees['id'];
			$_SESSION['nom'] = $donnees['nom'];
			$_SESSION['prenom'] = $donnees['prenom'];
			// On le fait entrer
			header('Location: ../../appli/view/index.php');
		}	
		// Sinon, il est redirectionné vers la page d'inscription
 		else {
			header('Location: ../view/login.php?res=3');
		}
}