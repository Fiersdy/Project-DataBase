<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'];
    $action = $_POST['action'];

    // Handle different actions
    if ($action === 'insert') {
        // Implement insertion logic
        if ($table === 'sailors' || $table === 'boats' || $table === 'reserves') {
            // Check if the necessary fields are set in $_POST
            if (isset($_POST['_id'])) {
                // Assign values from the form to variables
                $_id = $_POST['_id'];

                // Additional fields for sailors
                if ($table === 'sailors') {
                    $_sname = $_POST['_sname'];
                    $_rating = $_POST['_rating'];
                    $_age = $_POST['_age'];
                    
                    // SQL query for insertion
                    $sql = "INSERT INTO sailors (sid, sname, rating, age) VALUES ('$_id', '$_sname', '$_rating', '$_age')";
                } 
                // Additional fields for boats
                elseif ($table === 'boats') {
                    $_bname = $_POST['_bname'];
                    $_color = $_POST['_color'];
                    
                    // SQL query for insertion
                    $sql = "INSERT INTO boats (bid, bname, color) VALUES ('$_id', '$_bname', '$_color')";
                } 
                // Additional fields for reserves
                elseif ($table === 'reserves') {
                    $_sid = $_POST['_sid'];
                    $_bid = $_POST['_bid'];
                    $_days = $_POST['_days'];
                    
                    // Check the existence of Sailor and Boat ID
                    $checkSailor = "SELECT * FROM sailors WHERE sid = '$_sid'";
                    $resultSailor = $conn->query($checkSailor);
                    $checkBoat = "SELECT * FROM boats WHERE bid = '$_bid'";
                    $resultBoat = $conn->query($checkBoat);

                    if ($resultSailor && $resultBoat && $resultSailor->num_rows > 0 && $resultBoat->num_rows > 0) {
                        // SQL query for insertion
                        $sql = "INSERT INTO reserves (sid, bid, days) VALUES ('$_sid', '$_bid', '$_days')";
                    } else {
                        echo "Sailor or Boat ID does not exist";
                        exit(); // Stop execution if Sailor or Boat ID does not exist
                    }
                }

                // Execute the SQL query
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "ID cannot be empty";
            }
        }
    } elseif ($action === 'delete') {
        // Implement deletion logic
        $id = $_POST['id'];

        $sql = "DELETE FROM $table WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } elseif ($action === 'update') {
        // Implement update logic
        $id = $_POST['id'];
        $newData = $_POST['new_data'];

        // SQL query for update
        $sql = "UPDATE $table SET column1 = '$newData1', column2 = '$newData2' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif ($action === 'select') {
        // Implement selection logic
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Data: " . $row["column1"] . ", " . $row["column2"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}

// Close the database connection
$conn->close();
?>
