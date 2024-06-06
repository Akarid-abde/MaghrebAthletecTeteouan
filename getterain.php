
<?php
include 'db_connect.php';

$query = "SELECT * FROM terrain";
$result = mysqli_query($conn, $query);

echo '
<div class="form-group">
    <label class="form-label" for="default-06">Terains</label>
        <div class="form-control-wrap ">
            <div class="form-control-select">
';
echo '<select class="form-control" id="entraineur" name="IdTerrain">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['IdTerrain'] . '">' . $row['NomTerrain'] . '</option>';
}
echo '
</select>
</div>
</div>
</div>
';

mysqli_close($conn);
?>