<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Drive System</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for background image */
        body {
            background-image: url('https://wallpapercave.com/wp/wp9192457.jpg'); 
            background-size: cover;
            background-position: center top;
            margin: 0;
            padding: 0;
            height: 100vh; /* Set height to full viewport height */
            /* display: flex; */
            justify-content: center;
            align-items: center;
            color: white; /* Set text color to white */
        }
        /* Adjust navbar styles */
        .navbar {
            background-color: #343a40; /* Dark background color */
        }
        /* Adjust navbar links styles */
        .navbar-brand {
            color: white; /* Set navbar brand text color to white */
        }
        .navbar-nav .nav-link {
            color: white;
            margin-right: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Test Drive System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register For Test Drive</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/loginstaff">Login as Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registerstaff">Register as Staff</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
