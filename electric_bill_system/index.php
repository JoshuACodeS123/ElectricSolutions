<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Bill System</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input, p {
            display: block;
            margin-bottom: 10px;
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

<form method="post" action="calculate_bill.php">
    <?php
        session_start();

        $first_name = isset($_SESSION["first_name"]) ? $_SESSION["first_name"] : "";
        $last_name = isset($_SESSION["last_name"]) ? $_SESSION["last_name"] : "";
        $assigned_room = isset($_SESSION["assigned_room"]) ? "Room " . $_SESSION["assigned_room"] : "";

        echo "<p style='color: black;'><strong>Assigned Room: $assigned_room</p>";
        echo "<p style='color: black;'><strong>First Name: $first_name</p>";
        echo "<p style='color: black;'><strong>Last Name:</strong> $last_name</p>";
    ?>
    <label for="start_date"><strong>Start Date:</strong></label>
    <input type="date" name="start_date" required>
    <label for="end_date"><strong>End Date:</strong></label>
    <input type="date" name="end_date" required>
    <label for="current_reading"><strong>Current Reading:</strong></label>
    <input type="number" name="current_reading" required>
    <label for="previous_reading"><strong>Previous Reading:</strong></label>
    <input type="number" name="previous_reading" required>
    <label for="rate_per_month"><strong>Rate per Month (₱):</strong></label>
    <input type="number" name="rate_per_month" step="0.01" required>
    <br>
    <input type="submit" value="Generate Bill">
    <p style="text-align: center; margin-top: 10px;">
        <span style="font-weight: bold; color: black;">Powered by: </span>
        <a href="company_motto.php" style="font-weight: bold; text-decoration: none;">Electric Solutions</a>
    </p>
</form>
</body>
</html>
