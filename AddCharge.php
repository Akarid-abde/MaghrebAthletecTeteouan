<?php
session_start();
include 'db_connect.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


       $PrixMateriaux = $_POST["PrixMateriaux"];
       $Transport = $_POST["Transport"];
       $Assurance = $_POST["Assurance"];


    // Préparer la requête SQL d'insertion avec une requête préparée
    $sql = "INSERT INTO charges (PrixMateriaux, Transport, Assurance) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

// Vérifier si la préparation de la requête a réussi
if ($stmt) {
    // Lier les paramètres à la requête
    $stmt->bind_param("sss", $PrixMateriaux, $Transport, $Assurance);

    // Exécuter la requête
    if ($stmt->execute()) {
        $messagesuccess = "added successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: Charges.php");
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