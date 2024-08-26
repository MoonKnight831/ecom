<?php
   $login = false ;
   $showError = false ;
   $alertMessage = false;

 if($_SERVER["REQUEST_METHOD"] =="POST"){
   include 'partials/_dbconnect.php';
   $username = $_POST['username'];
   $password = $_POST['password'];
   
   
   // Check if username already exists
   $sql = "SELECT * FROM `data` WHERE `username` = '$username'";
   $result = mysqli_query($conn,$sql);
   $numRows = mysqli_num_rows($result);
   if($numRows > 0){
       $exists = true;
   }
   
  
    // $sql = "Select * from data where username = '$username' and password='$password'";
    $sql = "Select * from data where username = '$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
          if(password_verify($password,$row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
    
            header("location: welcome.php");
          }
          else {
       
            $alertMessage = "Invalid password";
         }
        }
       

      }
   else {
       
       $alertMessage = "Invalid password";
    }
  }
 
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php require 'partials/_nav.php'?>
  <?php
       if ($login) {
           
               echo '
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Success!</strong> You are logged in
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
       }
       else
      {
               echo '
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Error!</strong> '. $alertMessage. '
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
           }
   ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <div class="cont">
    <h1 style="text-align:center;">Login page </h1>
    <form action="/Login/login.php" method="post">
       <div class="mb-3">
         <label for="Username" class="form-label">Username</label>
         <input type="text" class="form-control" id="Username" name="username" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
         <label for="pass" class="form-label">Password</label>
         <input type="password" class="form-control" id="pass" name="password">
       </div>
       <div class="mb-3 form-check">
         <input type="checkbox" class="form-check-input" id="exampleCheck1">
         <label class="form-check-label" for="exampleCheck1">Check me out</label>
       </div>
          <button type="submit" class="btn btn-primary ">Log in</button>
    </form>
  </div>

  <style>
    .cont {
      /* padding: 50px; */
      height: 500px;
      width: 500px;
      border: 2px solid #000;
      margin: auto;
    }

    .cont form {
      height: 400px;
      width: 400px;
      margin: auto;
    }
  </style>

</body>

</html>
``