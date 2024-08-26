<?php
   $showAlert = false ;

 if($_SERVER["REQUEST_METHOD"] =="POST"){
   include 'partials/_dbconnect.php';
   $username = $_POST['username'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $exists = false;
   
   // Check if username already exists
   $sql = "SELECT * FROM `data` WHERE `username` = '$username'";
   $result = mysqli_query($conn,$sql);
   $numRows = mysqli_num_rows($result);
   if($numRows > 0){
      $alertMessage = "Username already exists";
      $showAlert = true;

   }
   else{
   
   if ($password == $cpassword) {
     $hash = password_hash($password ,PASSWORD_DEFAULT);
      $sql = "INSERT INTO `data` (`username`, `password`, `date`) VALUES ( '$username', '$hash', current_timestamp())";
      $result = mysqli_query($conn,$sql);
      if($result){
        $showAlert = true;
      }
    } else {
        $showAlert = true;
        $alertMessage = "Passwords do not match.";
    }
 }
}

?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php'?>
    <?php
       if ($showAlert) {
           if(isset($alertMessage)){
               echo '
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Error!</strong> '. $alertMessage. '
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
           } else {
               echo '
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Success!</strong> Your Account is Created.
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
           }
       }
   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <div class="cont my-4">
        <h1 style="text-align:center;">Login page </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" maxlength="11" id="Username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="password" maxlength="23">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" maxlength="23">
                <div id="emailHelp" class="form-text">Make sure your password is same.</div>

            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary col-md-12">Submit</button>
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
