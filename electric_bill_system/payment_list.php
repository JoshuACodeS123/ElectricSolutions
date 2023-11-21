<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Bill Details</title>
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp10477524.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }

        .delete-btn, .pay-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .delete-btn:hover, .pay-btn:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>

<?php
session_start();

function formatNumber($number) {
    return number_format($number, 2, '.', ',');
}

if (isset($_SESSION["bill_list"])) {
    echo "<div class='container'>";
    echo "<table>";
    echo "<tr><th>Assigned Room</th><th>First Name</th><th>Last Name</th><th>Start Date</th><th>End Date</th>";
    echo "<th>Current Reading</th><th>Previous Reading</th><th>Rate per Month (₱)</th><th>Total Bill</th><th>Action</th></tr>";

    foreach ($_SESSION["bill_list"] as $index => $bill_data) {
        echo "<tr>";
        echo "<td>{$bill_data['assigned_room']}</td>";
        echo "<td>{$bill_data['first_name']}</td>";
        echo "<td>{$bill_data['last_name']}</td>";
        echo "<td>{$bill_data['start_date']}</td>";
        echo "<td>{$bill_data['end_date']}</td>";
        echo "<td>" . formatNumber($bill_data['current_reading']) . "</td>";
        echo "<td>" . formatNumber($bill_data['previous_reading']) . "</td>";
        echo "<td>{$bill_data['rate_per_month']}</td>";
        echo "<td>" . formatNumber($bill_data['total_bill']) . "</td>";
        echo "<td>";
        echo "<form method='post' action='delete_confirm.php'><input type='hidden' name='index' value='$index'><button class='delete-btn' type='submit'>Delete</button></form>";
        echo "<a href='pay_bill.php' class='pay-btn'>Pay</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "</div>";
} else {
    echo "No data available.";
}
?>


