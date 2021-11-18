<?php
require_once('connect.php');
session_start();
$_SESSION['id'];
if (isset($_SESSION['email'])) {
  $id =$_SESSION['id'];
  $user_details = "SELECT `id`,`firstname`, `lastname`, `email`, `phone`, `country`, `address` FROM `registration_tb` WHERE id = '$id'";
  $query_user = mysqli_query($connect,$user_details);
  $fetch_User = mysqli_fetch_all($query_user);
  $fetch_query = "SELECT `title`, `body`,  `id` FROM `post_tb` WHERE id ='$id'";
  $check_conn = mysqli_query($connect,$fetch_query);
  $fetch_all = mysqli_fetch_all($check_conn);
  if (isset($_POST['create'])) {
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $body =trim(htmlspecialchars(htmlentities($_POST['body'])));
    if ($title==null || $body==null) {
      echo "Input must be filled";
    }else {
      $select_query = "INSERT INTO `post_tb`(`title`, `body`, `id`) VALUES ('$title','$body','$id')";
      $query = mysqli_query($connect,$select_query);
      if ($query) {
        echo "Successfully created Post";
        header("refresh: 1");
        exit();
        }else {
          echo "Encountered an Error";
        }
    }
  }else {
    echo "";
  }
}else {
  echo "email is null";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>Document</title>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-house-fill"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-people"></i></a>
        </li>
        <li class="nav-item">
          <button class="nav-link btn btn-sm btn-danger rounded-pill" data-toggle="modal" data-target="#exampleModal">create post</button>
        </li>
        <li class="nav-item float-right" >
          <a class="nav-link "  href="http://localhost/BlogAssignment/login.php" tabindex="-1" aria-disabled="true">Log Out</a>
        </li>
      </ul>
    </div>
    <div class="col-md-12 card border shadow-sm p-3 mb-5 bg-white rounded pt-3 ">
      <?php if (isset($fetch_User)): 
          foreach($fetch_User as $user):
      ?>
         <div><?php  echo("<span>Welcome Dear </span>"."<b>".$user[1]." ". $user[2])."</br>"."<span>. You can click the create post button, to kindly make a post...</span>";?></div>
        <?php endforeach;
          else :
            echo "No post to see, due to the fact that you're not logged in";
          endif;
        ?>
    </div>
    <div class="col-md-6 mx-auto border rounded pt-3 pb-3 p-3">
        <?php if(isset($fetch_all)):
          foreach($fetch_all as $val):
          ?>
          <div class="card shadow-sm"><h2 class="text-center"><?php echo($val[0])?></h2>
            <p class="display-4"><?php echo($val[0])?></p>
            <hr>
            <div class="justify-content-center">
            <i class="bi bi-link">likes</i>
            <i class="bi bi-chat">comments</i>
            <i class="bi bi-trash">delete</i>
            <i class="bi bi-share">share</i>
            </div>
        </div>
          <?php endforeach;
            else :
              echo "no post yet!, nothing to show...";
            endif;
          ?>
    </div>
  </div>
</div>
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <h4 class="text-center">Make Post</h4>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control col-md-12" placeholder="Post Title..." name="title">
            </div>
           <div class="form-group col-md-12">
           <textarea name="body" id="" cols="30" rows="10" class="form-control col-md-12" placeholder="Post Body..."></textarea>
           </div>
           <div class="form-group">
           <button class="btn btn-dark btn-block" name="create" type="submit">Create Post</button>
           </div>
          </div>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button class="btn btn-dark" name="create" type="submit">Create Post</button> -->
      </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>