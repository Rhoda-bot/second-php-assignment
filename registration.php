

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Registration Form</title>
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
      background: #e0e0e0e0;
    }
  </style>
</head>
<body>
   <div class="container">
     <div class="row pt-3 ">
       <div class="col-4 mx-auto border shadow-sm p-3 mb-5 bg-white rounded pt-3 text-center align-center">
       <form action="database.php" method="POST">
        <h4 class="text-center col-sm-6 col-md-12">Registration Form</h4>
      <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" placeholder="First Name" name="firstname" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <input type="text" placeholder="Last Name"  name="lastname" class="form-control">
          </div>
          <div class="form-group col-12">
            <input type="email" placeholder="Email" name="email"  class="form-control">
          </div>
          <div class="form-group col-2">
            <input type="text" placeholder="+234"  class="form-control" disabled>
          </div>
          <div class="form-group col-10">
            <input type="text" placeholder="Telephone" name="phone" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <input type="text" placeholder="Address" name="address" class="form-control">
          </div>
          <div class="form-group input-field col s12 ">
            <select name="country" id="country" class="form-control">
              <option value="Abuja">Abuja</option>
              <option value="Lagos">Lagos</option>
              <option value="Oyo">Oyo</option>
              <option value="Port Harcourt">Port Harcourt</option>
              <option value="Benue">Benue</option>
              <option value="Plateau">Plateau</option>
              <option value="Kaduna">Kaduna</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <input type="password" placeholder="Password"   name="password" class="form-control">
          </div>
          <div class="form-group col-md-12">
            <button  type="submit" name="submit" class="btn-block btn-sm btn-dark">submit</button>
          </div>
      </div>
    </form>
       </div>
     </div>
   </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

