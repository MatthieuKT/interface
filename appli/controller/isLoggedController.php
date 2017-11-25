<?php
// Si elle n'existe pas
if (!isset($_SESSION['id'])) {
	// On le renvoie vers une page qui lui explique qu'il ne peut pas accéder au contenu
	header('Location: ../view/erreur.php');
} 