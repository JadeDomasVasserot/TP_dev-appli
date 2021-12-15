<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="cssetape1.css">
	<title>affichertouscandidats</title>
</head>

<body>
	<h1>Election</h1>
		<?php 
            $username = 'root';
            $password = '';
            try {
            $conn = new PDO("mysql:host=localhost;dbname=vote", $username, $password);
       		 } catch (Exception $e) {
       		 	die ("Une erreur est survenue. 	$e");
       		 }
    		$req = $conn->prepare("SELECT * FROM candidat;"); //prepare --> requetes préparées
			$req->execute(); // exécuter requêtes préparés (UPDATE/INSERT/DELETE) --> éviter injection SQL --> 
			$candidats = $req->fetchAll(); // tous récupérer

		?>
		<form method = "get" action="resultetape1.php">
		<?php foreach ($candidats as $candidat)  //pour chaque élément
		{ 
			echo "<input type=\"radio\" name=\"envoi\" value=\"".$candidat["id"]."\">".$candidat["prenom"]." ".$candidat["nom"]."<br><br><br>"; //  \"    \" --> echappement --> pas arrêter chaine mais fait partie de la chaine.
		}	

			
		?>


	<br> <input type="submit" name="envoi" value="Envoyer">
</form>
</body>
</html>