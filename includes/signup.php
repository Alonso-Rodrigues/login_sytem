<?php
// Here I'm checking if the button of the page signup.up (outside includes) is sending 
if (isset($_POST['signup-submit'])) {
    // Here I need to require the page that I've connected with the database
    require 'dbh.php';
    //Here I put the variables that were in the form at signup.php
    $userName = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    // Here is a condition to check if the fields in the form are empty
    if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$userName."&mail=".$email);
    // Exit is to stop the code if there is any mistake
    exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    // This condition is to check if there is a validated email
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$userName);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../signup.php?error=invaliduid&mail=". $email);
        exit();
    }
    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$userName."&mail=".$email);
        exit();
    }
    else{
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            // Here I passe the parameters(String=is, Integer=i, Blob=b, Double=d)
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, 'sss', $userName, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }

            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else{
    header("Location: ../signup.php");
    exit();
}