<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exo4</title>
  </head>
  <body>
    <form action="exo4.php" method="post">
      Pseudo : <br><input type="text" name="pseudo" required><br><br>
      Mot de Passe : <br><input type="password" name="pass" required><br><br>
      <input type="submit" name="valid">
    </form><br><br>
    <a href="exo4/login.php">Se connecter</a>

    <?php
      if(isset($_POST['valid']) && isset($_POST['pseudo']) && isset($_POST['pass'])){

        $pseudo = $_POST['pseudo'];
        $pass = $_POST['pass'];
        $nameFile = 'exo4/'.$_POST['pseudo'].'@supmail.fr.txt';

        $fichier = fopen($nameFile, 'a+'); // Ouverture

        $pass = password_hash($pass, PASSWORD_DEFAULT)."\r\n"; //Hash du password

        $md5 = md5(1456651684);

        fputs($fichier, $pass.$md5); // Ecriture du password hashé

        fclose($fichier);
      }
     ?>

  </body>
  <style media="screen">
    body{
      text-align: center;
      margin-top: 15%;
    }
  </style>
</html>
