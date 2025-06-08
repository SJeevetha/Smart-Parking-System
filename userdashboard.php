<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Custom CSS for layout */
    body {
      font-family: Arial, sans-serif;
      background-color: black; /* Changed background color to black */
      color: white; /* Changed text color to white */
      background-size: cover; /* Ensures the image covers the whole screen */
      background-position: center center; /* Centers the image */
      background-attachment: fixed; /* Keeps the background fixed while scrolling */
    }
    .sidebar {
      height: 100vh;
      background-color: #2c3e50;
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
      margin-bottom: 40px; /* Added margin to create gap between heading and boxes */
    }
    .box-container {
      display: flex;
      justify-content: space-around;
    }
    .box {
      width: 350px;  /* Increased width to make boxes longer horizontally */
      height: 250px; /* Adjusted height for a proportional look */
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
    <h3><i>hello parton </i></h3>
    <ul class="nav flex-column">
      <br>
      <li class="nav-item"><a class="nav-link text-white" href="userdashboard.php">slot booking</a></li>
      <!-- Make sure this path is correct -->
       <br>
      <li class="nav-item"><a class="nav-link text-white" href="contactus.php">contact us</a></li>
      <!-- If in a folder, adjust path -->
      <!-- <li class="nav-item"><a class="nav-link text-white" href="folder/contactus.php">contact us</a></li> -->
      <br>
      <li class="nav-item"><a class="nav-link text-white" href="help.php">help</a></li>
    </ul>
  </div>

  <div class="main-content">
    <br>
    <h1 class="text-center"><b><i>SMART PARKING</b></i></h1>
    <br>
    <br>
    <br>
    <div class="box-container">
    <div class="box" id="box1">
    <a href="pvrparking.php">
  <img src="images/image17 (2).jpg" >
  </a>
</div>
<div class="box" id="box2">
  <a href="zudioparking.php">
  <img src="images/image20.jpg" >
  </a>
</div>
<div class="box" id="box3">
<a href="supermarcheparking.php">
  <img src="images/image21.jpg" >
</div>

    </div>

    <div class="d-flex justify-content-around mt-4">
      <div class="box-name" id="box-name-1"><i>PVR</i></div>
      <div class="box-name" id="box-name-2"><i>zudio</i></div>
      <div class="box-name" id="box-name-3"><i>super marche</i></div>
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


  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <!-- Custom JavaScript -->
  <script>
    // Sample JavaScript to change box content dynamically
    document.getElementById('box1').addEventListener('click', function() {
      document.getElementById('box-name-1').innerText = 'pvrparking.php';
    });
    document.getElementById('box2').addEventListener('click', function() {
      document.getElementById('box-name-2').innerText = 'zudioparking.php';
    });
    document.getElementById('box3').addEventListener('click', function() {
      document.getElementById('box-name-3').innerText = 'supermarcheparking.php';
    });
  </script>
</body>
</html>
