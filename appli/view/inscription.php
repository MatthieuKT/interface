<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<form action="inscriptioncontroller.php" method="post">
		<label for="nom">Nom: </label>
		<input type="text" name="nom">
		<label for="prenom">Prénom: </label>
		<input type="text" name="prenom">
		<input type="submit">
	</form>
</div>
</body>
</html>