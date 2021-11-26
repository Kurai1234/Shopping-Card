<?php
include_once 'php/db.php'; 
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `user` WHERE `usersID` = '$user_id' ";
    $execute = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($execute);
    if($row){
        $rowinfo = mysqli_fetch_array($execute);
        $fName= $rowinfo['usersName'];
        $uName= $rowinfo['usersUid'];
    
    }
}else{
 header("location: login.php");
 exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"href="/shopping%20App/style.css">
   
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-md  navbar-dark navbar_info color text-white">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="images/logo 2.jfif" alt="Logo" style="width:40px;border-radius: 50px;">
        </a>
        <span class="navbar-brand">Publics</span>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" id="productsection" href="#">Products</a>
                </li>
               
                <li class="nav-item container_cart">
                    <a class="nav-link"href="#">Cart</a>
                </li>
                <!-- <li class="nav-item container_checkout">
                    <a class="nav-link" href="#">Checkout</a>
                </li> -->
                <li class="nav-item ">
                    <a class="nav-link" href="php/logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="productpage">
        <div class="jumbotron headingjombo" style="background-color: white;">
            <div class="row py-4">
                <div class="col-lg-6 pt-5 text-center">
                    <h1 class="pt-5">Publics Shopping Center</h1>
                    <button class="learnbutton mt-3">Learn More</button>
                </div>
            </div>
        </div>
        <section class="new">
            <div class="container py-5">
                <div class="row pt-5">
                    <div class="col-sm-7 m-auto">
                        <div class="row text-center ">
                            <div class="col-sm-4 design">
                                <img src="images/vegetable.png" class="imgfluid" alt="">
                                <h6>VEGETABLE</h6>
                            </div>
                            <div class="col-sm-4 design">
                                <img src="images/soft-drink.png" class="imgfluid" alt="">
                                <h6>DRINKS</h6>
                            </div>
                            <div class="col-sm-4 design">
                                <img src="images/detergent.png" class="imgfluid" alt="">
                                <h6>DETERGENT</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product">
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-6 m-auto text-center">
                        <h1>Explore our inventory</h1>
                        <h6 style="color: red; ">Our Products are affordable</h6>
                    </div>
                </div>

                <div class="row py-5" id="datatobeenter">
                   
                   
                </div>
            </div>
        </section>


    </div>



    <div class=".container_fluid cart_page">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Cart</h1>
            </div>
</div>
            <div class="row mx-3 lister" style="border-bottom:1px black solid; padding:10px;">
            <div class="col-sm-3 text-center list">
                <h6>Product</h6>
            </div>
            <div class="col-sm-2 text-center list">
                <h6>Name</h6>
            </div>
            <div class="col-sm-2 text-center list">
                <h6>Quality</h6>
            </div>
            <div class="col-sm-2 text-center list">
                <h6>Price</h6>
            </div>
            <div class="col-sm-3 text-center list">
                <h6>Remove</h6>
            </div>
</div>
<div class="ayo">

        </div>
        <div class="row mx-3 lister" style="
        border-top:1px black solid;border-bottom:1px black solid; padding:10px;">
            <div class="col-sm-5 text-center list">
               Total
            </div>
       
            <div class="col-sm-2 text-center list">
                <h6 id="totalamount">Quality</h6>
            </div>
            <div class="col-sm-5 text-center list">
                <h6 id="totalprice">Price</h6>
            </div>
            
</div>
        <div class="container col-12 text-center">
        <button class="checkoutbtn btn btn-success">Checkout</button>
        </div>
      
    </div>




    <div class=".container_fluid allcontainer ">


        <!--inventory page-->


        <!--Checkout-->
        <div class="container checkout_container ">
            <div class="row ">
                <div class="col ">
                    <h2>Checkout</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12 order-1 ">
                    <div class="container checkoutformcont">
                        <h2>Billing</h2>

                        <!-- <form> -->
                            <div class="row ">
                                <div class="col-sm ">
                                    <label>First Name:</label>
                                    <input type="text " class="form-control formclass" id="fname" placeholder="Enter First Name " name="fname" required>
                                    <div class="valid-feedback ">Valid.</div>
                                    <div class="invalid-feedback ">Please fill out this field.</div>
                                </div>
                                <div class="col-sm ">
                                    <label>Last Name:</label>
                                    <input type="text " class="form-control formclass" id="lname" placeholder="Enter First Name " name="lname " required>
                                    <div class="valid-feedback ">Valid.</div>
                                    <div class="invalid-feedback ">Please fill out this field.</div>
                                </div>
                            </div>


                            <div class="row ">
                                <div class="col-sm ">
                                    <label>Email (Optional)</label>
                                    <input type="email " class="form-control formclass" placeholder="youexample@gmail.com " id="emaill">
                                    <div class="valid-feedback ">Valid.</div>
                                    <div class="invalid-feedback ">Please fill out this field.</div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6 ">
                                    <label>Address</label>
                                    <input type="text " class="form-control formclass" placeholder="123 Main St. " id="address" required>
                                    <div class="valid-feedback ">Valid.</div>
                                    <div class="invalid-feedback ">Please fill out this field.</div>
                                </div>
                                <div class="col-sm-6 ">


                                    <label for="sel1 ">District</label>
                                    <select class="form-control " id="district1">
                                            <option>Select District</option>
                                          <option>Corozal</option>
                                          <option>Orange Walk</option>
                                          <option>Belize</option>
                                          <option>Cayo</option>
                                          <option>Stann Creek</option>
                                          <option>Toledo </option>
                                        </select>


                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6 ">
                                    <label>Address 2 (Optional)</label>
                                    <input type="text " class="form-control formclass" placeholder="Main suite " id="address2">
                                    <!-- <div class="valid-feedback ">Valid.</div>
                                    <div class="invalid-feedback ">Please fill out this field.</div>-->
                                </div>
                                <div class="col-sm-6 ">

                                    <label for="sel1 ">District</label>
                                    <select class="form-control " id="district2"> 
                                        <option>Select District</option>
                                      <option>Corozal</option>
                                      <option>Orange Walk</option>
                                      <option>Belize</option>
                                      <option>Cayo</option>
                                      <option>Stann Creek</option>
                                      <option>Toledo </option>
                                    </select>

                                </div>
                            </div>



                            <div class="row ">
                                <div class="col-sm-6 ">
                                    <label>Name on Card</label>
                                    <input type="text " class="form-control formclass" id="cardname" required>
                                    <p class=".small ">
                                        <div class="valid-feedback ">Valid.</div>
                                        <div class="invalid-feedback ">Full name on display card</div>
                                </div>
                                <div class="col-sm-6 ">
                                    <label>Credit Card Number</label>
                                    <input type="text " class="form-control formclass" id="cardnumber" required>

                                    <div class="valid-feedback ">Valid.</div>
                                    <div class="invalid-feedback ">Name on Card id required.</div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-12 ">
                                    <div class="row ">
                                        <div class="col-sm-6 ">
                                            <label>Expiration</label>
                                            <input type="text " class="form-control formclass" id="expirationdate" required>
                                            <div class="valid-feedback ">Valid.</div>
                                            <div class="invalid-feedback ">Expiration date required.</div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <label>CVV</label>
                                            <input type="text " class="form-control formclass" id="cvv" required>
                                            <div class="valid-feedback ">Valid.</div>
                                            <div class="invalid-feedback ">Security code required</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-sm ">
                                    <button class="btn btn-success checkoutbutton ">Contiune to check out</button>
                                </div>
                            </div>

                        <!-- </form> -->


                    </div>
                </div>

                <!-- <div class="col-sm-4 order-md-1 ">
                    <div class="container ">
                        <h2>Your Cart</h2>
                        <div class="row ">
                            <div class="col-sm ">
                                <ul class="list-group ">
                                    <li class="list-group-item ">
                                        <div class="row ">
                                            <div class="col-sm-6 liname ">FirstItem</div>
                                            <div class="col-sm-6 liprice ">$100</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item ">
                                        <div class="row ">
                                            <div class="col-sm-6 ">FirstItem</div>
                                            <div class="col-sm-6 ">$100</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item ">
                                        <div class="row ">
                                            <div class="col-sm-6 ">FirstItem</div>
                                            <div class="col-sm-6 ">$100</div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col " style="margin-top:20px; ">

                                <div class="input-group mb-3 ">

                                    <input type="number " class="form-control " placeholder="$0.00 " disabled>

                                </div>

                            </div>

                        </div>
                        <div class="row ">
                            <div class="col " style="margin-top:20px; ">

                                <div class="input-group mb-3 ">
                                    <input type="text " class="form-control " placeholder="Redeem ">
                                    <div class="input-group-append ">
                                        <button class="input-group-text ">Redeem</button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div> -->
            </div>

        </div>

    </div>
    <footer class="text-center  ">
        <div class="footerdiv">Contact us: 123@email.com
            <br> Facebook
            <br> Twitter
            <br>

        </div>

    </footer>

    <!--Require jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
    <!--main.js-->
    <script src="main.js "></script>
</body>

</html>