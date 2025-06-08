<?php
$conn = new mysqli('localhost', 'root', '', 'smart_parking');
if ($conn->connect_error) die('Connection Failed: ' . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $slot_no = $_POST['slot_no'];
    $name = $_POST['name'];
    $vehicle_no = $_POST['vehicle_no'];
    $in_time = $_POST['in_time'];
    $out_time = $_POST['out_time'];

    // Get current date and time
    $current_time = date("Y-m-d H:i:s");

    // Check if the slot is already booked within the selected time range
    $check_query = $conn->prepare("
        SELECT * FROM supermarcheparking 
        WHERE slot_no = ? 
        AND (
            (? BETWEEN in_time AND out_time) 
            OR (? BETWEEN in_time AND out_time) 
            OR (in_time BETWEEN ? AND ?)
        )
    ");
    $check_query->bind_param("issss", $slot_no, $in_time, $out_time, $in_time, $out_time);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Slot $slot_no is already booked for the selected time range!');
                window.history.back();
              </script>";
        exit();
    }

    // Insert booking without UNIQUE constraint issues
    $stmt = $conn->prepare("INSERT INTO supermarcheparking (slot_no, name, vehicle_no, in_time, out_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $slot_no, $name, $vehicle_no, $in_time, $out_time);

    if ($stmt->execute()) {
        echo "<script>
                alert('Slot booked successfully!');
                window.location.href='supermarcheparking.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to book slot! Please try again.');
                window.history.back();
              </script>";
    }

    $stmt->close();
    $check_query->close();
}

if (isset($_GET['slot_no'])) {
    $slot_no = $_GET['slot_no'];
} else {
    die("Invalid Slot Number");
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Slot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px;
        }
        form {
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
        }
        input, button {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }
        button {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: rgba(237, 11, 11, 0.99);
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
            width: 100px;
        }
    </style>
</head>
<body>
    <h1>Book Slot <?php echo htmlspecialchars($slot_no); ?></h1>
    <form method="post" action="supermarchebookslot.php">
        <input type="hidden" name="slot_no" value="<?php echo htmlspecialchars($slot_no); ?>">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Vehicle Number:</label>
        <input type="text" name="vehicle_no" required><br>
        <label>In Time:</label>
        <input type="datetime-local" name="in_time" required><br>
        <label>Out Time:</label>
        <input type="datetime-local" name="out_time" required><br>
        
        <button type="submit">Book Slot</button>
    </form>
    <button class="back-button" onclick="window.location.href='supermarcheparking.php'">Back</button>
</body>
</html>
