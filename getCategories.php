<?php
include 'db_connect.php';

// Fetch fruits from the database
$query = "SELECT * FROM catégories";
$result = mysqli_query($conn, $query);

// Build the select dropdown
echo '
<div class="form-group">
    <label class="form-label" for="default-06">Categories</label>
        <div class="form-control-wrap ">
            <div class="form-control-select">
';
echo '<select class="form-control" id="categories" name="IdCategories">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['IdCategories'] . '">' . $row['NomCategories'] . '</option>';
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