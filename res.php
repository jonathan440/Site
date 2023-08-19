<!DOCTYPE html>
<html lang="fr">
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

    

    // nombre de bonne réponse
    $QR = array(
        "q1" => 1,
        "q2" => 1
    );


    // recupere les reponses dans le form
    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];


    // ajoute toute les questions dans un tableau pour parcourir
    $Q = array("",$Q1,$Q2);

    for ($i = 1; $i < count($Q); $i++){
        $nbr = 0;
        foreach($Q[$i] as $val){
                if($val == 'ok'){
                    $nbr += 1;
                }
        }
        if($nbr == $QR['q'.$i] and count($Q[$i]) == $QR['q'.$i]){
                echo $nbr." bonne reponse: +1";
                $res += 1;
        }else echo  $nbr." bonne reponse";
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


<p>Votre score est  <?php echo $res ?> !</p>






    
</body>
</html>