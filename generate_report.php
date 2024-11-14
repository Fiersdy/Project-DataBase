<?php
// Include the PHP script for database connection
include 'db_connect.php';

// Initialize variables for report data
$totalSailors = 0;
$totalBoats = 0;
$averageRating = 0;
$averageAge = 0;

// Fetch data from the database and calculate report values
// Implement database queries and calculations here
// Example:
$sqlSailors = "SELECT COUNT(*) AS total_sailors FROM sailors";
$resultSailors = $conn->query($sqlSailors);
if ($resultSailors->num_rows > 0) {
    $row = $resultSailors->fetch_assoc();
    $totalSailors = $row['total_sailors'];
}

$sqlBoats = "SELECT COUNT(*) AS total_boats FROM boats";
$resultBoats = $conn->query($sqlBoats);
if ($resultBoats->num_rows > 0) {
    $row = $resultBoats->fetch_assoc();
    $totalBoats = $row['total_boats'];
}

// Calculate average rating
$sqlAvgRating = "SELECT AVG(rating) AS avg_rating FROM sailors";
$resultAvgRating = $conn->query($sqlAvgRating);
if ($resultAvgRating->num_rows > 0) {
    $row = $resultAvgRating->fetch_assoc();
    $averageRating = $row['avg_rating'];
}

// Calculate average age
$sqlAvgAge = "SELECT AVG(age) AS avg_age FROM sailors";
$resultAvgAge = $conn->query($sqlAvgAge);
if ($resultAvgAge->num_rows > 0) {
    $row = $resultAvgAge->fetch_assoc();
    $averageAge = $row['avg_age'];
}


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Report</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <!-- Header, navigation, and other content -->
    <div class="report">
        <h1>Data Report</h1>
        <h2>Total Sailors: <?php echo $totalSailors; ?></h2>
        <h2>Total Boats: <?php echo $totalBoats; ?></h2>
        <h2>Average of Sailors rating: <?php echo $averageRating; ?></h2>
        <h2>Average of Sailors age: <?php echo $averageAge; ?></h2>
        <!-- Other dynamic content -->
    </div>
</body>
</html>
