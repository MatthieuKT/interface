<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Login - Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 
	include_once "../view/components/navIndex.html";
?>

<div class="container">
<div class="row">

	<div class="col-md-7">
<?php
	if (isset($_GET['res'])) {
		$res = $_GET['res'];
		if ($res === '1') {
			echo '<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Votre compte à été créé avec succés!</h4>
				  <hr>
				  <p class="mb-0">Vous pouvez désormais vous connecter avec les identifiants saisis lors de l\'inscription.</p>
				  </div>';
		}
		elseif ($res === '2') {
			echo '<div class="alert alert-danger" role="alert">
				  <h4 class="alert-heading">Cet utilisateur existe déjà!</h4>
				  <hr>
				  <p class="mb-0">Connectez vous avec l\'adresse mail saisie lors de votre inscription.</p>
				  </div>';
		}
		elseif ($res === '3') {
			echo '<div class="alert alert-danger" role="alert">
				  <h4 class="alert-heading">Mauvais login/mot de passe</h4>
				  <hr>
				  <p class="mb-0">Veuillez réessayer</p>
				  </div>';
		}

	}
?>

</div>

<div id ="signForm" class="col-md-5 border border-primary rounded">
    <form action="../controller/loginController.php" method="POST" onsubmit="return verifForm(this)">
      <h1>Connexion</h1>
	  <div class="form-group">
	    <label for="mail">Email</label>
		<input type="email" name="mail" onblur="verifMail(this)" class="form-control" aria-describedby="emailHelp" placeholder="Email">
		<small id="emailHelp" class="form-text text-muted">Votre email ne sera jamais partagé avec quiconque.</small>
	  </div>
	  <div class="form-group">
	    <label for="pass">Mot de passe:</label>
	    <input type="password" name="pass" onblur="verifPass(this)" class="form-control" placeholder="Mot de passe">
	  </div>
	  <button type="submit" class="btn btn-primary">Se connecter</button>
	</form>
</div>
</div><!--/.row-->
</div><!--/.container-->

<script type="text/javascript" src="../controller/signInController.js"></script>
</body>
</html>