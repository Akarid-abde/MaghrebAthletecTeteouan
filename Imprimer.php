<?php
require('fpdf/fpdf.php');
include 'db_connect.php';

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer l'IdAdhérent à partir de la requête POST
$idAdherent = $_POST['IdAdhérent'];

// Requête pour récupérer les informations de l'adhérent
$sql = "SELECT * FROM Adhérent WHERE IdAdhérent = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idAdherent);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $nom = $row['Nom'];
    $prenom = $row['Prenom'];
    $dateNaissance = $row['DateNaissance'];
    $transport = $row['Transport'];
    $assurance = $row['Assurance'];
    $idTypeAdherent = $row['IdTypeAdherent'];
    if($idTypeAdherent == 1){
        $idTypeAdherent = "Normal";
    }elseif($idTypeAdherent==2){
        $idTypeAdherent ="Formation";
    }
    $montant = $row['Montant'];

    // Créer le PDF
    $pdf = new FPDF('P', 'mm', 'A4'); 
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 12);

    

// Add a Unicode font (uses UTF-8)
// $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
// $pdf->SetFont('DejaVu','',14);

    // Bordure autour de la page
    $pdf->Rect(5, 5, 200, 287); // Ajustez les coordonnées et dimensions si nécessaire

    // Obtenir la largeur de la page
    $pageWidth = $pdf->GetPageWidth();

    // Obtenir la largeur du logo
    $logoWidth = 25; // Ajustez cette valeur en fonction de la largeur de votre logo

    // Calculer la coordonnée X pour centrer le logo
    $logoX = ($pageWidth - $logoWidth) / 2;
    // Ajouter un petit logo avec un espace en dessous
    $pdf->Image('images/mat.jpg', $logoX, 20, $logoWidth); // Ajustez la coordonnée Y si nécessaire

    // Titre avec espace en dessous
    $pdf->SetFont('Helvetica', 'B', 16); 
    $pdf->Cell(0, 10, 'Moghreb Atletico Tetuan', 0, 1, 'C');
    $pdf->Ln(35); 

    // Détails de l'adhérent
    $pdf->SetFont('Helvetica', 'B', 12);
    
    $pdf->Cell(30, 10, 'Date actuelle :', 0, 0);
    $pdf->Cell(30, 10, date('Y-m-d'), 0, 1);
    $pdf->Cell(0, 10, 'Details de l\'adherent :', 0, 1);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(50, 10, 'Nom :', 0, 0);
    $pdf->Cell(0, 10, $nom, 0, 1);
    $pdf->Cell(50, 10, 'Prenom :', 0, 0);
    $pdf->Cell(0, 10, $prenom, 0, 1);
    $pdf->Cell(50, 10, 'Date de naissance :', 0, 0);
    $pdf->Cell(0, 10, $dateNaissance, 0, 1);
    $pdf->Ln(20); 

    // En-tête du tableau
    $pdf->SetFillColor(145, 166, 166); // Définir la couleur de fond de l'en-tête en bleu clair
    $pdf->SetFont('Helvetica', 'B', 12);

    // Calculer la coordonnée X pour centrer le tableau
    $tableX = ($pageWidth - 136) / 2; // 136 est la largeur totale du tableau (34*4)

    $pdf->SetX($tableX);
    $pdf->Cell(35, 10, 'Type Adherent', 1);
    $pdf->Cell(35, 10, 'Transport', 1);
    $pdf->Cell(35, 10, 'Assurance', 1);
    $pdf->Cell(35, 10, 'Montant', 1);
    $pdf->Ln();

    // Données du tableau
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->SetX($tableX);
    $pdf->Cell(35, 10, $idTypeAdherent, 1);
    $pdf->Cell(35, 10, $transport, 1);
    $pdf->Cell(35, 10, $assurance, 1);
    $pdf->Cell(35, 10, $montant, 1);
    $pdf->Ln(50);

    // Texte de bas de page
    $pdf->SetFont('Helvetica', 'I', 10);
    $footerText = "Je soussigne(e), reconnais avoir pris connaissance de toutes les conditions et reglements de l'Academie de football et m'engage a les respecter. Je m'engage egalement a veiller a ce que mon enfant respecte les engagements stipules par l'academie.
    \nNom : ________________________\nSignature : __________________\nDate : ".date('Y-m-d');
    $pdf->MultiCell(0, 10, $footerText, 0, 'L');

    // Sortie du PDF
    $pdf->Output();
} else {
    echo "Aucune donnée trouvée";
}

// Fermeture de la connexion
$conn->close();
?>
