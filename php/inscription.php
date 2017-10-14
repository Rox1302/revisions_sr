<?php
session_start();

/* ----------------------------------------------//
Améliorations à faire:
- rajouter une confirmation de mail
- hasher le mot de passe pour qu'il ne soit
  pas en clair dans la bdd
- css
// ---------------------------------------------*/

include '../includes/PDO.php';

// VERIFICATION DES INFORMATIONS DU FORMULAIRE
if(isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["pseudo"]) AND isset($_POST["mail"]) AND isset($_POST["mdp"]))
{
  $nom = htmlspecialchars($_POST["nom"]);
  $prenom = htmlspecialchars($_POST["prenom"]);
  $pseudo = htmlspecialchars($_POST["pseudo"]);
  $mail = htmlspecialchars($_POST["mail"]);
  $mdp = htmlspecialchars($_POST["mdp"]);
  if(isset($_POST["semestre"]))
  {
    $semestre = htmlspecialchars($_POST["semestre"]);
  }

  // Vérifie que le pseudo n'es pas déjà utilisé
  $reqpseudo = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
	$reqpseudo->execute(array($pseudo));
	$pseudoexist = $reqpseudo->rowCount();
  if($pseudoexist !== 0)
	{
    $erreur_pseudo = "ERREUR : Pseudo déjà utilisé.";
  }

  // Vérifie que le mail n'es pas déjà utilisé
  $reqpseudo = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
	$reqpseudo->execute(array($mail));
	$pseudoexist = $reqpseudo->rowCount();
  if($pseudoexist !== 0)
	{
    $erreur_mail = "ERREUR : Adresse mail déjà utilisée.";
  }

  // Génération d'une chaine aléatoire pour la création du cookie
  function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789$')
  {
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
      $pos = mt_rand(0, $nb_lettres);
      $car = $chaine[$pos];
      $generation .= $car;
    }
    return $generation;
  }

  $random = chaine_aleatoire(12);
  $date_inscription= date("Y")."-".date("m")."-".date("d");

  if(!isset($erreur_pseudo) AND !isset($erreur_mail))
  {
    if(!isset($semestre))
    {
      $req=$bdd->prepare
      (
        'INSERT INTO user(nom, prenom, pseudo, mdp, random, date_inscription, mail)
        VALUES (:nom, :prenom, :pseudo, :mdp, :random, :date_inscription, :mail)'
      );
      $req->bindParam(":nom",$nom);
      $req->bindParam(":prenom",$prenom);
      $req->bindParam(":pseudo",$pseudo);
      $req->bindParam(":mdp",$mdp);
      $req->bindParam(":random",$random);
      $req->bindParam(":date_inscription",$date_inscription);
      $req->bindParam(":mail", $mail);
      $req->execute();

      //Ensuite on crée la session et on redirrige la personne sur la page d'index
      $_SESSION["pseudo"] = $pseudo;
      header('Location: ../index.php');
    }

    elseif(isset($semestre))
    {
      $req=$bdd->prepare
      (
        'INSERT INTO user(nom, prenom, pseudo, mdp, random, date_inscription, mail, semestre)
        VALUES (:nom, :prenom, :pseudo, :mdp, :random, :date_inscription, :mail, :semestre)'
      );
      $req->bindParam(":nom",$nom);
      $req->bindParam(":prenom",$prenom);
      $req->bindParam(":pseudo",$pseudo);
      $req->bindParam(":mdp",$mdp);
      $req->bindParam(":random",$random);
      $req->bindParam(":date_inscription",$date_inscription);
      $req->bindParam(":mail", $mail);
      $req->bindParam(":semestre", $semestre);
      $req->execute();

      //Ensuite on crée la session et on redirrige la personne sur la page d'index
      $_SESSION["pseudo"] = $pseudo;
      header('Location: ../index.php');
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
    <form action="inscription.php" method="post">
      Nom <input type="text" name="nom" value="" required>
      <br>
      Prénom<input type="text" name="prenom" value="" required>
      <br>
      Pseudo <input type="text" name="pseudo" value="" required>
      <br>
      Mail<input type="mail" name="mail" value="" required>
      <br>
      Mot de passe<input type="password" name="mdp" value="" required>
      <br>
      Semestre <select name="semestre">
        <option value="semestre_1">Semestre 1</option>
        <option value="semestre_2">Semestre 2</option>
        <option value="semestre_3_sr">Semestre 3 SR </option>
        <option value="semestre_3_il">Semestre 3 IL</option>
        <option value="semestre_4_sr">Semestre 4 SR </option>
        <option value="semestre_4_il">Semestre 4 IL</option>
        <option value="semestre_5_sr">Semestre 5 SR </option>
        <option value="semestre_5_il">Semestre 5 IL</option>
      </select>
      <br><br>
      <button class="bouton_1" type="submit" name="option" value="inscription">Valider</button>

    </form>
    <br>
    <?php
    if(isset($erreur_mail) OR isset($erreur_pseudo))
    {
      echo "Une erreur s'est produite. Votre adresse mail ou votre pseudo est déjà utilisé.";
    }
    ?>

    Déjà inscrit ? Connectez-vous <a href="connection.php">ici</a>
  </body>
</html>
