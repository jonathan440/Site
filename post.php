<!DOCTYPE html>
<html lang="fr">
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
     $prenom = $_POST['prenom'];
     $mail = $_POST['mail'];
     $maison = $_POST['choix'];

     // connexion base de données
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8', 'root', '');
      // insertion
      $sql = "INSERT INTO users(nom,prenom,mail,maison,resultat) VALUES ('$nom','$prenom','$mail','$maison',0)";
      $bdd ->exec($sql);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $bdd = null;

    
     
    
  }
?>

<p>Bonjour <?php echo $prenom  ?>  de la maison  <?php  echo $maison  ?>   </p>

<h2>Les questions</h2>

<form action="res.php" method="post">


  <label for="question">Comment se nomme le sort permettant de transformer un animal en verre à pied ? </label> <br>

  <input type="checkbox" name ='Q1[]' value="ok">
  <label for="r"></label> Vera Verto <br>

  <input type="checkbox" name ='Q1[]' value="nok">
  <label for="r"></label> Tera Verto <br>

  <input type="checkbox" name ='Q1[]' value="nok">
  <label for="r"></label>Mega Vetro <br>

  <input type="checkbox" name ='Q1[]' value="nok">
  <label for="r"></label>Vade Retro<br>


  <label for="question">Sur quoi Neville Londubat transplante accidentellement ses oreilles ? </label> <br>

<input type="checkbox" name ='Q2[]' value="ok">
<label for="r"></label> un cactus <br>

<input type="checkbox" name ='Q2[]' value="nok">
<label for="r"></label> un arbuste <br>

<input type="checkbox" name ='Q2[]' value="nok">
<label for="r"></label> une tentacula vénéneuse <br>

<input type="checkbox" name ='Q2[]' value="nok">
<label for="r"></label> un pot <br>

<input type="hidden" name = 'nom' value = "<?php echo $nom ?>">
<input type="hidden" name = 'mail' value = "<?php echo $mail ?>">

  <input type="submit" name="submit2" /> 

</form>


      
</body>
</html>