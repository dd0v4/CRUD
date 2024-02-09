<?php

require "db.php";


$query = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$query->execute([
    "id" => $_GET["id"]
]);

if ($query === false) {
    var_dump($pdo->errorInfo());
    die("Erreur SQL");
}

$user = $query->fetch();

if(isset($_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['codePostal'])){
    $query = $pdo->prepare("UPDATE user  SET prenom = :prenom, nom = :nom, mail = :mail, codePostal = :codePostal WHERE id =:id");
    $query->execute([
        "prenom" => $_POST["prenom"],
        "nom" =>  $_POST["nom"],
        "mail" => $_POST["mail"],
        "codePostal" => $_POST["codePostal"],
        "id" => $_GET["id"]
    ]);
    header("Location: index.php");
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
        <h1>Modifier l'utilisateur</h1>
        <form action="" method="post">
            <div class="form">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?= htmlentities($user['prenom'])?>">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?= htmlentities($user['nom'])?>">
                <label for="mail">Adresse mail :</label>
                <input type="email" name="mail" value="<?= htmlentities($user['mail'])?>">
                <label for="codePostal">Code postal :</label>
                <input type="number" name="codePostal" value="<?= htmlentities($user['codePostal'])?>">
                <input type="submit" value="Soumettre" id="btnsubmit">
            </div>
        </form>
    </body>
</html>

