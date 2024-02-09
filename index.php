<?php

require "db.php";


$query = $pdo->query("SELECT * FROM user");


if ($query === false) {
    var_dump($pdo->errorInfo());
    die("Erreur SQL");
}

$users = $query->fetchAll();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
        <link rel="stylesheet" href="./assets/css/styles.css">
    </head>
    <body>
        <h1>CRUD</h1>
        <div class="contain">
            <div class="containUserName">
                <h2>Prénom</h2>
                <ul class="ulUser">
                    <?php foreach ($users as $user): ?>
                        <li><?= $user["prenom"]?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="containUserFamilyName">
                <h2>Nom</h2>
                <ul class="ulUser">
                    <?php foreach ($users as $user): ?>
                        <li><?= $user["nom"]?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="containMail">
                <h2>Adresse mail</h2>
                <ul class="ulUser">
                    <?php foreach ($users as $user): ?>
                        <li><?= $user["mail"]?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="containCodePostal">
                <h2>Code Postal</h2>
                <ul class="ulUser">
                    <?php foreach ($users as $user): ?>
                        <li><?= $user["codePostal"]?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="editBtn">
                <?php foreach ($users as $user): ?>
                    <a href="edit.php?id=<?=$user["id"]?>">Modifier</a>
                <?php endforeach ?>
            </div>
            <div class="deleteBtn">
                <?php foreach ($users as $user): ?>
                    <a href="delete.php?id=<?=$user["id"]?>">Supprimer</a>
                <?php endforeach ?>
            </div>
        </div>
        <div class="containadd">
            <a href="adduser.php" id="useradd">Ajouter un utilisateur</a>
        </div>

    </body>
</html>

