<?php
require "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/signup.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="signup-div">
            <section class="signup-container">
                <h1>Signup</h1>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class="signuperror">Fill in all fields!</p>';
                    }
                    else if($_GET['error'] == "invaliduidmail"){
                        echo '<p class="signuperror">Invalid username and e-mail!</p>';
                    }
                    else if($_GET['error'] == "invaliduiuid"){
                        echo '<p class="signuperror">Invalid username!</p>';
                    }
                    else if($_GET['error'] == "invaliduidmail"){
                        echo '<p class="signuperror">Invalid e-mail!</p>';
                    }
                    else if($_GET['error'] == "passwordcheck"){
                        echo '<p class="signuperror">Your password do not match!</p>';
                    }
                    else if($_GET['error'] == "usertaken"){
                        echo '<p class="signuperror">Username is already taken!</p>';
                    }
                }
                if (isset($_GET['signup']) && $_GET['signup'] == "success") {
                    echo '<p class="signuperror">Signup successful!</p>';
                }
                ?>
                <form action="./includes/signup.php" method="POST">
                    <input type="text" name="uid" placeholder="username" value=<?= !empty($_GET['uid']) ? $_GET['uid'] : '' ?>>
                    <input type="text" name="mail" placeholder="e-mail" value=<?= !empty($_GET['mail']) ? $_GET['mail'] : '' ?>>
                    <input type="password" name="pwd" placeholder="password">
                    <input type="password" name="pwd-repeat" placeholder="repeat password">
                    <button type="submit" name="signup-submit">Signup</button>                
                </form>
            </section>
        </div>
    </main>
</body>
</html>

<?php
require "footer.php";
?>
