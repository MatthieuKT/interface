<?php
session_start(); 
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
require_once "view/navbar.html";
?>

<div class="container">

	<div class="row justify-content-md-center">
		<div id="welcome" >
		<h1>Bienvenue Mr. Kwant!</h1> 
		<nav>
			<a href="view/class.php" class="btn btn-outline-success" role="button">Ma classe</a>
			<a href="view/class.php" class="btn btn-outline-success" role="button">Créer un cours</a>
		</nav>
		</div>
	 </div>

</div>

</body>
</html>