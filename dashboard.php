<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-image: url('images/iamge13.jpg'); /* Add a background image */
            background-size: cover;
            background-position: center;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            scrollbar-color: grey black;
            scrollbar-width: thin;
        }

        h1 {
        
            background-size: cover;
            background-position: center;
            color: black;
            padding: 100px;  /* Increased padding to give a bigger heading */
            text-align: center;
            font-style: italic;
            font-size: 80px;
            margin-bottom: 60px;
            border-radius: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Added text shadow for better readability */
        }

        .navbar {
            margin-bottom: 20px;
            height: 70px;
            background-color: #222;
            position: fixed; /* Fixed the navbar at the top */
            width: 100%;
            top: 0;
            z-index: 999; /* Ensures the navbar stays above other content */
        }

        .navbar-brand, .nav-link {
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        .content-section {
            padding: 30px;
            border: 1px solid #ddd;
            margin-top: 120px;
            background-color: rgba(51, 51, 51, 0.8); /* Added transparency to the background */
            border-radius: 10px;
        }

        .carousel-item img {
            width: 100%;  
            height: 70vh;  
            object-fit: cover;
            margin: 0 auto;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: darkred;
        }

        .navbar-nav .nav-link h4 {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <center>
        <h1><i><b>SMART PARKING</b></i></h1>
    </center>
    <br>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php" style="color: white;"><h4>Home</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php" style="color: white;"><h4>Contact Us</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminlogin.php" style="color: white;"><h4>Admin Login</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userlogin.php" style="color: white;"><h4>User Login</h4></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="home" class="content-section">
        <p><b>Welcome to our Smart Parking website!</b></p>

        <!-- Carousel Section -->
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/image12.jpg" class="d-block" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="images/image14.jpg" class="d-block" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="images/image15.jpg" class="d-block" alt="Image 3">
                </div>
                <div class="carousel-item">
                    <img src="images/image16.jpg" class="d-block" alt="Image 4">
                </div>
                <div class="carousel-item">
                    <img src="images/image17.jpg" class="d-block" alt="Image 5">
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="content-section">
    <h3><B> Smart Parking<b></h3>
        <p><i>Smart Parking is an innovative solution that aims to reduce parking-related challenges in urban environments. Using sensors, real-time data, and mobile apps, it helps drivers easily find available parking spaces, saves time, and reduces traffic congestion. The system often includes features like automatic payments, reservation of parking spots, and even dynamic pricing based on demand</i></p>
        <p><i>The main goal of Smart Parking is to make the parking process easier, faster, and more efficient, benefiting both drivers and parking operators. With real-time monitoring and smart technologies, Smart Parking helps to optimize the use of available parking spaces and makes urban transportation more sustainable.</i></p>
    
    </div>

    <div class="content-section">
        <h3><b>Features of Smart Parking</b></h3>
        <ul>
            <li><b>Real-time Parking Availability:</b> Smart Parking systems show available spaces through real-time data...</li>
            <li><b>Reservation System:</b> Reserve a parking spot in advance using a mobile app...</li>
            <li><b>Automated Payments:</b> Pay for parking using mobile apps or automated systems...</li>
            <li><b>Environmental Benefits:</b> Reduced traffic congestion...</li>
            <li><b>Security Features:</b> Smart Parking systems may include surveillance cameras...</li>
            <li><b>Dynamic Pricing:</b> Parking fees vary based on demand...</li>
            <li><b>Flexible Payment Options:</b> Users can pay using various methods...</li>
        </ul>
    </div>

    <div class="footer">
        <p>&copy; Smart Parking. All rights reserved by karthi</p>
    </div>


    <!-- Bootstrap JS and Dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
