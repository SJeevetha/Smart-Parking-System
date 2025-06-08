<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: purple;
            color: white;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
        .sidebar {
            height: 100vh;
            background-color: rgb(0, 2, 4);
            padding: 20px;
            color: white;
            position: fixed;
            width: 250px;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        h1 {
            margin-bottom: 40px;
        }
        .box-container {
            display: flex;
            justify-content: space-around;
        }
        .box {
            width: 350px;
            height: 250px;
            background-color: #3498db;
            color: white;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
        }
        .box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .box-name {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .back-btn {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3><i>hello admin </i></h3>
        <ul class="nav flex-column">
            <br>
            <li class="nav-item"><a class="nav-link text-white" href="admindashboard.php">booking details</a></li>
            <br>
            <li class="nav-item"><a class="nav-link text-white" href="admincontactdetails.php">contact us details</a></li>
            <br>
            <li class="nav-item"><a class="nav-link text-white" href=""></a></li>
        </ul>
    </div>

    <div class="main-content">
        <br>
        <h1 class="text-center"><b><i>SMART PARKING</b></i></h1>
        <br>
        <br>
        <br>
        <div class="box-container">
            <div class="box">
                <a href="adminpvrdetails.php">
                    <img src="images/image17 (2).jpg" alt="PVR Parking">
                </a>
            </div>
            <div class="box">
                <a href="adminzudiodetails.php">
                    <img src="images/image20.jpg" alt="Zudio Parking">
                </a>
            </div>
            <div class="box">
                <a href="adminsupermarche.php">
                    <img src="images/image21.jpg" alt="Super Marche Parking">
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-around mt-4">
            <div class="box-name"><i>PVR</i></div>
            <div class="box-name"><i>Zudio</i></div>
            <div class="box-name"><i>Super Marche</i></div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="back-btn">
        <a href="dashboard.php">
            <button class="btn btn-danger">Back</button>
        </a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>