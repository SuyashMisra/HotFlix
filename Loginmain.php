<?php
    session_start();
    if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'user') {
            header('location: Home.php');
        }
        else if ($_SESSION['type'] == 'admin') {
            header('location: adminhome.php');
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <!-- <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body style="height:657px;">
    <div class="login-dark" style="background-image:url(&quot;assets/img/regback.jpg&quot;);height:657px;background-repeat:no-repeat;padding:0px;margin-top:0px;margin-bottom:0px;background-size: cover;">
        <h1 style="font-family:Allura, cursive;width:264px;font-size:60px;padding-right:0px;padding-bottom:0px;padding-left:94px;padding-top:53px;"><a href="#" style="color:#1eb53a;text-decoration: none;">HotFlix</a></h1>
        <form action="login.php" method="post" style="padding-top: 0px;padding-bottom: 0px">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" required placeholder="Email" style="font-size:20px;"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" required placeholder="Password" style="font-size:20px;"></div>
            <div class="form-group"><input class="btn btn-primary btn-block" type="submit" name="sub" style="font-size:20px;" value="Login"></div>
            <div class="form-group"><a class="btn btn-primary btn-block" role="button" style="font-size:20px;" href="Registermain.php">Sign Up</a></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>