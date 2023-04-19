<?php

    session_start();
    $isUserLogged = $_SESSION['user-logged'];
    if(!($isUserLogged)) {
        header('Location: ../index.php');
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotRealBlog - Fake social media it's not real</title>
</head>
<body>

    <h1>NotRealBlog main page</h1>
    
    <a href="../authorization/logout.php">
        Logout
    </a>

</body>
</html>