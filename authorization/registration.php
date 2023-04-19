<?php

    session_start();
    $userEmail = $_POST['user-registered-email'];
    $userPassword = $_POST['user-registered-password'];
    $userPasswordAgain = $_POST['user-registered-password-again'];


    $indexOfEmailSymbol = strpos($userEmail, '@');
    $emailPart = substr($userEmail, $indexOfEmailSymbol);


    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
        exit("invalid format please go back and register again");
    };

    if($emailPart === "@gmail.com") {
        if($userPassword !== $userPasswordAgain) {
            $_SESSION['user-password-match'] = "not matched password";
            header("Location: ../pages/register.php");
            exit();
        };

        if(strlen($userPassword) < 6) {
            $_SESSION['password-length-error'] = "password is incorrect";
            header("Location: ../pages/register.php");
            exit();
        };



        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "kurdgeli1703";
        $dbName = "notrealblog-db";

        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
        if($conn) {
            $query = "select * from users where user_email='$userEmail'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            $currentDate = date("Y-m-d");
            if($count === 0) {
                $sql = "INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `data`) VALUES (NULL, '$userEmail', '$userPassword', '$currentDate')";
                if(mysqli_query($conn, $sql)) {
                    echo "you have successfully registered a new account, you will be redirected after 3 seconds";
                    header("refresh:3;url=../index.php");
                } else {    
                    die("sorry something went wrong with database, please try again");
                };
            } elseif($count !== 0) {
                $_SESSION['user-logged'] = "user is already registered, try use another email";
                header("Location: ../index.php");
            }
        } else {
            die("something went wrong, maybe we cannot connect to the database, please try again");
        };

    } else {
        $_SESSION["incorrect-email-type"] = "incorrect email, please user @gmail.com";
        header("Location: ../pages/register.php");
    };

    
    
    

?>