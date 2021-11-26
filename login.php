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
               
                  
                        <div class="form-group col-12">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email"  class="form-control loginBox" id="email" aria-describedby="emailHelp" placeholder="Enter email"  >
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group col-12">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control loginBox" id="pwd" placeholder="Password" >
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container col-12">
                        <div class="form-group ">
                        <button id="login" class="btn login_btn">Login</button> 
                        </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container col-12">
                        <div class="form-group ">
                        <a id="makeaccount" href="signup.php">Sign up</a>
                        </div>
                        </div>
                    
                

            </div>



        </div>
    </div>
     
 </div>     
<script>
  $(document).ready(()=>{
    $('#login').on('click', () => {
        var tracker = 0;
        var txtBoxes = document.querySelectorAll('.loginBox');
        for (var i = 0; i < txtBoxes.length; i++) {
            if (txtBoxes[i].value == "") {
                txtBoxes[i].style.border = "1px solid red";
                tracker++;
            } else {
                txtBoxes[i].style.border = "1px solid gray";
            }
        }
        
        if (tracker == 0) {
            
            var email = $('#email').val();
            var pwd = $('#pwd').val();
    

            $.ajax({
                url: "php/login.php",
                type: "POST",
                data: {
                    email: email,
                    pwd: pwd
                },
                success: function(dresult) {
                    var dresult = JSON.parse(dresult);
                    if (dresult.statusCode == 100) {
                        window.location.href = "./shopping.php"
                    } else if (dresult.statusCode == 101) {
                        alert(dresult.message);
                    }
                }
            });
        }
    });
  });
  </script>
<script src="main.js"> </script>
 <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
</script>
  </body>
</html>