<?php
    // Informations de connexion à la base de données
    include("php/connexionBDD.php");
    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    // Récupérer les données depuis la base de données
    $sql = "SELECT image, title, description FROM products";
    $result = $conn->query($sql);
    $blogItems = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $blogItems[] = [
            "image" => $row["image"],
            "title" => $row["title"],
            "description" => $row["description"]
            ];
        }
    }
    $conn->close();
?>