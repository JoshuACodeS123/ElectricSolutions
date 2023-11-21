<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electric_bill_system";

$conn = new mysqli($servername, $username, $password, $dbname);

$total_bill = isset($_SESSION["total_bill"]) ? $_SESSION["total_bill"] : null;
$accountBalance = $total_bill;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = new DateTime($_POST["start_date"]);
    $end_date = new DateTime($_POST["end_date"]);
    $current_reading = $_POST["current_reading"];
    $previous_reading = $_POST["previous_reading"];
    $rate_per_month = $_POST["rate_per_month"];

    $bill_data = array(
        "assigned_room" => $assigned_room,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "start_date" => $formatted_start_date,
        "end_date" => $formatted_end_date,
        "current_reading" => $current_reading,
        "previous_reading" => $previous_reading,
        "rate_per_month" => $rate_per_month,
        "total_bill" => $total_bill
    );

    if (!isset($_SESSION["bill_list"])) {
        $_SESSION["bill_list"] = array();
    }

    $_SESSION["bill_list"][] = $bill_data;

    $formatted_start_date = $start_date->format('Y-m-d');
    $formatted_end_date = $end_date->format('Y-m-d');

    $interval = $start_date->diff($end_date);
    $number_of_months = $interval->days / 30;

    $electric_bill_difference = $current_reading - $previous_reading;
    $total_bill = $electric_bill_difference * $rate_per_month * $number_of_months;

    $sql = "INSERT INTO tblbill (start_date, end_date, current_reading, previous_reading, rate_per_month, total_bill) 
            VALUES ('$formatted_start_date', '$formatted_end_date', '$current_reading', '$previous_reading', '$rate_per_month', '$total_bill')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["total_bill"] = $total_bill;

        header("Location: payment_list.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
