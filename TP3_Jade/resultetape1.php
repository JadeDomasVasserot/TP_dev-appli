<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="cssetape1.css">
	<title>resultat</title>
</head>
<body>
		<?php
		//connexion à BDD
			$username = 'root';
            $password = '';
            try {
            	$conn = new PDO("mysql:host=localhost;dbname=vote", $username, $password); // new (objet)
       		} catch (Exception $e) { // permet de capturer les erreurs.
       		 	die ("Une erreur est survenue. 	$e"); // arrêter scripts et afficher valeurs
       		}
       		 if (isset($_GET["envoi"])) {
                        $req = $conn->query("INSERT INTO vote (idCandidat) VALUES (?); "); // ? pour les valeurs
                        $req->execute([$_GET["envoi"]]);
                        echo "<h1>Votre vote a été envoyé ! </h1>";
                  }
       		//connexion BDD
       		$result = $conn->query("SELECT candidat.nom , candidat.prenom , COUNT(*) as nbvotes FROM vote INNER JOIN candidat ON vote.idCandidat = candidat.id GROUP BY vote.idCandidat ORDER BY nbvotes DESC; "); // query --> requètes à $conn
       		while ($candidat = $result->fetch()) // retrouner résultat ligne par ligne
       		{
       		 echo "<p>nom et prénom: <br><br>".$candidat["nom"] ." ". $candidat["prenom"]. " <br> nombre de votes : " . $candidat["nbvotes"]. "<br><br><p>";	// .  concaténation de chaîne de caractère, string
       		}
		?>

</body>
</html>