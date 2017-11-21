<?php
session_start();

if (isset($_POST['newClass']) && isset($_POST['nomClasse'])) {
	$classCode = rand(1000,9999);
	$nomClasse = htmlspecialchars($_POST['nomClasse']);

  // Connexion à la DB
  require_once "../model/DBConnexion.php";

  $isExist = 'SELECT classCode FROM classe WHERE classCode="'.$classCode.'"';
  $exist = mysqli_query($connexion, $isExist);
  $row = mysqli_num_rows($exist);

  if ($row > 0) {
  	# code à éxecutér pour produite un nouveau classCode
  	echo "cette classe existe déjà (message au dev)";
  }

  else {
    // On renforcera la sécurité plus tard
    if (strlen($nomClasse) < 2) {
      echo "on insère";
      $sql = 'INSERT INTO classe(classCode, prof_ID, nomClasse) VALUES ("'.$classCode.'", "'.$_SESSION['id'].'", "'.$nomClasse.'")';
      $insert = mysqli_query($connexion, $sql);
      header('Location: ../view/class.php?res=1');
    }

  }

}

/*
*   Cette partie gère l'affichage des classes et de leurs élèves
*/

if (isset($_POST['postClass'])) {
  $postClass = htmlspecialchars($_POST['postClass']);

  // Connexion à la DB
  require_once "../model/DBConnexion.php";

  $data = mysqli_query($connexion, 'SELECT
                                     nom_eleve, prenom_eleve 
                                    From 
                                     eleves el, classe cl 
                                    WHERE 
                                     el.classCode = cl.classCode 
                                    AND 
                                     cl.prof_ID="'.$_SESSION["id"].'"');


  while($donnees = mysqli_fetch_assoc($data)) {
    echo $donnees['nom_eleve']. " ";
    echo $donnees['prenom_eleve'];
  }

}
?>