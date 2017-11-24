			<h4 class="card-title">Le ClassCode: #<?php if (isset($_GET['code'])) {echo $_GET['code'];}?></h4>
			    <p class="card-text">Partagez ce classCode avec vos élèves pour qu'ils s'inscrivent sur <a href="#">MasterClass</a>.</p>
			    <a href="#" class="btn btn-outline-primary">Ou ajoutez-les</a>

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

				// Si le code est sur nouvelle classe
				// On démarre une requête mysqli
				$data = mysqli_query($connexion, 'SELECT nom_eleve, prenom_eleve
												  FROM eleves el, classe cl
												  WHERE el.classCode = cl.classCode
												  AND cl.prof_ID="'.$_SESSION["id"].'" AND el.classCode="'.$classCode.'"');
				while($donnees = mysqli_fetch_assoc($data)) {
					echo '<tr><td>' .$donnees['nom_eleve']. '</td><td>' .$donnees['prenom_eleve']. '</td>
					<td></td></tr>';
				};
				if(isset($classCode)){
					// On va éviter de faire appel à une autre page 
			 	}	

			?>




			</tbody>
		</table>
	</div>