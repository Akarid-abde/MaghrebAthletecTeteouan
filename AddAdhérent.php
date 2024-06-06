<?php
session_start();
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Escape user inputs for security (to prevent SQL injection)
    // Set parameters and execute
        // echo $idcategories." categories <br>";
    // echo $IdPayment." Payement <br>";
    // echo $idSeances." Senace <br>";
    // echo $identraineur." Entraineur <br>";
   
    $idcategories =  $conn->real_escape_string($_POST['IdCategories']);
    $IdPayment =  $conn->real_escape_string($_POST['IdPayment']);
    $idSeances =  $conn->real_escape_string($_POST['IdSéances']);
    $identraineur =  $conn->real_escape_string($_POST['IdEntraineur']);
    $Nom = $conn->real_escape_string($_POST['Nom']);
    $Prenom = $conn->real_escape_string($_POST['Prenom']);
    $CINParent = $conn->real_escape_string($_POST['CINParent']);
    $tele = $conn->real_escape_string($_POST['tele']);
    $Adresse = $conn->real_escape_string($_POST['Adresse']);
    $DateNaissance = $conn->real_escape_string($_POST['DateNaissance']);
    $IdTypeAdherent = $conn->real_escape_string($_POST['IdTypeAdherent']);
    $Transport = $conn->real_escape_string($_POST['Transport']);
    $N_Compte = $conn->real_escape_string($_POST['N_Compte']);
    $Bank = $conn->real_escape_string($_POST['Bank']);
    $Montant = $conn->real_escape_string($_POST['Montant']);
    $Assurance = isset($_POST['Assurance']) ? "Valider" : "NonValider"; // Convert checkbox value to 1 or 0
     // Define the target directory
     $target_dir = "photos/";
     // Get the file name
     $target_file = $target_dir . basename($_FILES["photo"]["name"]);

        // Check file size (limit to 5MB for example)
        if ($_FILES["photo"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            exit;
        }
        
        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])). " has been uploaded.";
            // Insert the path into the database
            $photo_path = $conn->real_escape_string($target_file);
        } else {
            $photo_path = "NULL";
        }


    $sql = "INSERT INTO adhérent (Nom, Prenom, CINParent,Deux_Photo, tele, Adresse, DateNaissance, IdTypeAdherent, Transport, N_Compte, Bank, Montant, Assurance,IdCategories,IdEntraineur,IdSéances,IdPayment)
            VALUES ('$Nom', '$Prenom', '$CINParent','$photo_path', '$tele', '$Adresse', '$DateNaissance', '$IdTypeAdherent', 
            '$Transport', '$N_Compte', '$Bank', '$Montant', '$Assurance','$idcategories','$identraineur','$idSeances','$IdPayment')";

    if ($conn->query($sql) === TRUE) {
        $messagesuccess = "added successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: Amal.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted";
}

?>
