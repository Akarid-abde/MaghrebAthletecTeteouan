<?php
include 'db_connect.php';

// Fetch séances from the database
$query = "SELECT * FROM séances";
$result = mysqli_query($conn, $query);

// Build the select dropdown
echo '
<div class="form-group">
    <label class="form-label" for="default-06">Séances</label>
    <div class="form-control-wrap">
        <div class="form-control-select">
            <select class="form-control" id="Seances" name="IdSéances">';
while ($row = mysqli_fetch_assoc($result)) {
    $idSeance = $row['IdSéances'];
    $query2 = "SELECT * FROM entraineur WHERE IdEntraineur IN (SELECT IdEntraineur FROM entraineur WHERE IdSéances=$idSeance)";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    echo '<option value="' . $row['IdSéances'] . '">' . $row['Day'] . " " . $row['Heure'] . ' - ' . $row2['Nom'] . '</option>';
}
echo '</select>
        </div>
    </div>
</div>';
?>
