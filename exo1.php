<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="exo1.php" method="post">
      <p> Veuillez commencez la partie de NIM</p><br>
      <input type="checkbox" name="check1">
      <input type="checkbox" name="check2">
      <input type="checkbox" name="check3">
      <input type="checkbox" name="check4">
      <input type="checkbox" name="check5">
      <input type="checkbox" name="check6">
      <input type="checkbox" name="check7">
      <input type="checkbox" name="check8">
      <input type="checkbox" name="check9">
      <input type="checkbox" name="check10">
      <input type="checkbox" name="check11">
      <input type="checkbox" name="check12">
      <input type="checkbox" name="check13"><br><br>
      <input type="submit" name="valid" value="Valider" id="valid">
    </form>
    <?php
    if (($_POST['check1'] || $_POST['check2'] || $_POST['check3'])  == 'checked') {
        
    }

     ?>

    <style media="screen">
      body{
        text-align: center;
        margin-top: 20%;
      }
    </style>
  </body>
</html>
