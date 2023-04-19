<?php 
    session_start();
    $emailCorrect = $_SESSION['incorrect-email-type'];
    $userLoged = $_SESSION['user-logged'];
    $passwordMatch = $_SESSION['user-password-match'];
    $passwordLength = $_SESSION['password-length-error'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <!-- Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/main.css?<?php echo time(); ?>">
    <!-- Styling -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Tilt+Prism&display=swap" rel="stylesheet">
    <!-- Fonts -->
</head>
<body>


    <h1 class="home__hometitle">NotRealBlog</h1>
    <h3 class="home__homedescription">
        Register your account
    </h3>

    <div class="home-loginWrapper">
        
    <form action="../authorization/registration.php" method="post" class="home-loginForm">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="user-registered-email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php 
                if($emailCorrect) {
                    echo "<p class='error-message'>INCORRECT EMAIL FORMAT, PLEASE USE @GMAIL.COM</p>";
                };
                echo "<div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>";
                unset($_SESSION['incorrect-email-type']);
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="user-registered-password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input name="user-registered-password-again" type="password" class="form-control" id="exampleInputPassword1">
            <p class="length-password">
                length of the password should be more than 6
            </p>
            <?php
                if($passwordMatch) {
                    echo "<p class='error-message'>password are not matched</p>";
                } elseif($passwordLength) {
                    echo "<p class='error-message'>password length is not correct, you should use more than 6 symbols</p>";
                };
                unset($_SESSION['user-password-match']);
                unset($_SESSION['password-length-error']);
            ?>
        </div>
        <button type="submit" class="btn btn-primary register-btn-individual">
            Register
        </button>
        <button class="btn btn-primary">
            <a href="../index.php">Login</a>
        </button>
        <?php 
            if($userLoged) {
                echo "<p class='error-message'>user with this email already exists</p>";
            };
            unset($_SESSION['user-logged']);
        ?>
    </form>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../scripts/app.js"></script>
    
</body>
</html>