<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_parking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data without hashing
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message); // "sss" means 3 string parameters

    // Execute query and check if it was successful
    if ($stmt->execute()) {
        $successMessage = "Message sent successfully!";
    } else {
        $successMessage = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Smart Parking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/image18.jpg');
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden; 
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: grey;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-track {
            background-color: #222;
            border-radius: 10px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            box-sizing: border-box;
            margin-top: 50px;
        }
        .content-area {
            width: 100%;
            max-width: 600px;
            height: auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
            flex-grow: 1;
        }
        .contact-box {
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
        .contact-info {
            background-color: #222;
            padding: 10px;
            border-radius: 10px;
            color: white;
        }
        .contact-info h4 {
            font-size: 18px;
        }
        .contact-info i {
            margin-right: 10px;
        }
        .back-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: red;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .success-message {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }
        @media (max-width: 768px) {
            .content-area {
                width: 100%;
                max-width: 400px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="content-area">
            <!-- Display success message -->
            <?php if (!empty($successMessage)): ?>
                <div class="success-message">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <!-- Contact Form Box -->
            <div class="contact-box">
                <h2>Contact Us</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                </form>
            </div>

            <!-- Contact Information Box -->
            <div class="contact-info">
                <h4>Contact Details</h4>
                <p><i class="fa fa-envelope"></i> Email: <a href="mailto:contact@smartparking.com" style="color: white;">contact@smartparking.com</a></p>
                <p><i class="fa fa-phone"></i> Phone: +1 234 567 890</p>
                <p><i class="fa fa-map-marker"></i> Address: 123 Smart Parking Lane, City, Country</p>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <button class="back-btn" onclick="history.back();">Back</button>


    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
