
<?php
// Establish a database connection (assuming you have a separate connection file)
include 'db_connect.php';

// Fetch fruits from the database
$query = "SELECT * FROM payment";
$result = mysqli_query($conn, $query);

// Build the select dropdown
echo '
<div class="form-group">
        <div class="form-control-wrap ">
            <div class="form-control-select">';
echo '<select class="form-control form-control-xl" id="payement" name="IdPayment">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['IdPayment'] . '">' . $row['typePayment'] . '</option>';
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