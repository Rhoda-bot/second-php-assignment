<?php
  $connect = mysqli_connect('localhost','root','','blog_db');
  if (mysqli_error($connect)) {
    die();
  }
?>