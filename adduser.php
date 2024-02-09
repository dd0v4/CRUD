<?php

require "db.php";

if(isset($_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['codePostal'])){
    $query = $pdo->prepare("INSERT INTO user (prenom, nom, mail, codePostal) VALUES (:prenom, :nom, :mail, :codePostal)");
    $query->execute([
        "prenom" => $_POST["prenom"],
        "nom" =>  $_POST["nom"],
        "mail" => $_POST["mail"],
        "codePostal" => $_POST["codePostal"]
    ]);
    header("Location: index.php");
    exit();
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="./assets/css/edit.css">
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form action="" method="post">
        <div class="form">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom">
            <label for="nom">Nom :</label>
            <input type="text" name="nom">
            <label for="mail">Adresse mail :</label>
            <input type="email" name="mail">
            <label for="codePostal">Code postal :</label>
            <input type="number" name="codePostal">
            <input type="submit" value="Soumettre" id="btnsubmit">
        </div>
    </form>
</body>
</html>
