<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>TestBulko - 2017</title>
	<meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
	<link rel="icon" type="image/vnd.microsoft.icon" href="http://www.bulko.net/templates/img/favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="http://www.bulko.net/templates/img/favicon.ico" />
	<link rel="stylesheet" href="https://cdn.bootcss.com/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="./asset/css/styles.css">
</head>
<body>
	<header>
		<div class="wrapper">
			<a class="logo-bulko" href="http://www.bulko.net/" title="Logo Agence Bulko"><img src="./asset/img/logoBulko.png" alt="Logo Agence Bulko" ></a>
			<a class="logo-github" href="https://github.com/Bulko/test-dev-bulko/blob/master/README.md" title="Lire les consignes" target="_blank" rel="noopener">
				<img src="./asset/img/github-icon.png" alt="Logo github">README.md
			</a>
		</div>
	</header>
	<main>
	
	<?php
		$emailErr = $telErr = "";
		$email = $tel = $nom = $message = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["email"])){
				$emailErr = "Veuillez renseigner votre email";
			}else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				$emailErr = "Mauvais format d'email. ";
			}else{
				$email = $_POST["email"];
			}
			
			if(empty($_POST["tel"])){
				$telErr = "Veuillez renseigner votre numero de telephone";
			}else if(!preg_match("/^[0]{1}[0-9]{9}$/", $_POST["tel"])){
				$telErr = "numéro de téléphone invalide. ";
			}else{
				$tel = $_POST["tel"];
			}
			$nom = $_POST["nom"];
			$message = $_POST["message"];
		}
	?>
		<!-- <div class="form-ok">Pour votre message de validation de formulaire</div> -->
		<!-- <div class="form-error">Pour votre message d'erreur</div> -->
		<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<p>Contactez-nous</p>
			<div class="form-part-1">
				<div class="form-control">
					<input type="text" name="nom" placeholder="Nom" />	
				</div>
				<div class="form-control"><?php echo $emailErr;?>
					<input type="email" name="email" placeholder="Email" />		
				</div>
				<div class="form-control"><?php echo $telErr;?>
					<input type="tel" name="tel" placeholder="Téléphone" />	
				</div>
			</div>
			<div class="form-part-2">
				<div class="form-control">
					<textarea name="message" placeholder="Message">
					</textarea>
				</div>
				<input type="submit" value="Envoyer" />
			</div>
		</form>
	</main>
	<footer>
		<p>© Bulko - 2017<br>🦄  GLHF</p>
	</footer>
</body>
</html>