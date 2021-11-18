<?php
  require_once('connect.php');
  session_start();
  // function secureText( $text)
  // {
  //  trim(htmlspecialchars(htmlentities($text)));
  // }
  // $fetch_all = mysqli_fetch_all($fetch_query,MYSQLI_ASSOC);
    if (isset($_POST['submit'])) {
    $firstname =trim(htmlspecialchars(htmlentities($_POST['firstname'])));
    $lastname =trim(htmlspecialchars(htmlentities($_POST['lastname'])));
    $email =trim(htmlspecialchars(htmlentities($_POST['email'])));
    $phone =trim(htmlspecialchars(htmlentities($_POST['phone'])));
    $country =trim(htmlspecialchars(htmlentities($_POST['country'])));
    $address =trim(htmlspecialchars(htmlentities($_POST['address'])));
    $password =trim(htmlspecialchars(htmlentities($_POST['password'])));
    
    if ($firstname==null || $lastname ==null || $email == null || $phone == null || $country == null || $address == null || $password == null) {
      echo "Input must be filled";
    }else {
      $select_query = "SELECT `id`,  `firstname`, `lastname`, `email`, `phone`, `country`, `address` FROM `registration_tb`  WHERE email ='$email'";
      $fetch_query = mysqli_query($connect,$select_query);
      $fetch_all = mysqli_fetch_all($fetch_query,MYSQLI_ASSOC);
      // $_SESSION['id'] = $fetch_all[0]['id'];
      // $_SESSION['email'] = $fetch_all[0]['email'];
      if ($fetch_query->num_rows >0) {
       echo "User Already Exist";
      }else {
        $insert_query = "INSERT INTO `registration_tb`(`firstname`, `lastname`, `email`, `phone`, `country`, `address`, `password`) VALUES ('$firstname','$lastname','$email','$phone','$country','$address','$password')";
        $conn = mysqli_query($connect,$insert_query);
        if ($conn) {
         echo "User successfully Registered";
         header("Location: http://localhost/BlogAssignment/login.php","refresh: 1");
         exit();
         sleep(3);
        }else {
         echo "Encountered an error";
        }
      }
    }
   
  }else {
    echo "You Landed On the Wrong Page!";
  }

?>