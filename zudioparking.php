<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'smart_parking');
if ($conn->connect_error) die('Connection Failed: ' . $conn->connect_error);

// Fetch booked slots
$result = $conn->query("SELECT slot_no, out_time FROM zudioparking");
$bookedSlots = [];
while ($row = $result->fetch_assoc()) {
    if (strtotime($row['out_time']) > time()) {
        $bookedSlots[] = $row['slot_no'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title<i>ZUDIO PARKING </i></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: black;
            color: white;
        }
        .slots {
            display: grid;
            grid-template-rows: auto auto auto;
            gap: 40px;
            padding: 20px;
        }
        .slot-row {
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        .slot {
            padding: 40px 60px;
            font-size: 22px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 10px;
        }
        .slot.booked {
            background-color: #f44336;
            cursor: not-allowed;
        }
        .center-slot {
            display: flex;
            justify-content: center;
        }
        .back-button {
            background-color: red;
            color: white;
            padding: 15px 30px;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            margin-top: 30px;
            cursor: pointer;
            width: 20;
        }
    </style>
</head>
<body>
    <h1>Parking Slot Booking</h1>
    <div class="slots">
        <div class="slot-row">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <button class="slot <?php echo in_array($i, $bookedSlots) ? 'booked' : ''; ?>" 
                        onclick="window.location.href='zudiobookslot.php?slot_no=<?php echo $i; ?>'" 
                        <?php echo in_array($i, $bookedSlots) ? 'disabled' : ''; ?>>
                    Slot <?php echo $i; ?>
                </button>
            <?php endfor; ?>
        </div>

        <div class="slot-row">
            <?php for ($i = 4; $i <= 6; $i++): ?>
                <button class="slot <?php echo in_array($i, $bookedSlots) ? 'booked' : ''; ?>" 
                        onclick="window.location.href='zudiobookslot.php?slot_no=<?php echo $i; ?>'" 
                        <?php echo in_array($i, $bookedSlots) ? 'disabled' : ''; ?>>
                    Slot <?php echo $i; ?>
                </button>
            <?php endfor; ?>
        </div>

        <div class="center-slot">
            <button class="slot <?php echo in_array(7, $bookedSlots) ? 'booked' : ''; ?>" 
                    onclick="window.location.href='zudiobookslot.php?slot_no=7'" 
                    <?php echo in_array(7, $bookedSlots) ? 'disabled' : ''; ?>>
                Slot 7
            </button>
        </div>
    </div>

    <button class="back-button" onclick="window.location.href='userdashboard.php'">Back</button>
</body>
</html>
<?php $conn->close(); ?>
