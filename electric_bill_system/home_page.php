<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
            color: #fff;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2px;
            color: #000;
        }

        .links-container a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 15px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border: 1px solid #000;
            border-radius: 5px;
            background-color: #2D3B45;
        }

        .links-container a:hover {
            background-color: #696969;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Electric Solutions</h2>
    <div class="links-container">
        <p>
            <br>
            <a href="assign_room.php">Assign a room</a>
            <a href="payment_list.php">Manage room</a>
        </p>
    </div>
</div>

</body>
</html>
