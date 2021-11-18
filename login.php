<?php
require_once('connect.php');
session_start();
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];
    if ($email == null || $password == null) {
      echo "Enter your email and password";
      sleep(2);
      header("refresh: 1");
        exit();
    }else {
      $select_query = "SELECT `id`, `firstname`, `lastname`, `email` FROM `registration_tb` WHERE email ='$email'";
      $conn = mysqli_query($connect,$select_query);
      $fetch_query = mysqli_fetch_all($conn);
      if (($email!=null || $password !=null) and ($email ==  $fetch_query[0][3])) {
        $_SESSION['email'] = $fetch_query[0][3];
        $_SESSION['id'] = $fetch_query[0][0];
        echo "logged in successfully";
        sleep(3);
        header("Location: http://localhost/BlogAssignment/home.php","refresh: 1");
        exit();
      }else {
        echo "something is wrong ooo";
        sleep(2);
        header("refresh: 1");
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Login Form</title>
  <style>
    body{
      background: #e0e0e0e0; 
     
    }
    .col-4{
      border-radius: 15px;
        background: transparent;
          box-shadow:  20px 20px 60px #bebebe,
             -20px -20px 60px #ffffff;
    }
    input{
      background: #bebebe;
    }
  </style>
  <div class="container">
    <div class="row pt-4">
      <div class="col-4 mx-auto border shadow-sm p-3 mb-5 bg-white rounded pt-3 text-center">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <h4 class="text-center">Login Form</h4>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group col-md-12">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
              <button class="btn btn-lg btn-dark" type="submit" name="submit">login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</head>
<body>
  
</body>
</html>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
