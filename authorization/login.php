<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    $userEmail = $_POST['user-email'];
    $userPassword = $_POST['user-password'];

    $indexOfEmailSymbol = strpos($userEmail, '@');
    $emailPart = substr($userEmail, $indexOfEmailSymbol);
    
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
        exit("invalid format please go back and register again");
    };

    if(!(strlen(trim($userPassword)) > 6)) {
	
        $_SESSION['error-password-msg'] = 'invalid password type';
        header('Location: ../index.php');
        die("");
    }		

    if($emailPart === "@gmail.com") {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "kurdgeli1703";
        $dbName = "notrealblog-db";
        
        
        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

        if($conn) {

            $query = "select * from users where user_email='$userEmail' and user_password='$userPassword'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if($count > 0) {
                $_SESSION['user-logged'] = "user is logged";
                header("Location: ../pages/main.php");
            } else {
                $_SESSION['user-not-found'] = 'user not found';
                header("Location: ../index.php");
            }


        } else {
            die("we cannot connect to the database please go back");
        }

    } else {
        exit("you did not use @gmail.com for registering or invalid password. please go back and try again");
    };  

    
    

?>
