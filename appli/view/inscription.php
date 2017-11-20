<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<style type="text/css" src="css/style.css"></style>
</head>
<body>

<nav id="navIndex" class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 25px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">MasterPiece</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
	<div id="signForm" class="col-md-6 border border-primary rounded">
		<form action="../controller/inscriptionController.php" method="post">
			<div class="form-group">
				<label for="nom">Nom: </label>
				<input type="text" class="form-control" name="nom">
			</div>
			<div class="form-group">
				<label for="prenom">Prénom: </label>
				<input type="text" class="form-control" name="prenom">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
</body>
</html>