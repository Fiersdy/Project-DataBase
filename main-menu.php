<!DOCTYPE html>
<html>
<head>
    <title>Rent a Boat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .menu button {
            margin: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .menu button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>Rent a Boat</h1>
        <p>Select an option:</p>
        <button id="maintenanceBtn">Data Maintenance</button>
        <button id="reportBtn">Data Report</button>
    </div>

    <script>
        // Adding interactivity using JavaScript
        document.getElementById("maintenanceBtn").onclick = function() {
            window.location.href = 'data-maintenance.php';
        };

        document.getElementById("reportBtn").onclick = function() {
            window.location.href = 'data-report.php';
        };
    </script>
</body>
</html>
