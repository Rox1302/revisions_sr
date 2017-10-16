<?php
session_start();

/* ----------------------------------------------- //
Améliorations à faire :
- ajout de la focntinnalité de mot de passe oublié
- css
- test
// ----------------------------------------------- */


include '../includes/PDO.php';

// VERIFICATION DES INFORMATIONS DU FORMULAIRE
  if(isset($_POST["mail_connect"]) AND isset($_POST["mdp_connect"]))
  {
    $mail_connect = $_POST["mail_connect"];
    $mdp_connect = $_POST["mdp_connect"];

    // On vérifie que le mail existe dans la base de données
    $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
		$requser->execute(array($mail_connect));
    $mailexist = $requser->rowCount();
    // Si le mail n'existe pas
    if ($mailexist !== 1)
    {
      $erreur_pseudo = "ERREUR : Pseudo incorrect.";
    }
    // Si le mail existe
    elseif($mailexist == 1)
    {
      // Si les champs sont bien remplis, on vérifie qu'ils correspondent à un utilisateur présent dans la base de données
      $requser2 = $bdd->prepare("SELECT * FROM user WHERE mail = ? AND mdp = ?");
  		$requser2->execute(array($mail_connect, $mdp_connect));
  		$userexist = $requser2->rowCount();
  		if($userexist == 1)
  		{
  			// Si elles sont correctes
  			$userinfo = $requser2->fetch();

        // Création d'un cookie
        if(isset($_POST["souvenir"]) /*AND $_POST["souvenir"] == "on"*/)
				{
					$temps=365*24*3600;
					setcookie("authentification",$userinfo["pseudo"].'--------'.sha1($userinfo["random"].$_SERVER['REMOTE_ADDR']),time()+ $temps, '/', null, false, true);
          /*echo "cookie connexion: <br/>";
          var_dump($_COOKIE['authentification']);
          echo "<br />";*/

          // CONNEXION ET REDIRECTION VERS L'INDEX
          $_SESSION['pseudo'] = $userinfo['pseudo'];
          header('Location: ../index.php');
				} // ---------------------------------------------------
  		}
  		else
  		{
  			$erreur_mdp = "ERREUR : Mot de passe incorrect.";
  		}
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/master.css">
    <title>Système et réseaux</title>
  </head>

  <header>
    <?php include '../includes/menu.php' ?>
  </header>

  <body>
    <form action="connexion.php" method="POST">
      Mail <input type="text" name="mail_connect" required>
      <br>
      Mot de passe <input type="password" name="mdp_connect" value="">
      <br><br>
      <input type="checkbox" checked="checked" name="souvenir"> Se souvenir de moi
      <br>
      <a href="#">Mot de passe oublié ?</a>
      <br><br>
      <button class="bouton_1" type="submit" name="option" value="connexion">Valider</button>
    </form>

    Pas encore inscrit ? Inscris-toi <a href="inscription.php">ici</a>
  </body>
</html>