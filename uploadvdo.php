<?php
    session_start();
    if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'user') {
            header('location: Home.php');
        }
    }else{
        header('location: Loginmain.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css"> -->

    <title>Upload</title>
  </head>
  <body style="background-image: url(assets/img/regback.jpg);background-repeat:no-repeat;background-size: cover;">
    <div class="col-lg-6"style="color: white;" height: 500px >
       <form method="post" enctype="multipart/form-data">
            <div class="container" >
              <h1>Upload file</h1>
              <hr>
          <label ><b>Name of Web Series</b></label>
              <input type="text" placeholder="Enter name" name="name" required>
               <br>
              <label ><b>Genre</b></label>
              <input type="text" placeholder="Genre" name="genre" required>
              <br>
              <label ><b>Duration</b></label>
              <input type="text" placeholder="Enter Duration" name="duration" required>
            <br>
              <label ><b>Rating</b></label>
              <input type="text" placeholder="Enter Rating" name="rate" min="0" required>
            
<br>
              <label ><b>Video</b></label>
              <input type="file"  name="vdo" required>
<br>
              <label ><b>Image</b></label>
              <input type="file"  name="img" required>
          
              
              <hr>
              
          
              <button type="submit" class="registerbtn" name="upload">upload</button>
            </div>
            
            
          </form>
          <a class="btn btn-light action-button" href="adminhome.php">Back</a>
        </div> 
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

  </body>
</html>


<?php

    if(isset($_POST['upload']))
    {
        $target_dir = "uploadVideo/";
        $target_dir1 = "uploadImage/";
        $name=$_POST['name'];
        $genre=$_POST['genre'];
        $duration=$_POST['duration'];
        $rate=$_POST['rate'];
        $vdo=$_FILES["vdo"]["name"];
        $img=$_FILES["img"]["name"];
        
        $target_file1 = $target_dir1 . basename($img);
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        
        $target_file = $target_dir . basename($vdo);
        $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        

        $con = mysqli_connect("localhost","root","","dbms") or die("connection failed");
        // Check if file already exists
        $uploadOk = 1;
        
        if (file_exists($target_file)) {
            // header('location: uploadvdo.php');
            echo '<script language="javascript">';
            echo 'alert("Sorry, file already exists.")';
            echo '</script>';
            // echo "<p style='color:white;'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        else if($videoFileType != "mp4" && $videoFileType != "mov" && $videoFileType != "wmv"
        && $videoFileType != "gif" ) {
            // header('location: uploadvdo.php');
            echo '<script language="javascript">';
            echo 'alert("Sorry, only mp4,mov,wmv files are allowed.")';
            echo '</script>';
            // echo "<p style='color:white;'>Sorry, only mp4,mov,wmv files are allowed.</p>";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
            // header('location: uploadvdo.php');
            echo '<script language="javascript">';
            echo 'alert("Sorry, your file was not uploaded due to some error.")';
            echo '</script>';
            // echo "<p style='color:white;'>Sorry, your file was not uploaded.</p>";
        // if everything is ok, try to upload file
        } else {
            $query="INSERT INTO `video`(`name`, `genre`, `duration`, `rating`, `video`, `img`) VALUES ('$name','$genre','$duration','$rate','$vdo','$img')";
            if (mysqli_query($con,$query) && move_uploaded_file($_FILES["vdo"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["img"]["tmp_name"], $target_file1)) {
                // header('location: uploadvdo.php');
                echo '<script language="javascript">';
                echo 'alert("Video uploaded succesfully")';
                echo '</script>';
                
                // echo "<p style='color:white;'>The file ". basename( $_FILES["vdo"]["name"]). " has been uploaded.</p>";
            } else {
                // header('location: uploadvdo.php');
                echo '<script language="javascript">';
                echo 'alert("Sorry, only mp4,mov,wmv files are allowed.")';
                echo '</script>';
                // echo "<p style='color:white;'>Sorry, there was an error uploading your file.</p>";
            }
        }
    }
?>