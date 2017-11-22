<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
</head>
<body>
<?php
// Connexion à la DB
require_once "../model/DBConnexion.php";
// Navbar
include "navbar.html"
?>

<div class="container">

<?php
echo 'Vous n\'avez pas encore de classes pour le moment. Créez-en une! </br>';
?>


<!--Ajouter des controlleurs ici!!!-->
<form action="../controller/classController.php" method="post">
	<label for="nomClasse">Nom de la classe:</label>
	<input type="text" name="nomClasse" id="nomClasse">
    <button type="submit" name="newClass" class="btn btn-outline-success">Créer!</button>
</form>

<?php 
if (isset($_GET['res'])) {
	$res = $_GET['res'];
	if ($res === "1") {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<strong>Votre classe a bien été créée!</strong> Suivez les étapes suivantes.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
			  </div>';
	}
}

$resultat = mysqli_query($connexion, 'SELECT classCode, nomClasse FROM classe WHERE prof_ID="'.$_SESSION["id"].'"');

// ajouter une condition si supérieur à 1
while($donnees = mysqli_fetch_assoc($resultat)) {
	echo '<form action="" method="post">
			<input type="hidden" id="postClass" name="postClass" value="'.$donnees["classCode"].'">
			<button type="submit" name="yo" class="btn btn-primary">'.$donnees["nomClasse"].'</button>		
		  </form><br>';
}


// ?
mysqli_free_result($resultat);

if (isset($_POST['postClass'])) {
  $postClass = htmlspecialchars($_POST['postClass']);

  $data = mysqli_query($connexion, 'SELECT
                                     nom_eleve, prenom_eleve 
                                    From 
                                     eleves el, classe cl 
                                    WHERE 
                                     el.classCode = cl.classCode 
                                    AND 
                                     cl.prof_ID="'.$_SESSION["id"].'"
                                    AND 
                                    el.classCode="'.$postClass.'"');
?>

<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Nom</th>
	      <th scope="col">Prénom</th>
	    </tr>
	  </thead>
	  <tbody>

		<?php
		  while($donnees = mysqli_fetch_assoc($data)) {
		    echo '<tr><td>' .$donnees['nom_eleve']. '</td><td>' .$donnees['prenom_eleve']. '</td></tr>';
		  }
		}
		?>
	  </tbody>
</table>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>