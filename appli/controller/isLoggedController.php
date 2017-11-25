<?php
// On démarre une session pour récupérer les SESSIONS ID 
session_start();
// Si elle n'existe pas
if (!isset($_SESSION['id'])) {
	// On le renvoie vers une page qui lui explique qu'il ne peut pas accéder au contenu
	header('Location: ../view/erreur.php');
} 