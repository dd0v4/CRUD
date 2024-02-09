<?php

require "db.php";

if (!isset($_GET["id"])) {
    die("Merci de spécifier l'id de l'utilisateur");
}


$query = $pdo->prepare("DELETE FROM user WHERE id = :id");
$result = $query->execute(["id" => $_GET["id"]]);


if ($result === false) {
    var_dump($pdo->errorInfo());
    die("Error executing the SQL query");
}

header("Location: index.php");
