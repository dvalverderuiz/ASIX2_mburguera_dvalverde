<?php







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <title>Expedity</title>
</head>

<body style="background-color: #F4F1E9;">
    <header id="header" style="display: flex; align-items: center;">
        <ul class="nav justify-content-center nav-bar">
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="guias.php"><b>Guias</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="#"><b>Link</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="#"><b>Link</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="../members/login.php"><b>Login</b></a>
            </li>
        </ul>
    </header>

    
    <style type="text/css">
        .button_vamosaello {
            background-color: #A3C1AD;
            border: solid;
            width: 150px;
        }

        .button_vamosaello:hover {
        
            background-color: #F4F1E9 ;

        }
        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            list-style-type: none;
            width: 100%;
            margin-top: 30px;
            padding: 0;
        }

        .user-menu-navbar {
            position: absolute;
            right: 150px;
            top: 30px;
            z-index: 2;
        }

        .nav-item.dropdown {
            border: solid;
            border-radius: 15px;
            background-color: #CAD2C5;
            display: inline-flex;
        }

        .nav-link {
            padding: 10px;
        }

        .caja-central {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 20px;
            background-color: #CAD2C5;
            height: 600px;
            width: 90%;
            max-width: 1200px;
            margin: 60px auto;
            overflow: hidden;
            position: relative;
        }

        .caja-central::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 8px;
            background-color: #F4F1E9;
            transform: rotate(5deg);
            z-index: 1;
        }

        .left-side {
            width: 50%;
            padding: 20px;
            text-align: center;
        }

        .description-text {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        .right-side {
            width: 50%;
            background-color: transparent;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .right-side h2 {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</body>

</html>
