<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = 'boats';
    $action = $_POST['action'];

    // Handle different actions for Boat
    if ($action === 'insert') {
        // Implement insertion logic
        if (isset($_POST['_id'])) {
            $_id = $_POST['_id'];
            $_bname = $_POST['_bname'];
            $_color = $_POST['_color'];

            $sql = "INSERT INTO boats (bid, bname, color) VALUES ('$_id', '$_bname', '$_color')";

            if ($conn->query($sql) === TRUE) {
                echo "New Boat record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "ID cannot be empty";
        }
    } elseif ($action === 'delete') {
        // Implement deletion logic
        $id = $_POST['id'];

        $sql = "DELETE FROM boats WHERE bid = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Boat record deleted successfully";
        } else {
            echo "Error deleting Boat record: " . $conn->error;
        }
    } elseif ($action === 'update') {
        // Implement update logic
        $id = $_POST['id'];
        $newData = $_POST['new_data'];

        $sql = "UPDATE boats SET column1 = '$newData1', column2 = '$newData2' WHERE bid = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Boat record updated successfully";
        } else {
            echo "Error updating Boat record: " . $conn->error;
        }
    } elseif ($action === 'select') {
        // Implement selection logic
        $sql = "SELECT * FROM boats";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Boat ID: " . $row["bid"] . " - Data: " . $row["column1"] . ", " . $row["column2"] . "<br>";
            }
        } else {
            echo "No Boat records found";
        }
    }
}

// Close the database connection
$conn->close();
?>
