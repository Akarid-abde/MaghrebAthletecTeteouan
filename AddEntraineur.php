<?php
session_start();
include 'db_connect.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

       // Récupérer les données du formulaire
       $nom = $_POST["Nom"];
       $prenom = $_POST["PRENOM"];
       $diplome = $_POST["Diplôme"];
       $tele = $_POST["Tele"];
       $adresse = $_POST["Adresse"];
    //    $idSeances =  $conn->real_escape_string($_POST['IdSéances']);
       $idTerrain =  $conn->real_escape_string($_POST['IdTerrain']);

    // Préparer la requête SQL d'insertion avec une requête préparée
    $sql = "INSERT INTO entraineur (Nom, Prenom, Adresse, Tele, Diplôme,IdTerrain) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

// Vérifier si la préparation de la requête a réussi
if ($stmt) {
    // Lier les paramètres à la requête
    $stmt->bind_param("ssssss", $nom, $prenom, $adresse, $tele, $diplome,$idTerrain);

    // Exécuter la requête
    if ($stmt->execute()) {
        $messagesuccess = "added successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: AissaEntraneur.php");
        exit();
    } else {
        // Erreur lors de l'exécution de la requête
        echo  $conn->error;
        exit();
    }
} else {
    // Erreur de préparation de la requête
    header("Location: Error.php");
    exit();
}
}
?>