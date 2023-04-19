<?php 
    session_start();
    if($_SESSION['user-logged']) {
        header("Location: pages/main.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotRealBlog - blog for you</title>

    <!-- Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/main.css?<?php echo time(); ?>">
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
        Sign in to your account
    </h3>

    <div class="home-loginWrapper">
        
    <form action="authorization/login.php" method="post" class="home-loginForm">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="user-email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="false">
            <div id="emailHelp" class="form-text">Note: (You can login and register only with gmail.com)</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="user-password" type="password" class="form-control" id="exampleInputPassword1">
            <p class="form-text">length of the password should be more than 6</p>
            <?php 
                
                $passwordErrorMessage = $_SESSION['error-password-msg'];
                if($passwordErrorMessage) {
                    echo "<p class='invalid-password'>
                             invalid password type
                        </p>";
                };
                unset($_SESSION['error-password-msg']);

            ?>
        </div>
            <!-- <input class="home-login-btn" type="submit" value="Login"> -->
        <button type="submit" class="login-btn btn btn-primary">
            Login
        </button>
        <button class="btn btn-primary register-btn">
            <a href="pages/register.php">Register</a>
        </button>
        <?php
            $account = $_SESSION['user-not-found'];
            if($account) {
                echo "<p class='invalid-password'>
                    user not found
                </p>";
            };
            unset($_SESSION['user-not-found']);
        ?>
    </form>

    

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="scripts/app.js"></script>
    
</body>
</html>
