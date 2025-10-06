<?php
include 'db.php';

if (!isset($_GET['hotel_id'])) {
    die("Hotel not selected.");
}

$hotel_id = $_GET['hotel_id'];
$query = "SELECT * FROM rooms WHERE hotel_id = $hotel_id AND availability = 'Yes'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Select a Room</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(to bottom right, #eef3ff, #d9e4f6);
            margin: 0;
            padding: 40px;
        }
        h2 {
            color: #002b5c;
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .room-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            display: flex;
            gap: 25px;
            transition: 0.3s;
        }
        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        img {
            width: 260px;
            height: 170px;
            object-fit: cover;
            border-radius: 12px;
        }
        .details {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .details h3 {
            margin: 0 0 10px;
            color: #002b5c;
            font-size: 22px;
            font-weight: bold;
        }
        .price {
            font-size: 18px;
            font-weight: bold;
            color: #0071c2;
            margin: 10px 0;
        }
        button {
            background: #002b5c;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            width: 160px;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        button:hover {
            background: #001f4d;
            transform: scale(1.05);
        }
        .no-rooms {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-top: 50px;
        }
    </style>
    <script>
        function bookRoom(id) {
            window.location.href = "confirm.php?room_id=" + id;
        }
    </script>
</head>
<body>

<h2>Select a Room</h2>

<?php
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="room-card">
            <img src="<?php echo $row['image'] ?: 'default-room.jpg'; ?>" alt="Room Image">
            <div class="details">
                <h3><?php echo $row['room_type']; ?></h3>
                <p class="price">$<?php echo $row['price']; ?> / night</p>
                <button onclick="bookRoom(<?php echo $row['id']; ?>)">Book Now</button>
            </div>
        </div>
<?php } 
} else {
    echo "<p class='no-rooms'>No rooms available for this hotel.</p>";
}
?>

</body>
</html>
