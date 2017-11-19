<?php
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['pass']) && isset($_POST['passConfirm']) && isset($_POST['mail'])) {

	$lastName = htmlspecialchars($_POST['lastName']);
	$firstName = htmlspecialchars($_POST['firstName']);
	$pass = htmlspecialchars($_POST['pass']);
	$passConfirm = htmlspecialchars($_POST['passConfirm']);
	$mail = htmlspecialchars($_POST['mail']);
	$pass_hache = $passConfirm;
		
	// Il faut rajouter les vérifications!!!


	// On regarde si le nom et prénom saisis sont bien de type string
  	// il faut aussi que ce soient que des carracteres alphabétiques donc rajouter une regex
	if (is_string($lastName) && is_string($firstName)) {

		// On teste la validité de l'adresse email avec une regex
		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {

			// On sécurisera un peu plus le pwd avec une regex
			if(strlen($pass) > 5 && $pass === $passConfirm) {

				// Ajouter le cryptage !!!

				// Connexion à la DB
				require_once "../model/DBConnexion.php";

				// On utilise UNIQUEMENT le mail comme clé primaire
				$isExist = "SELECT
							 mail
							FROM 
							 prof 
							WHERE
							 mail='".$mail."'";


				$exist = mysqli_query($connexion, $isExist);
				$row = mysqli_num_rows($exist);


				// Si la requête retourne une ligne, c'est que l'utilisateur existe dans la DB
				if($row > 0) {
					// Message d'alerte et redirection vers login
					header('Location: ../view/login.php?res=2');
				}	

				else {
				$sql = "INSERT INTO
						 prof(nom, prenom, pass, mail) 
						VALUES 
						('".$lastName."','".$firstName."','".$pass_hache."','".$mail."')";

				$insert = mysqli_query($connexion,$sql);

					// Message de succés
					header('Location: ../view/login.php?res=1');
				}
			}
		}
	}
}
?>