<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/Login-Form-Dark.css"> -->
    <!-- <link rel="stylesheet" href="assets/fonts/ionicons.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body style="background-image:url(&quot;assets/img/regback.jpg&quot;);background-repeat:no-repeat;background-size: cover;height:650px;">
    <div class="register-photo" style="background-color:rgba(241,247,252,0);height:650px;padding-top:44px;">
    	<h1 style="font-family:Allura, cursive;width:264px;font-size:60px;padding-right:0px;padding-bottom:0px;padding-left:94px;padding-top:9px;"><a href="#" style="color:#1eb53a;text-decoration: none;">HotFlix</a></h1>
        <div class="form-container">
            <form name='myform' action="register.php" method="post" style="background-color:rgba(0,0,0,0.56);">
                <h2 class="text-center" style="color:rgb(255,255,255);">Create an account.</h2>
                
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input id="confirmpassword" class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required>
                </div>
                
                <div class="form-group">
                    <button id="btnsubmit" class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </div>
                <a href="Loginmain.php" class="already" style="color:rgb(255,255,255);font-size:18px;">You already have an account? Login here.</a>
            </form>
        </div>
    </div>

    
    <script type="text/javascript">
         $(function()
        {
            $("#btnsubmit").click(function()
            {
                var password= $("#password").val();
                var confirmPassword= $("#confirmpassword").val();
                if(password != confirmPassword){
                    alert("Password fields must be same !");
                    return false;
                }
                if (password.length <6) {
                    alert("Password must have atleast 6 characters!");
                    return false;
                }
                return true;
            });
        });
    </script>
     
</body>

</html>

