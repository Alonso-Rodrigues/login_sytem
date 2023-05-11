<?php
require "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/index.css">
    <title>Document</title>
</head>
<body>
    <main class="main-index">
        <?php
        if (isset($_SESSION['userId'])) {
            echo'<p>You are logged in!</p>';
        }
        else{
            echo'<p>You are logged out!</p>';
        }
        ?>
    </main>
</body>
</html>

<?php
require "footer.php";
?>