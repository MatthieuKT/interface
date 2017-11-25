<h4 class="card-title">Le ClassCode: #<?php echo $classCode;?></h4>
    <p class="card-text">Partagez ce classCode avec vos élèves pour qu'ils s'inscrivent sur <a href="#">MasterClass</a>.</p>
<!--Le formulaire d'ajout d'un élève-->
<div class="row justify-content-md-center">
	<form action="addEleves.php?code=<?php echo $classCode;?>" method="post" class="form-inline">
	  <div class="form-group mx-sm-3">
	      <input type="text" name="nom_eleve" class="form-control" id="nomClasse" placeholder="Nom">
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
           <th scope="col">#</th>	
	       <th scope="col">Nom</th>
	       <th scope="col">Prénom</th>
	       <th scope="col">supprimer</th>
	     </tr>
	    </thead>
	    <tbody>
			<?php
			// On démarre une requête mysqli avec une jointure et un ORDER BY qui classe les élèves par ordre alphabétique
			$data = mysqli_query($connexion, 'SELECT nom_eleve, prenom_eleve
											  FROM eleves el, classe cl
											  WHERE el.classCode = cl.classCode
											  AND cl.prof_ID="'.$_SESSION["id"].'" AND el.classCode="'.$classCode.'"
											  ORDER BY nom_eleve');
			// Cette variable incrémente le numéro d'élève pour l'affichage
			$num = 1;
			// On boucle pour l'affichage. On met les noms et la première lettre du prénom en majuscules 
			while($donnees = mysqli_fetch_assoc($data)) {
				echo '<tr><td>'.$num.'</td><td>'.strtoupper($donnees['nom_eleve']).'</td><td>'.ucfirst($donnees['prenom_eleve']).'</td>
				<td></td></tr>';
				$num ++;
			};
			?>
		</tbody>
	</table>
</div>