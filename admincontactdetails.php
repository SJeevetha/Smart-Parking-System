<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'smart_parking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new message
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()) {
        echo "<script>alert('Message added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to add message.');</script>";
    }
}

// Edit message
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("UPDATE contact_messages SET name=?, email=?, message=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $message, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Message updated successfully!'); window.location.href='';</script>";
    } else {
        echo "<script>alert('Failed to update message.');</script>";
    }
}

// Delete message
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Message deleted successfully!'); window.location.href='';</script>";
    } else {
        echo "<script>alert('Failed to delete message.');</script>";
    }
}

// Fetch all messages
$result = $conn->query("SELECT * FROM contact_messages");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>
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
            background-color:rgb(11, 78, 249);
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Contact Messages</h1>

    <!-- Add Message Form -->
    <h2>Add New Message</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="message" placeholder="Message" required>
        <button type="submit" name="add">Add Message</button>
    </form>

    <!-- Display Messages -->
    <h2>All Messages</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <form method="post">
                    <td><?php echo $row['id']; ?></td>
                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
                    <td><input type="email" name="email" value="<?php echo $row['email']; ?>" required></td>
                    <td><input type="text" name="message" value="<?php echo $row['message']; ?>" required></td>
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
    <a href="admindashboard.php" class="back-button"><h1>Back</h1></a>
</div>
</div>
</body>
</html>

<?php
$conn->close();
?>
