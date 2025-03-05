<?php
session_start();
require_once('Nav-bar.php');
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock_predictiondb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Stock to Portfolio
if (isset($_POST['add_stock'])) {
    $user_id = $_SESSION['username'];
    if (isset($_POST['selected_stocks'])) {
        $selected_stocks = $_POST['selected_stocks'];
        foreach ($selected_stocks as $stock_symbol) {
            $sql = "INSERT INTO stocks (USER, Name) VALUES ('$user_id', '$stock_symbol')";
            $conn->query($sql);
        }
    }
}

// Remove Stock from Portfolio
if (isset($_POST['remove_stock'])) {
    $user_id = $_SESSION['username'];
    $stock_id = $_POST['stock_id'];

    $sql = "DELETE FROM stocks WHERE USER = '$user_id' AND Name = '$stock_id'";
    $conn->query($sql);
}

// Fetch user's stocks from the database
$user_id = $_SESSION['username'];
$sql = "SELECT * FROM stocks WHERE USER = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .columns {
            display: flex;
        }
        .column {
            width: 50%;
            padding: 10px;
            height: 80vh; /* Adjust the height as needed */
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            background-color: #f9f9f9;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 10px 0;
        }
        .column ul {
            padding: 0;
            list-style: none;
        }
        .column ul li {
            cursor: pointer;
            padding: 8px;
            transition: background-color 0.3s;
        }
        .column ul li:hover {
            background-color: #e0e0e0;
        }
        button {
            padding: 10px 20px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2a62bf;
        }
        .container {
            display: flex;
            justify-content: space-evenly;
        }

    </style>
    </head>
<body>
    <div class="container">
        <div class="column">
            <h2>Current Stocks:</h2>
            <ul>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $stock_id = $row['Name'];
                    $stock_symbol = $row['Name'];
                    echo "<li>$stock_symbol 
                        <form method='post' action=''>
                            <input type='hidden' name='stock_id' value='$stock_id'>
                            <button type='submit' name='remove_stock'>Remove</button>
                        </form>
                    </li>";
                }
                ?>
            </ul>
        </div>

        <div class="column">
            <h2>Add Stocks:</h2>
            <form method="post" action="">
                <?php
                $stocks = [
                    "BRITANNIA", "INDUSINDBK", "COALINDIA", "WIPRO", "BHARTIARTL", "ICICIBANK", "TATASTEEL",
                    "RELIANCE", "TECHM", "BAJAJ-AUTO.NS", "HDFCLIFE", "TATACONSUM", "BAJFINANCE", "LT", "HINDALCO",
                    "TCS", "NESTLEIND", "NTPC.NS", "ULTRACEMCO", "SHREECEM", "CIPLA", "TITAN", "HEROMOTOCO", "KOTAKBANK",
                    "BAJAJFINSV", "ITC", "MARUTI", "APOLLOHOSP", "MM", "ONGC", "SBIN"
                ];
                foreach ($stocks as $stock) {
                    echo "<input type='checkbox' name='selected_stocks[]' value='$stock'>$stock<br>";
                }
                ?>
                <button type="submit" name="add_stock">Add Stock</button>
            </form>
        </div>
    </div>
    <div class="footer">
        &copy; 2023 Team Predictors
    </div>
</body>
</html>