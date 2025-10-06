<?php
include 'db.php';

if (!isset($_GET['room_id'])) {
    die("Room not selected.");
}

$room_id = $_GET['room_id'];
$query = "SELECT * FROM rooms WHERE id = $room_id";
$result = mysqli_query($conn, $query);
$room = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirm Booking</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(to bottom right, #eef3ff, #d9e4f6);
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #002b5c;
            font-size: 28px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        form {
            background: #ffffff;
            padding: 35px 30px;
            border-radius: 15px;
            width: 450px;
            margin: auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            border-top: 6px solid #002b5c;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus {
            border-color: #002b5c;
            box-shadow: 0 0 6px rgba(0,43,92,0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: none;
            background: #002b5c;
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        button:hover {
            background: #001f4d;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<h2>Booking for: <?php echo $room['room_type']; ?></h2>

<form method="POST" action="save_booking.php">
    <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Check-in Date:</label>
    <input type="date" name="checkin" required>

    <label>Check-out Date:</label>
    <input type="date" name="checkout" required>

    <button type="submit">Confirm Booking</button>
</form>

</body>
</html>
