<?php
    include 'php/save.php';
    include 'php/db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
</head>

  <body>
 <div class="container ">
    
    <div class="d-flex justify-content-center">

        <div class="card login_card" >
            <div class="d-flex justify-content-center">
                <div class="logo_container">  <img class="login_logo" src="images/logo 2.jfif">
                </div>   
            </div>
            <div class="d-flex justify-content-center form_container row">
                    <!--<form action="signup.inc.php" method="post">-->
                    <div class="form-group col-12">
                         <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" name="name" class="form-control signUpBox" id="fullname" aria-describedby="emailHelp" placeholder="Enter Full name" required>
                    </div>
                        <div class="form-group col-12">
                          <label for="exampleInputEmail1">User Name</label>
                          <input type="text" name="uname" class="form-control signUpBox" id="username" aria-describedby="emailHelp" placeholder="Enter User name" required>
   
                        </div>
                        <div class="form-grou col-12">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email" class="form-control signUpBox" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
   
                        </div>
                        <div class="form-group col-12">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="password" class="form-control signUpBox" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-12">
                          <label for="exampleInputPassword1">Re-Type Password</label>
                          <input type="password" name="tpassword" class="form-control signUpBox" id="repassword" placeholder="Retype Password" required>
                        </div>
                        
                        <div class="form-group col-12">
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button id="signUp" name="submit" class="btn-success signup_btn">Sign Up</button>
                        </div>
                    </div>
</div>
                      <!--</form>-->
            </div>
        </div>
    </div>
     
 </div>    
<script>
//  $(document).read({

//  });
</script>
 <script src="main.js"></script>


<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
</script>
  </body>
</html>