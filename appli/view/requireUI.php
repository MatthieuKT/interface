<h4 class="card-title">Le ClassCode: #<?php if (isset($_GET['code'])) {echo $_GET['code'];}?></h4>
    <p class="card-text">Partagez ce classCode avec vos élèves pour qu'ils s'inscrivent sur <a href="#">MasterClass</a>.</p>
<!--Le formulaire d'ajout d'un élève-->
<div class="row justify-content-md-center">
	<form action="" method="post" class="form-inline">
	  <div class="form-group mx-sm-3">
	      <input type="text" name="nom_Eleve" class="form-control" id="nomClasse" placeholder="Nom">
	  </div>
	  <div class="form-group mx-sm-3">
	      <input type="text" name="prenom_eleve" class="form-control" id="nomClasse" placeholder="Prénom">
	  </div>
	  <button type="submit" name="newClass" class="btn btn-outline-success">Ajouter</button>
	</form>
</div>


<!--Cette div centre le tableau -->
<div id="tableDisplay" class="row justify-content-md-center">
	<table class="table table-striped table-hover w-50">
	    <thead>
	     <tr>
	       <th scope="col">Nom</th>
	       <th scope="col">Prénom</th>
	       <th scope="col">supprimer</th>
	     </tr>
	    </thead>
	    <tbody>
			<?php
			// On démarre une requête mysqli
			$data = mysqli_query($connexion, 'SELECT nom_eleve, prenom_eleve
											  FROM eleves el, classe cl
											  WHERE el.classCode = cl.classCode
											  AND cl.prof_ID="'.$_SESSION["id"].'" AND el.classCode="'.$classCode.'"');
			while($donnees = mysqli_fetch_assoc($data)) {
				echo '<tr><td>' .$donnees['nom_eleve']. '</td><td>' .$donnees['prenom_eleve']. '</td>
				<td></td></tr>';
			};
			?>
		</tbody>
	</table>
</div>