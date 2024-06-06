<?php
include 'db_connect.php'; // Include your database connection
session_start();
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $Nom = $_SESSION["Nom"];
    $position = $_SESSION["Position"];
}else{
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idStaff = $_POST['IdStaff'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $ville = $_POST['Ville'];
    $tele = $_POST['tele'];
    $Adresse = $_POST['Adresse'];
    $Password = $_POST['password'];
    $email = $_POST['Email'];
    $position = $_POST['position'];
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    $sql = "UPDATE staff SET Nom=?, Prenom=?, Ville=?, Tele=?,Password=?,Adresse=?, Email=?, Position=? WHERE IdStaff=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $nom, $prenom, $ville, $tele,$hashedPassword,$Adresse, $email, $position, $idStaff);

    if ($stmt->execute()) {
        $messagesuccess = "Update successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: ManageStaff.php"); 
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
