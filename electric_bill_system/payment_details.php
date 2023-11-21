<?php
session_start();

$payment_amount = isset($_SESSION["payment_amount"]) ? $_SESSION["payment_amount"] : 0;
$remaining_balance = isset($_SESSION["remaining_balance"]) ? $_SESSION["remaining_balance"] : 0;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electric_bill_system";

$conn = new mysqli($servername, $username, $password, $dbname);

$total_bill = isset($_SESSION["total_bill"]) ? $_SESSION["total_bill"] : 0;

$sql = "SELECT tb.*, tp.payment_amount, tp.remaining_balance
        FROM tblbill tb
        LEFT JOIN tblpayment tp ON tb.id = tp.bill_id
        WHERE tb.id = $total_bill";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_bill = $row["total_bill"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
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

        label, p {
            display: block;
            margin-bottom: 20px;
            width: 100%;
            padding: 5px 10px;
            box-sizing: border-box;
            color: #000;
            font-weight: bold;
        }
        
        button {
            background-color: #2D3B45;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 auto;
            display: block;
            font-weight: bold;
        }

        button:hover {
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
    <h2>Payment Details</h2>
    <p>Total Bill: ₱<?php echo number_format($total_bill,2); ?></p>
    <p>Payment Amount: ₱<?php echo number_format($payment_amount,2); ?></p>
    <p>Remaining Balance: ₱<?php echo number_format($remaining_balance,2); ?></p>

    <button type="button" onclick="goBack()">Back to Home</button>
    <p style="text-align: center; margin-top: 10px;">
        <span style="font-weight: bold; color: black;">Powered by: </span>
        <a href="company_motto.php" style="font-weight: bold; text-decoration: none;">Electric Solutions</a>
    </p>
</form>
<script>
    function goBack() {
        window.location.href = 'assign_room.php';
    }
</script>

</body>
</html>
