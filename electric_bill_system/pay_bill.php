<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electric_bill_system";

$conn = new mysqli($servername, $username, $password, $dbname);

$total_bill = isset($_SESSION["total_bill"]) ? $_SESSION["total_bill"] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_amount = isset($_POST["payment_amount"]) ? floatval($_POST["payment_amount"]) : 0;

    if ($payment_amount > 0) {
        $remaining_balance = $total_bill - $payment_amount;

        $_SESSION["payment_amount"] = $payment_amount;
        $_SESSION["remaining_balance"] = $remaining_balance;

        $sql = "INSERT INTO tblpayment (payment_status, remaining_balance, payment_amount) VALUES ('Paid', $remaining_balance, $payment_amount)";
        if ($conn->query($sql) === TRUE) {
            header("Location: payment_details.php");
            exit;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Bill</title>
    <style>
    body {
            background-image: url('https://wallpapercave.com/wp/wp10477524.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2px;
            color: #000;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
            color: #000;
			font-weight: bold;
        }

        input[type="submit"] {
            background-color: #2D3B45;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #696969;
        }

        p a {
            font-weight: bold;
            color: blue;
            text-decoration: none;
        }

        p a:hover {
            color: red;
        }
    </style>
</head>
<body>

<form method="post">
    <h2>Total Bill: ₱<?php echo number_format($total_bill, 2); ?></h2>
	<br>
    <label for="payment_amount">Enter Payment Amount (₱):</label>
    <input type="number" name="payment_amount" step="0.01" required>
    <br>
    <input type="submit" value="Submit Payment">
    <p style="text-align: center; margin-top: 10px;">
        <span style="font-weight: bold; color: black;">Powered by: </span>
        <a href="company_motto.php" style="font-weight: bold; text-decoration: none;">Electric Solutions</a>
    </p>
</form>

</body>
</html>
