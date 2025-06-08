<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'smart_parking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search_query'];
}

// Fetch parking details with search filter
$sql = "SELECT * FROM zudioparking WHERE slot_no LIKE '%$search%' OR vehicle_no LIKE '%$search%' OR name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ZUDIO Parking Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/image14.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 1000px;
        }
        input, button {
            margin: 5px 0;
            padding: 10px;
            width: 100%;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td input {
            width: 90%;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }
        .back-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>ZUDIO Parking Details</h1>

    <!-- Add Parking Detail Form -->
    <h2>Add New Parking Detail</h2>
    <form method="post">
        <input type="text" name="slot_no" placeholder="Slot Number" required>
        <input type="text" name="vehicle_no" placeholder="Vehicle Number" required>
        <input type="text" name="name" placeholder="Owner Name" required>
        <input type="datetime-local" name="in_time" required>
        <input type="datetime-local" name="out_time" required>
        <button type="submit" name="add">Add Parking Detail</button>
    </form>

    <!-- Search Form -->
    <h2>Search Parking Details</h2>
    <form method="post">
        <input type="text" name="search_query" placeholder="Search by Slot No, Vehicle No, or Name" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" name="search">Search</button>
    </form>

    <!-- Display Parking Details -->
    <h2>All Parking Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Slot No</th>
            <th>Vehicle No</th>
            <th>Owner Name</th>
            <th>In Time</th>
            <th>Out Time</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <form method="post">
                    <td><?php echo $row['id']; ?></td>
                    <td><input type="text" name="slot_no" value="<?php echo $row['slot_no']; ?>" required></td>
                    <td><input type="text" name="vehicle_no" value="<?php echo $row['vehicle_no']; ?>" required></td>
                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
                    <td><input type="datetime-local" name="in_time" value="<?php echo date('Y-m-d\TH:i', strtotime($row['in_time'])); ?>" required></td>
                    <td><input type="datetime-local" name="out_time" value="<?php echo date('Y-m-d\TH:i', strtotime($row['out_time'])); ?>" required></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit">Edit</button>
                        <button type="submit" name="delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Back Button -->
    <a href="admindashboard.php" class="back-button">Back</a>
</div>
</body>
</html>

<?php
$conn->close();
?>
