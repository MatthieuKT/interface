<?php
session_start();
// On détruit notre session 
session_destroy();
// On redirige vers l'index du site
header('Location: ../../sign/view/login.php');
