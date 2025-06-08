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

// Handle form submission for user login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {     
    $username_input = trim($_POST['username']);  // User input for username
    $password_input = $_POST['password'];        // User input for password

    // Prepare SQL query to check for valid user credentials
    $select_sql = "SELECT * FROM admin_login WHERE username = ? AND password = ?";
    $select_stmt = $conn->prepare($select_sql);             
    $select_stmt->bind_param("ss", $username_input, $password_input);  // Bind the variables

    $select_stmt->execute();
    $result = $select_stmt->get_result();

    // Check if user exists and the password matches
    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION['username'] = $username_input; // Set session variable for username
        echo "<script>
                alert('Login successful!');
                window.location.href='admindashboard.php';
              </script>";
        exit();
    } else {
        // Invalid login credentials
        echo "<script>
                alert('Invalid username or password!');
                window.history.back();
              </script>";
        exit();
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
    <title>ADMIN LOGIN</title>
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

        .signup-link {
            font-size: 16px;
        }

        .signup-link a {
            color: #1e90ff;
            text-decoration: none;
        }

        .signup-link a:hover {
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

        <!-- Admin Login Form -->
        <h2><b>ADMIN LOGIN</b></h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

        <!-- Signup Link -->
        <div class="signup-link">
            <p>Don't have an account? <a href="adminsignup.php">Sign up here</a>.</p>
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
