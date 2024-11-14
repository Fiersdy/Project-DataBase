<!DOCTYPE html>
<html>
<head>
    <title>Data Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-around;
            background-color: #ddd;
            padding: 10px;
        }
        .maintenance {
            width: 80%;
            margin: auto;
        }
        .maintenance h2, select, input, button {
            margin: 20px 0;
        }
        #extra-inputs {
            display: none;
        }
    </style>
</head>
<body>
    <?php 
    include("maintenance_actions.php");
    ?>
    <div class="navbar">
        <a href="main-menu.php">Main Menu</a>
        <a href="data-maintenance.php">Data Maintenance</a>
        <a href="data-report.php">Data Report</a>
    </div>
    <div class="maintenance">
        <h1>Data Maintenance</h1>
        <form id="maintenanceForm" method="post" action="maintenance_actions.php">
            <h2>Select a table:</h2>
            <select id="table" name="table" onchange="fetchTableData()">
                <option value="sailors">Sailors</option>
                <option value="boats">Boats</option>
                <option value="reserves">Reserves</option>
            </select>
            <div id="table-data" style="display: none;">
                <!-- Table data will be displayed here -->
            </div>
            <h2>Select an action:</h2>
            <select id="action" name="action" onchange="showExtraInputs()">
                <option value="insert">Insert</option>
                <option value="delete">Delete</option>
                <option value="update">Update</option>
                <option value="select">Select</option>
            </select>
            <div id="extra-inputs">
                <input type="text" id="id-input" name="id" placeholder="Enter ID">
                <input type="text" id="new-data-input" name="new_data" placeholder="Enter New Data" style="display: none;">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>