<?php
session_start();

if (isset($_GET['code']) && isset($_GET['id'])) {
	$code= htmlspecialchars($_GET['code']);
	$id= htmlspecialchars($_GET['id']);
}?>

<div class="row justify-content-md-center">
	<form action="" method="post" class="form-inline">
	  <div class="form-group mx-sm-3">
	      <input type="text" name="newNom" class="form-control" id="nomClasse" placeholder="Nom">
	  </div>
	  <div class="form-group mx-sm-3">
	      <input type="text" name="newPrenom" class="form-control" id="nomClasse" placeholder="Prénom">
	  </div>
	  <button type="submit" name="newClass" class="btn btn-outline-success">Modifier</button>
	</form>
</div>

<?php
	if (isset($_POST['newNom']) && isset($_POST['newPrenom'])) {
		$newNom = $_POST['newNom'];
		$newPrenom = $_POST['newPrenom'];

		// Connexion à la DB
		require_once "../model/DBConnexion.php";

		$query = mysqli_query($connexion, 'UPDATE eleves SET nom_eleve="'.$newNom.'", prenom_eleve="'.$newPrenom.'" WHERE id_eleve="'.$id.'"');

		header('Location: ../view/class.php?code='.$_GET['code']);
	}
?>