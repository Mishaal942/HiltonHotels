<!DOCTYPE html>
<html>
<head>
    <title>Hilton Clone - Search Hotels</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(to bottom right, #eef3ff, #d9e4f6);
            margin: 0;
            padding: 0;
        }

        .header {
            background: #002b5c;
            padding: 30px;
            text-align: center;
            color: white;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .search-box {
            background: #ffffff;
            width: 500px;
            margin: 70px auto;
            padding: 35px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-top: 6px solid #002b5c;
        }

        input {
            width: 100%;
            padding: 14px;
            margin-top: 12px;
            border-radius: 8px;
            border: 1px solid #d0d0d0;
            font-size: 15px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus {
            border-color: #002b5c;
            box-shadow: 0 0 6px rgba(0,43,92,0.3);
            outline: none;
        }

        label {
            margin-top: 15px;
            display: block;
            font-weight: bold;
            color: #333;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            border-radius: 8px;
            border: none;
            background: #002b5c;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        button:hover {
            background: #001f4d;
            transform: translateY(-2px);
        }
    </style>

    <script>
        function redirectSearch() {
            let location = document.getElementById("location").value;
            let checkin = document.getElementById("checkin").value;
            let checkout = document.getElementById("checkout").value;

            if(location === "" || checkin === "" || checkout === "") {
                alert("Please fill all fields");
                return;
            }

            window.location.href = "listing.php?location=" + location + "&checkin=" + checkin + "&checkout=" + checkout;
        }
    </script>
</head>
<body>

<div class="header"><h1>Hilton Hotels Clone</h1></div>

<div class="search-box">
    <input type="text" id="location" placeholder="Enter City or Location">
    <label>Check-in Date</label>
    <input type="date" id="checkin">
    <label>Check-out Date</label>
    <input type="date" id="checkout">
    <button onclick="redirectSearch()">Search</button>
</div>

</body>
</html>
