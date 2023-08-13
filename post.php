<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Titre</title>
</head>

<body>

<h1>Titre </h1>

<?php
   // Vérifier si le formulaire est soumis 
   if ( isset( $_POST['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $nom = $_POST['nom']; 
     $mail = $_POST['mail'];
     $maison = $_POST['choix'];

     // connexion base de données
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8', 'root', '');
      // insertion
      $sql = "INSERT INTO users(nom,mail,maison,resultat) VALUES ('$nom','$mail','$maison',0)";
      $bdd ->exec($sql);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $bdd = null;

    
     
    
  }
?>

<p>Bonjour <?php echo $nom  ?>  de la maison  <?php  echo $maison  ?>   </p>

<h2>Les questions</h2>

<form action="res.php" method="post">


  <label for="question">Question 1 ? </label> <br>

  <input type="radio" name ='Q1' value="reponse1">
  <label for="r"></label> r1 <br>

  <input type="radio" name ='Q1' value="reponse2">
  <label for="r"></label> r2 <br>

  <input type="radio" name ='Q1' value="reponse3">
  <label for="r"></label> r3 <br>


  <label for="question">Question 2 ? </label> <br>

<input type="radio" name ='Q2' value="reponse1">
<label for="r"></label> r1 <br>

<input type="radio" name ='Q2' value="reponse2">
<label for="r"></label> r2 <br>

<input type="radio" name ='Q2' value="reponse3">
<label for="r"></label> r3 <br>

<input type="hidden" name = 'nom' value = "<?php echo $nom ?>">
<input type="hidden" name = 'mail' value = "<?php echo $mail ?>">

  <input type="submit" name="submit2" /> 

</form>


    
</body>
</html>