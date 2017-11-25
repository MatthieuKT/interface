<?php
session_start();
require_once "../controller/isLoggedController.php";
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
	<div id="main" class="card text-center">
	    <div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				  <li class="nav-item">
   					 <a class="yo nav-link" href="?code=new">Nouvelle classe</a>
 				  </li>
				<?php
				// A rajouter absolument: empécher d'accéder aux pages sans login !!!!!!
					$resultat = mysqli_query($connexion, 'SELECT classCode, nomClasse FROM classe WHERE prof_ID="'.$_SESSION["id"].'"');
					while($donnees = mysqli_fetch_assoc($resultat)) {
						echo '<li class="nav-item">
								<a class="yo nav-link" href="?code='.$donnees["classCode"].'">'.$donnees["nomClasse"].'</a>
							 </li>';
					}
				?>
			</ul>	
		</div>
		<div id="content" class="card-body">
				<?php
				// Si le classCode est présent dans l'URL ET est un nombre
				if (isset($_GET['code']) /*&& is_numeric($_GET['code']*/) {
				// On sécurise la valeur du paramètre
				$classCode = htmlspecialchars($_GET['code']);
				// On affiche le formulaire de nouvelle classe
				if ($classCode === "new") {
					require_once "addClassForm.php";
				}
				// On affiche les tableaux de classes
				else {
					require_once "requireUI.php";	
				}
				}?>
		</div><!--/.card-body-->

	</div>
</div><!--/.container-->

<!--Font awesome's CDN!-->
<script src="https://use.fontawesome.com/c9ef11106f.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript">
	// On se base sur l'URL pour définir la classe active des liens!
	$(document).ready(function() {
		// On stocke la valeur de l'URL dans une variable
		var url = window.location.href;
		// On ne veut que ce qu'il y a après le "?" donc on récupère sa position
		var pos = url.indexOf('?');
		// On détermine la longueur de l'URL entière
		var len = url.length;
		// On soustrais la longueur totale de l'URL à l'index de "?", il nous reste donc le paramètre
		var param = url.substr(pos, len - pos);

		$(".yo").each(function() {
			// On récupère la valeur de leur attribut href
			var href = $(this).attr('href');
			var newClass = '?code=new'
			// Celui parmi eux qui correspond à l'attribut en URL, se voit attribué la classe active 
			if (param === href) {
				$(this).addClass("active")
				// le text center n'est là que pour les tableaux
				//$('#main').addClass('text-center');
			} else if (param === newClass) {
				// Le formulaire newClassForm peut ainsi être affiché normalement
				//$('#main').removeClass('text-center');
			}
			else {
				// Les autres on leur enlève l'actif
				$(this).removeClass("active");
			}
		});

	});

</script>
</body>
</html>

