<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>modifier une classe - Masterpiece</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	require_once "navbar.html";
?>
<div class="container">
	<h1><?php echo $_POST['modifyClass'];?></h1>

	<?php

	if (isset($_POST['modifyClass'])) {
		$postClass =  htmlspecialchars($_POST['modifyClass']);

		require_once "../model/DBConnexion.php";

		$data = mysqli_query($connexion, 'SELECT
	                                     nom_eleve, prenom_eleve
	                                    From 
	                                     eleves el, classe cl 
	                                    WHERE 
	                                     el.classCode = cl.classCode 
	                                    AND 
	                                     cl.prof_ID="'.$_SESSION["id"].'"
	                                    AND 
	                                    el.classCode="'.$postClass.'"');

	?>

	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Nom</th>
		      <th scope="col">Prénom</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
			  while($donnees = mysqli_fetch_assoc($data)) {
			    echo '<tr><td>' .$donnees['nom_eleve']. '</td><td>' .$donnees['prenom_eleve']. '</td></tr>';
			  }
			}
			?>
		  </tbody>
	</table>
</div><!--/.container-->
</body>
</html>