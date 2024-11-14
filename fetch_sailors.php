<?php
include 'db_connect.php';

$sql = "SELECT * FROM sailors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display data here as needed
        echo "ID: " . $row['sid'] . " - Name: " . $row['sname'] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
