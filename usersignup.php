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

// Handle form submission for user signup
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {     
    $username_input = trim($_POST['username']);  // User input for username
    $password_input = $_POST['password'];        // User input for password
    $confirm_password = $_POST['confirm_password']; // User input for confirm password
    $email_input = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize email
    $phone_input = trim($_POST['phone']);              // User input for phone number

    // Check if the passwords match
    if ($password_input !== $confirm_password) {
        $message = "Error: Passwords do not match!";
    } else {
        // Check if username or email already exists in the database
        $check_sql = "SELECT * FROM user_login WHERE username = ? OR email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("ss", $username_input, $email_input);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            // If username or email already exists, don't insert the data.
            $message = "Error: Username or Email already exists!";
        } else {
            // Directly insert the username, password, email, and phone number into the user_login table
            $insert_sql = "INSERT INTO user_login (username, password, email, phone) VALUES (?, ?, ?, ?)";             
            $insert_stmt = $conn->prepare($insert_sql);             
            $insert_stmt->bind_param("ssss", $username_input, $password_input, $email_input, $phone_input);  // Bind the variables

            if ($insert_stmt->execute()) {                 
                $message = "Success: User registered successfully!";             
                // Redirect to user dashboard after successful signup
                header("Location: userdashboard.php");
                exit(); // Ensure to call exit() after header redirection
            } else {                 
                $message = "Error: " . $insert_stmt->error; // Show the SQL error if insert fails
            }
        }
    }
}  

// Close database connection
$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER SIGNUP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/image7.jpg'); /* Reference your local .jpg image here */
            background-size: cover; /* Ensure the image covers the entire page */
            background-position: center center; /* Center the image */
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

        <!-- User Signup Form -->
        <h2><b>USER SIGNUP</b></h2>
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
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>

        <!-- Login Link -->
        <div class="login-link">
            <p>Already have an account? <a href="userlogin.php">Login here</a>.</p>
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
