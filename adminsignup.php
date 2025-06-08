<?php
// Start session
session_start();

// Database connection details
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

// Initialize message
$message = "";

// Handle form submission for signup
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username_input = trim($_POST['username']);
    $password_input = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password_input !== $confirm_password) {
        $message = "Error: Passwords do not match!";
    } else {
        // Check if username exists
        $select_sql = "SELECT * FROM admin_login WHERE username = ?";
        $select_stmt = $conn->prepare($select_sql);
        $select_stmt->bind_param("s", $username_input);
        $select_stmt->execute();
        $result = $select_stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "Error: Username already exists!";
        } else {
            // Insert new admin user
            $insert_sql = "INSERT INTO admin_login (username, password) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("ss", $username_input, $password_input);

            if ($insert_stmt->execute()) {
                $_SESSION['username'] = $username_input; // Start session for new user
                echo "<script>
                        alert('Signup successful! Redirecting to dashboard.');
                        window.location.href = 'admindashboard.php';
                      </script>";
                exit();
            } else {
                $message = "Error: " . $insert_stmt->error;
            }
        }
        $select_stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN SIGNUP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/image7.jpg');
            background-size: cover;
            background-position: center center;
            color: white;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            width: 100%;
            text-align: left;
        }

        .form-control {
            width: 100%;
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            margin-bottom: 20px;
        }

        .message {
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .success {
            background-color: #28a745;
            color: white;
        }

        .error {
            background-color: #dc3545;
            color: white;
        }

        .login-link {
            font-size: 16px;
        }

        .login-link a {
            color: #1e90ff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .back-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Display success or error message -->
        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'Error') !== false ? 'error' : 'success'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Admin Signup Form -->
        <h2><b>ADMIN SIGNUP</b></h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>

        <!-- Login Link -->
        <div class="login-link">
            <p>Already have an account? <a href="adminlogin.php">Login here</a>.</p>
        </div>

        <!-- Back Button -->
        <div class="back-btn">
            <a href="dashboard.php">
                <button type="button" class="btn btn-danger">Back</button>
            </a>
        </div>
    </div>
</body>
</html>

