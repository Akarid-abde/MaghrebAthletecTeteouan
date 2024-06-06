<?php
session_start();
include 'db_connect.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire
    $heure = $_POST["Heure"];
    $identraineur =  $conn->real_escape_string($_POST['IdEntraineur']);
   
    // Définir la locale en français
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    $day = $_POST["Day"];
    $date = DateTime::createFromFormat('d/m/Y', $day); // Crée un objet DateTime à partir de la chaîne de date
    if ($date !== false) {
        $dayName = strftime('%A', $date->getTimestamp()); // Obtient le nom complet du jour en français
    } 
    
    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO séances (Day, Heure,IdEntraineur) VALUES (?, ?, ?)";

    // Préparer la déclaration mysqli
    $stmt = $conn->prepare($sql);
    
    // Vérifier si la préparation de la requête a réussi
    if ($stmt) {
    // Lier les paramètres à la requête
    $stmt->bind_param("sss", $dayName, $heure, $identraineur);

    // Exécuter la requête
    if ($stmt->execute()) {
        $messagesuccess = "added successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: AissaSeaces.php");
        exit();
    } else {
        // Erreur lors de l'exécution de la requête
        header("Location: Error.php");
        exit();
    }
} else {
    // Erreur de préparation de la requête
    header("Location: Error.php");
    exit();
}
}
?>