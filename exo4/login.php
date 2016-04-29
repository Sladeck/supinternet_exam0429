<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>


    <?php
    if(isset($_SESSION['login']) && !file_exists($_SESSION['login']."@supmail.fr.txt")){
      session_unset();
      header("Location: login.php");
    }

        if(isset($_SESSION['login'])){
          echo("Vous êtes connecté !");

          ?>
          <form action="login.php" method="post">
            <p>Nouveau mail :</p><br>
            Destinataire : <br><input type="text" name="destinataire" required><br><br>
            Texte : <br><textarea name="textarea" rows="8" cols="40"></textarea><br><br>
            <input type="submit" name="validMail">
          </form><br><br>
          <!-- <form action="login.php" method="post">
            <input type="submit" name="Deco" value="Deconnexion"> //Envoie l'autre form pour la deco, donc pas bon.
          </form> -->
          <p>
            Voici vos mails :
          </p>
          <?php
          if(isset($_POST['Deco'])){
            session_unset();
            header("Location: login.php");
          }
          $Mails = fopen($_SESSION['login']."@supmail.fr.txt", "a+"); //Affichage des mails
          while(($Content = fgets($Mails)) != feof($Mails)){
            echo $Content."<br>";
          }
          fclose($Mails);

          if(isset($_POST['destinataire']) && isset($_POST['textarea']) && isset($_POST['validMail'])){ //Envoi d'un mail
            $fileName = $_POST['destinataire'].'@supmail.fr.txt';

            if(file_exists($fileName)){

              $mail = fopen($fileName, "a+");
              $contenu = $_POST['textarea'];
              $contenu = "\r\n\r\n"."Destinataire : ".$_POST['destinataire']."\r\n"."Message : ".$contenu;
              fputs($mail, $contenu);
              fclose($mail);
              echo("Email envoyé avec succés !");
            }else{
              echo("Le destinataire n'existe pas !");
            }
          }
        }else{
          if(isset($_POST['valid']) && isset($_POST['pseudo']) && isset($_POST['pass'])){

            $nameFile = $_POST['pseudo'].'@supmail.fr.txt';

            if(file_exists($nameFile)){

              $fichier = fopen($nameFile, 'a+'); // Ouverture Fichier
              $ligne = fgets($fichier);

              if($ligne = password_hash($_POST['pass'], PASSWORD_DEFAULT)){ //Verifie le mot de passe
                $_SESSION['login'] = $_POST['pseudo'];
                header("Location: login.php");
              }
              fclose($fichier);
            }else{
              echo("Vous n'êtes pas inscrit !");
              echo("<br><a href='login.php'>Retour</a>");
            }
          }else{
            ?>
            <form action="login.php" method="post">
              <p>Pour accéder au site, veuillez vous connecter</p><br>
              Pseudo : <br><input type="text" name="pseudo" required><br><br>
              Mot de Passe : <br><input type="password" name="pass" required><br><br>
              <input type="submit" name="valid"><br><br>
              <a href='../exo4.php'>Retour</a>
            </form>
            <?php
          }

        }
     ?>
  </body>
</html>
