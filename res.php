<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Res</title>
</head>

<body>

<h1>Titre </h1>

<?php
   // Vérifier si le formulaire est soumis 
   if ( isset( $_POST['submit2'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
   
    $res = 0;

    echo "Debug...";
    $nom = $_POST['nom']; echo "nom=".$nom;
    $mail = $_POST['mail']; echo "  mail = ".$mail;

    $r1 = "reponse1";
    $r2 = "reponse2";
    $r3 = "reponse3";

    // Les réponses 
    $QR = array(
        "q1" => $r3,
        "q2" => $r1
    );


    // recupere les reponses dans le form
    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];
    
    $Q = array("",$Q1,$Q2);

    for ($i = 1; $i < count($Q);$i++){
        if($Q[$i] == $QR['q'.$i.'']){
            $res += 1;
            echo "Bonne reponse pour la question !".$i;
        }
        else echo "Perdu pour ".$i;
    }

    echo "  Res =  ".$res;


     // connexion base de données
     try
     {
       $bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8', 'root', '');
       // update
       $sql = "UPDATE users SET resultat = $res where nom = '$nom' and mail ='$mail'";
       $bdd ->exec($sql);


        // get resulat
       echo '<h1>Resultat</h1>';
       $reponse = $bdd->query('SELECT maison, SUM(resultat) as res FROM users GROUP by maison');
       while ($donnees = $reponse->fetch())
       { ?>
       <p> <?php echo $donnees['maison'].":  ".$donnees['res'];  ?> </p> <br>
        
       <?php }
     }
     catch(Exception $e)
     {
         die('Erreur : '.$e->getMessage());
     }
 
     $bdd = null;

    

   

    
     
     
    
  }
  else echo "erreur";
?>









    
</body>
</html>