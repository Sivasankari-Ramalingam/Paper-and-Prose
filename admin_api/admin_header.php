<?php
// session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Bookstore</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <style>
        
        /* header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #f8f8f8;
            border-bottom: 1px solid #ddd;
        } */

        /* .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        } */

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: white !important;
            /* font-weight: 500; */
            transition: color 0.3s;
        }

        nav ul li a:hover {
            background-color: #007BFF !important;
        }

        .session-id {
            display: none; 
            font-size: 10px;
            color: gray;
        }

        header-actions {
            position: absolute;
            right: 20px;  /* Position the logout link to the right */
            top: 10px;    /* Add space from the top */
        }
    </style> 
</head>
<body>

<header>
    <!-- <a href="index.php" class="logo"><img src='logo.png' style = 'height:50%; width:50%; text-align:left;'> </a> -->
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
            <img src="logo_new.png" alt="logo" style = 'height:30%; width:30%; text-align:left;'>
            </a>     

        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class = "header-actions">
            <div><a href="admin_dashboard.php">Admin Dashboard</a></div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <a href="admin_logout.php" >Logout</a>
            </div>
            </div>
        </div>
    </nav>
</header>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    

  </body>
  </html>