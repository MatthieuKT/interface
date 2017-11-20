<!DOCTYPE html>
<html>
<head>
	<title>portail</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
<?php
if (isset($_GET['res'])) {
	$res = $_GET['res'];
	if ($res === '1') {
		echo '<div class="alert alert-danger" role="alert">
					Ce code n\'existe pas, veuillez entrer un code valide
			 </div>';
	}
}
?>
	<form method="post" action="portalController.php">
		<label for="firstStep">classCode: </label>
		<input type="text" name="classCode">
		<input type="submit">
	</form>
</div>
</body>
</html>