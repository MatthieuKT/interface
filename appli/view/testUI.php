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




	
	<div id="classList">
		<h2>Mes classes</h2>


<nav class="nav nav-pills flex-column flex-sm-row">
<?php
	$resultat = mysqli_query($connexion, 'SELECT classCode, nomClasse FROM classe WHERE prof_ID="'.$_SESSION["id"].'"');
	while($donnees = mysqli_fetch_assoc($resultat)) {
		echo '<a class="yo flex-sm-fill text-sm-center nav-link" href="?code='.$donnees["classCode"].'">'.$donnees["nomClasse"].'</a>';
		//echo '<a class="yo flex-sm-fill text-sm-center nav-link" href="#">'.$donnees["nomClasse"].'</a>';
	}
?>
</nav>




	</div><!--/.tableList-->
</div><!--/.classList-->
</div><!--/.container-->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript">
	// On se base sur l'URL pour définir la classe active!
	$(document).ready(function() {
		// On stocke la valeur de l'URL dans une variable
		var url = window.location.href;
		// On ne veut que ce qu'il y a après le "?" donc on récupère sa position
		var pos = url.indexOf('?');
		// On détermine la longueur de l'URL entière
		var len = url.length;
		// On soustrais la longueur totale de l'URL à l'index de "?", il nous reste donc le paramètre
		var param = url.substr(pos, len - pos);

		console.log('param init', param);

		// A tous les liens
		$(".yo").each(function() {
			// On récupère la valeur de leur attribut href
			var href = $(this).attr('href');
			console.log('param', param);
			console.log('href', href);
			// Celui parmi eux qui correspond à l'attribut en URL, se voit attribué la classe active 
			if (param === href) {
				$(this).addClass("active")
			} else {
				// Les autres on leur enlève
				$(this).removeClass("active");
			}
		});
	});

</script>
</body>
</html>

