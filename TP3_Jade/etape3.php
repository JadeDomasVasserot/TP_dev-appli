<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>TP2</title>
</head>

<body>
	<h1 style="text-align: center; font-weight: 600; text-decoration:underline;">Elections Municipales du Covid</h1>
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
		<form method = "get" action="resultat1personne.php">
		<?php foreach ($candidats as $candidat)  //pour chaque élément
		{ 
			echo "<input type=\"radio\" name=\"envoi\" value=\"".$candidat["id"]."\">".$candidat["prenom"]." ".$candidat["nom"]."<br><br><br>"; //  \"    \" --> echappement --> pas arrêter chaine mais fait partie de la chaine.
		}	

			
		?>

	<br>	

	<br> <input type="submit"  value="Envoyer">
</form>
</body>
</html>