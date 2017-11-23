<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>modifier une classe - Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	require_once "navbar.html";
	if (isset($_POST['modifyClass'])) {
	$classCode =  htmlspecialchars($_POST['modifyClass']);

	require_once "../model/DBConnexion.php";

	$data = mysqli_query($connexion, 'SELECT
                                     nom_eleve, prenom_eleve
                                    From 
                                     eleves el, classe cl 
                                    WHERE 
                                     el.classCode = cl.classCode 
                                    AND 
                                     cl.prof_ID="'.$_SESSION["id"].'"
                                    AND 
                                    el.classCode="'.$classCode.'"');
?>


<div class="container">
	<h1><?php echo $classCode;?></h1>

<div id="formulaire">
	<form action="../controller/addStudentsController.php" method="POST">
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
		<input type="hidden" name="classCode" value="<?php echo $classCode; ?>">
		<button type="submit" class="btn btn-outline-primary">Ajouter</button>
	</form>
</div>

	<table id="dataDisplay" class="table">
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

	<button type="button" class="btn btn-outline-primary">Modifier</button>
	<button type="button" class="btn btn-outline-danger">Supprimer</button>
	<a href="class.php" class="btn btn-primary" role="button">Retour à l'index</a>
</div><!--/.container-->
</body>
</html>