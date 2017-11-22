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
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
// Connexion à la DB
require_once "../model/DBConnexion.php";
// Navbar
include "navbar.html"
?>

<div class="container">
<h2>Créer une classe</h2>
<!--Ajouter des controlleurs ici!!!-->
<form class="form-inline" action="../controller/classController.php" method="post">
  <div class="form-group mx-sm-3">
    <input type="text" name="nomClasse" class="form-control" id="nomClasse" placeholder="Nom de la classe">
  </div>
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
?>

<div id="classList">
<h2>Mes classes</h2>

<?php

$resultat = mysqli_query($connexion, 'SELECT classCode, nomClasse FROM classe WHERE prof_ID="'.$_SESSION["id"].'"');
// ajouter une condition si supérieur à 1
while($donnees = mysqli_fetch_assoc($resultat)) {
	echo '<form action="" method="post" class="formClass">
			<input class="postClass" type="hidden" id="postClass" name="postClass" value="'.$donnees["classCode"].'">
			<button type="submit" name="yo" class="btn btn-primary">'.$donnees["nomClasse"].'</button>		
		  </form>';
}
?>

		<button type="button" class="btn btn-outline-danger pull-right">supprimer</button>


<?php
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
	<div id="tableDisplay" class="col-md-6">
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
<!-- 		<h2>ajouter un élève:</h2>
		<form>
			<div class="form-row">
			  <div class="col">
			    <label for="inputNom">Nom: </label>
			    <input id="nom" name="inputNom" type="text" class="form-control" required">
			    <div class="invalid-feedback">
			      Le nom doit contenir au minimum deux carractères
			    </div>
			  </div>
			  <div class="col">
			    <label for="inputPrenom">Prenom: </label>
			    <input id="prenom" name="inputPrenom" type="text" class="form-control" required">
			    <div class="invalid-feedback">
			      Le prénom doit contenir au minimum deux carractères
			    </div>
			  </div>
			</div>
			<input id="valider" type="submit" class="btn btn-primary" value="Ajouter"/>
		</form> -->


	</div><!--/.tableList-->
</div><!--/.classList-->
</div><!--/.container-->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>