<?php
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = isset($_POST['room_id']) ? $_POST['room_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $checkin = isset($_POST['checkin']) ? $_POST['checkin'] : '';
    $checkout = isset($_POST['checkout']) ? $_POST['checkout'] : '';

    if ($room_id == '' || $name == '' || $email == '' || $checkin == '' || $checkout == '') {
        die("<div class='error-box'>❌ Required fields are missing.</div>");
    }

    $query = "INSERT INTO bookings (room_id, name, email, checkin, checkout)
              VALUES ('$room_id', '$name', '$email', '$checkin', '$checkout')";

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Booking Status</title>
        <style>
            body {
                font-family: 'Segoe UI', Arial, sans-serif;
                background: linear-gradient(to bottom right, #eef3ff, #d9e4f6);
                margin: 0;
                padding: 50px;
                text-align: center;
            }
            .box {
                background: #ffffff;
                padding: 40px 30px;
                border-radius: 15px;
                width: 450px;
                margin: auto;
                box-shadow: 0 8px 25px rgba(0,0,0,0.1);
                border-top: 6px solid #002b5c;
            }
            h2 {
                color: #002b5c;
                margin-bottom: 15px;
                font-size: 26px;
                text-transform: uppercase;
            }
            p {
                font-size: 17px;
                color: #444;
                margin-bottom: 25px;
            }
            a {
                display: inline-block;
                padding: 12px 20px;
                background: #002b5c;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-size: 15px;
                font-weight: bold;
                transition: 0.3s;
                box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            }
            a:hover {
                background: #001f4d;
                transform: translateY(-2px);
            }
            .error-box {
                color: red;
                font-size: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="box">
    <?php

    if (mysqli_query($conn, $query)) {
        echo "<h2>✅ Booking Confirmed!</h2>";
        echo "<p>Thanks, $name! Your room is successfully reserved from <b>$checkin</b> to <b>$checkout</b>.</p>";
        echo "<a href='index.php'>Back to Home</a>";
    } else {
        echo "<h2>❌ Error Occurred</h2>";
        echo "<p>Database Error: " . mysqli_error($conn) . "</p>";
        echo "<a href='index.php'>Try Again</a>";
    }
    ?>
    </div>
    </body>
    </html>
    <?php
} else {
    echo "<div class='error-box'>❌ Invalid Request.</div>";
}
?>
