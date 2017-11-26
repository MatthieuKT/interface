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
		<form action="../controller/signUpController.php" method="POST" onsubmit="return verifForm(this)">
		  <div class="form-group">
	        <label for="nom">Nom: </label>
	        <input type="text" name="nom" onblur="verifNom(this)" class="form-control" placeholder="nom" required>
	          <div class="invalid-feedback">
		        il faut au moins deux carractères pour le nom
		      </div>
		  </div>
		  <div class="form-group">
		    <label for="prenom">Prénom:</label>
		    <input type="text" name="prenom" onblur="verifPrenom(this)" class="form-control" placeholder="Prénom" required>
	          <div class="invalid-feedback">
		        il faut au moins deux carractères pour le prénom
		      </div>
		  </div>
		  <div class="form-group">
		    <label for="pass">Mot de passe:</label>
		    <input type="password" name="pass" id="pass1" onblur="verifPass(this)" class="form-control" placeholder="Password" required>
		  </div>
		  <div class="form-group">
		    <label for="pass2">Retapez votre mot de passe:</label>
		    <input type="password" name="pass2" id="pass2" onblur="verifPass2(this)" class="form-control" placeholder="Password" required>
		  </div> 
		  <div class="form-group">
		    <label for="mail">Email:</label>
		    <input type="email" name="mail" onblur="verifMail(this)" class="form-control" aria-describedby="emailHelp"  placeholder="Entrez votre email" required>
	          <div class="invalid-feedback">
		        Entrez un email valide
		      </div>
		    <small id="emailHelp" class="form-text text-muted">Vos données ne seront jamais partagées avec quiconque.</small>
		  </div>
		  <button type="submit" class="btn btn-primary">Démarrer!</button>
		</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../controller/SignUpController.js"></script>

</body>
</html>