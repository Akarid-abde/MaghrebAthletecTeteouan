<?php
include 'db_connect.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $nom = filter_input(INPUT_POST, 'Nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'Prenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
    $tele = filter_input(INPUT_POST, 'tele', FILTER_SANITIZE_STRING);
    $adresse = filter_input(INPUT_POST, 'Adresse', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $ville = filter_input(INPUT_POST, 'Ville', FILTER_SANITIZE_STRING);
    $position = filter_input(INPUT_POST, 'Bank', FILTER_SANITIZE_STRING);

    // Validate required fields
    if (empty($nom) || empty($prenom) || empty($email) || empty($tele) || empty($password) || empty($ville) || empty($position)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password before storing it in the database
    #$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO staff (Nom, Prenom, Email, Tele, Adresse, Password, Ville, Position) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nom, $prenom, $email, $tele, $adresse, $password, $ville, $position);

    // Execute the query
    if ($stmt->execute()) {
        $messagesuccess = "added successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: ManageStaff.php"); 
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
    exit;
}
?>
