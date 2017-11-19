<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Inscription - Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 
	include_once "components/navIndex.html";
?>

<div class="container">
	<div class="row">
		<h1>Inscription</h1>
		<div class="col-md-7">			
		</div>

		<div id="signForm" class="col-md-5 border border-primary rounded">
			<form action="../controller/signUpController.php" method="POST">
		  <div class="form-group">
		    <label for="nom">Nom:</label>
		    <input type="text" class="form-control" id="nom" name="lastName" placeholder="Nom">
		  </div>
		  <div class="form-group">
		    <label for="nom">Prénom:</label>
		    <input type="text" class="form-control" id="prenom" name="firstName" placeholder="Prénom">
		  </div>
		  <div class="form-group">
		    <label for="passwordCheck">Mot de passe:</label>
		    <input type="password" class="form-control" id="passwordCheck" name="pass" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="passwordCheck2">Retapez votre mot de passe:</label>
		    <input type="password" class="form-control" id="passwordCheck2" name="passConfirm" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email:</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail" placeholder="Entrez votre email">
		    <small id="emailHelp" class="form-text text-muted">Vos données ne seront jamais partagées avec quiconque.</small>
		  </div>
		  <button type="submit" class="btn btn-primary">Démarrer!</button>
		</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="../controller/formController.js"></script>
</body>
</html>