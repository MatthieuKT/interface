<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sign/view/css/style.css">
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
    <a href="sign/view/login.php" class="btn btn-outline-success" role="button">Se connecter</a>
	<a href="sign/view/signIn.php" class="btn btn-outline-success" role="button">S'inscrire</a>
  </div>
</nav>

<div class="container">
	<div class="row justify-content-md-center">
		<div id="signForm" class="col-md-6 border border-primary rounded">
			<?php
			// Si la connnexion n'a pas matché, on affiche un message d'erreur
				if (isset($_GET['res'])) {
					$res = $_GET['res'];
					if ($res === '1') {
					echo '<div class="alert alert-danger" role="alert">
							Ce code n\'existe pas, veuillez entrer un code valide
				 		 </div>';
					}
				}
			?>
			<form action="appli/controller/classCodeController.php" method="post">
			  <div class="form-group">
			    <div class="input-group">
				    <span class="input-group-addon">#</span>
				    <input type="text" class="form-control" id="classCode" name="classCode" placeholder="classCode">
				  </div>
			  </div>
			  <button type="submit" class="btn btn-primary">OK</button>
			</form>
		</div>
	</div>
</div>

</body>
</html>