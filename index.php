<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>TEST</title>
</head>

<body>

<h1>Titre</h1>

<form action="post.php" method="post">
    <label for="nom">Nom :  </label> <br>
    <input type="text" name="nom" />  <br>

    <label for="prenom">Prenom :  </label> <br>
    <input type="text" name="prenom" />  <br>

    <label for="mail">Mail :  </label> <br>
    <input type="text" name="mail" /> <br>

    <label for="maison">Maison:</label> <br>
    <input type="radio" name ='choix' value="MAISON1">
    <label for="maison1">Maison 1</label> <br>

    <input type="radio"  name ='choix' value="MAISON2">
    <label for="maison1">Maison 2</label> <br>

    <input type="radio"  name ='choix' value="MAISON3">
    <label for="maison1">Maison 3</label> <br>


    <input type="submit" name="submit" /> 
</form>

<?php


?>

    
</body>
</html>