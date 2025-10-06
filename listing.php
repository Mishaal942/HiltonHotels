<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$location = $_GET['location'] ?? '';
$checkin = $_GET['checkin'] ?? '';
$checkout = $_GET['checkout'] ?? '';

$query = "SELECT * FROM hotels WHERE city LIKE '%$location%'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Hotels</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(to bottom right, #eef3ff, #d9e4f6);
            margin: 0;
            padding: 40px;
        }
        h2 {
            color: #002b5c;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .hotel-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            display: flex;
            gap: 25px;
            transition: 0.3s;
        }
        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .hotel-card img {
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
        .hotel-card h3 {
            margin: 0 0 12px;
            color: #002b5c;
            font-size: 22px;
            font-weight: bold;
        }
        .price {
            font-size: 18px;
            margin: 10px 0;
            color: #0071c2;
            font-weight: bold;
        }
        .btn-view {
            background: #002b5c;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            width: 150px;
            transition: 0.3s;
        }
        .btn-view:hover {
            background: #001f4d;
            transform: scale(1.05);
        }
        .no-results {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-top: 50px;
        }
    </style>
    <script>
        function viewHotel(id) {
            window.location.href = "booking.php?hotel_id=" + id;
        }
    </script>
</head>
<body>

<h2>Available Hotels in "<?php echo htmlspecialchars($location); ?>"</h2>

<?php
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $hotel_price = isset($row['price']) ? $row['price'] : 'N/A';
        $hotel_image = isset($row['image']) && $row['image'] !== '' ? $row['image'] : 'default.jpg';
        ?>
        <div class="hotel-card">
            <img src="<?php echo $hotel_image; ?>" alt="Hotel Image">
            <div class="details">
                <h3><?php echo $row['name']; ?></h3>
                <p class="price">$<?php echo $hotel_price; ?> / night</p>
                <button class="btn-view" onclick="viewHotel(<?php echo $row['id']; ?>)">View</button>
            </div>
        </div>
<?php } 
} else {
    echo "<p class='no-results'>No hotels found for this location.</p>";
}
?>

</body>
</html>
