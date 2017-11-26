<?php
session_start(); 
require_once "controller/isLoggedController.php";
// strtoupper met le nom en majuscules
$nom = strtoupper($_SESSION["nom"]);
// ucfirst() met la première lettre du prénom en majuscule 
$prenom = ucfirst($_SESSION["prenom"]);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
<?php
require_once "view/components/navbar.html";
?>

<div class="container">

	<div class="row justify-content-md-center">
		<div id="welcome" >
		<h1>Bienvenue <?php echo $nom . " " . $prenom; ?>!</h1> 
		<nav>
			<a href="view/class.php?code=new" class="btn btn-outline-success" role="button">Mes classes</a>
			<a href="view/cours.php" class="btn btn-outline-success" role="button">Créer un cours</a>
		</nav>
		</div>
	 </div>

</div>

</body>
</html>