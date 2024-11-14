<!DOCTYPE html>
<html>
<head>
    <title>Data Report</title>
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
        .report {
            width: 80%;
            margin: auto;
        }
        .report h2, p {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="main-menu.php">Main Menu</a>
        <a href="data-maintenance.php">Data Maintenance</a>
        <a href="data-report.php">Data Report</a>
    </div>

    <?php 
    include("generate_report.php");
    ?>
    
</body>
</html>
