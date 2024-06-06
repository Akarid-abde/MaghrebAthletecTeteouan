<?php
include 'db_connect.php'; // Include your database connection

if (isset($_GET['IdStaff'])) {
    $idStaff = $_GET['IdStaff'];

    // Prepare and execute the delete statement
    $sql = "DELETE FROM staff WHERE IdStaff = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idStaff);

    if ($stmt->execute()) {
        $messagesuccess = "Detele successfully";
        $_SESSION["messagesuccess"] = $messagesuccess ;
        header("Location: ManageStaff.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
    exit;
}
?>
