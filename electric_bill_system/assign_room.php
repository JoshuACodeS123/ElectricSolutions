<?php
session_start();

$conn = new mysqli("localhost", "root", "", "electric_bill_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $assigned_room = $_POST["assigned_room"];

    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["assigned_room"] = $assigned_room;

    $sql = "INSERT INTO tblroom (first_name, last_name, assigned_room) VALUES ('$first_name', '$last_name', $assigned_room)";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("location: index.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Assignment</title>
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

        label, select, input {
            display: block;
            margin-bottom: 2px;
            width: 100%;
            padding: 10px;
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
    <h2>Assign a Room</h2>
	<br>
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>
    <label for="room">Select Room:</label>
    <select name="assigned_room" required>
        <option value="1">Room 1</option>
        <option value="2">Room 2</option>
        <option value="3">Room 3</option>
        <option value="4">Room 4</option>
    </select>
    <br>
    <input type="submit" value="Assign Room">
    <p style="text-align: center; margin-top: 10px;">
        <span style="font-weight: bold; color: black;">Powered by: </span>
        <a href="company_motto.php" style="font-weight: bold; text-decoration: none;">Electric Solutions</a>
    </p>
</form>
</body>
</html>

