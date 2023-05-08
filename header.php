<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="./index.php">
                <img src="./assets/img/business.png" alt="">
            </a>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="#">Portifolio</a></li>
                <li><a href="#">About me</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div>
                <?php
                if (isset($_SESSION['userId'])) {
                    echo'
                    <form action="./includes/logout.php" method="POST">
                        <button type="submit" name="logout-submit" id="btn-logout">Logout</button>
                    </form>';
                }
                else{
                    echo
                    '<form action="./includes/login.php" method="POST">
                        <input type="text" name="mailuid" placeholder="e-mail">
                        <input type="password" name="pwd" placeholder="password">
                        <button type="submit" name="login-submit" id="btn-login">Login</button>
                    </form>
                    <a href="./signup.php">Signup</a>';
                }
                ?>              
            </div>
        </nav>
    </header>
</body>
</html>