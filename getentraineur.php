
<?php
// Establish a database connection (assuming you have a separate connection file)
include 'db_connect.php';

// Fetch fruits from the database
$query = "SELECT * FROM entraineur";
$result = mysqli_query($conn, $query);

// Build the select dropdown
echo '
<div class="form-group">
    <label class="form-label" for="default-06">Entraineur</label>
        <div class="form-control-wrap ">
            <div class="form-control-select">';
echo '<select class="form-control" id="entraineur" name="IdEntraineur">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['IdEntraineur'] . '">' . $row['Nom'] . '</option>';
}
echo '
</select>
</div>
</div>
</div>
';

// Close the database connection
mysqli_close($conn);
?>