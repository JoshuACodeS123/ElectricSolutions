<?php
$companyMotto = "Efficiency in Every Watt, Simplicity in Every Bill - Powering Your World with Precision.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Motto</title>
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp8489573.jpg');
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

        .motto-box {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2px;
            color: black;
        }

        p {
            font-weight: bold;
            color: blue;
            text-align: center;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="motto-box">
        <h2>Electric Solutions</h2>
        <p><?php echo $companyMotto; ?></p>
    </div>
</body>
</html>
