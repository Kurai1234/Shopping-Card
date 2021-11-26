$(document).ready(() => {

    const $content = $('.productpage');
    const $cart = $('.cart_container');
    const $cartpage = $('.cart_page');
    const $checkout = $('.checkout_container');
    const $productbutton = $('#productsection');
    var $shoppingcartlist = new Object();
    var gtotal = 0;

    var gamount = 0;
    var counter = 0;
    var itemforsale = {
        1: {
            Name: 'Mango',
            Price: '1',
            image: 'images/mango.jpg'
        },
        2: {
            Name: 'Egg',
            Price: '0.25',
            image: 'images/egg.jpg'
        },
        3: {
            Name: 'Milk',
            Price: '2.25',
            image: 'images/milk.jpg'
        },
        4: {
            Name: 'Water Melon',
            Price: '2.00',
            image: 'images/WaterMelon.jpg'
        }
    };

    $('#signUp').on('click', () => {
        var tracker = 0;
        var txtBoxes = document.querySelectorAll('.signUpBox');
        for (var i = 0; i < txtBoxes.length; i++) {
            if (txtBoxes[i].value == "") {
                txtBoxes[i].style.border = "1px solid red";
                tracker++;
            } else {
                txtBoxes[i].style.border = "1px solid gray";
            }
        }

        //heck for passwords
        var pwd = $('#password').val();
        var repwd = $('#repassword');
        if (pwd != repwd.val()) {
            $('#password').css("border", "1px solid red");
            repwd.css("border", "1px solid red");
            tracker++;
        }

        if (tracker == 0) {
            var name = $('#fullname').val();
            var uname = $('#username').val();
            var email = $('#email').val();
            //alert(name+', '+uname+', '+email+', '+pwd);


            $.ajax({
                url: "php/save.php",
                type: "POST",
                data: {
                    name: name,
                    uname: uname,
                    email: email,
                    pwd: pwd
                },
                success: function(dresult) {
                    var dresult = JSON.parse(dresult);
                    alert(dresult.message);
                    if (dresult.statusCode == 100) {
                        window.location.href = "./shopping.php";

                        load();



                    } else if (dresult.statusCode == 101) {
                        alert("Oops something happened");
                    }
                }
            });
        }
    });


    for (const key in itemforsale) {
        var loada = `<div class="col-sm-3 text-center">
        <div class="card border-0 bg-light mb-2  productcard">
            <div class="card-body">
                <img src="${ itemforsale[key]['image']}" alt="" class="img-fluid image">
                <div class="info">
                    <h6>${ itemforsale[key]['Name']}</h6>
                    <p>$ ${ itemforsale[key]['Price']} per unit</p>
                </div>
            </div>
        </div>
        <Label>Quantity</Label>
         <input type="number" id="input" class="quantity">
        <button class="addcartbtn">Add to cart</button>
    </div>`
        var productpage = document.getElementById('datatobeenter');
        productpage.innerHTML = loada + productpage.innerHTML;
    }









    $('.addcartbtn').on('click', function(event) {

        event.preventDefault();

        var quality = $(this).siblings('input[type="number"]').val();
        var quality = Number(quality);
        var price = $(this).siblings('.productcard').find('.info').find('p').text();
        var name = $(this).siblings('.productcard').find('.info').find('h6').text();
        var image = $(this).siblings('.productcard').find('img').attr('src');
        price = price.split(" ");
        price2 = Number(price[1]);
        price2 = price2 * quality;


        if (quality != 0) {

            $temp = { sname: name, sprice: price2, squality: quality, simage: image }
            $shoppingcartlist[counter] = $temp;
            console.log(quality, price2, name, $shoppingcartlist, $shoppingcartlist[counter]['squality'], image);

            var loading = `<div class="row mx-3" id="${counter}" style=" padding:10px;">
            <div class="col-sm-3 text-center py-2 list text-center">
            <img  class="cartimg" src="${$shoppingcartlist[counter]['simage']}">
        
    </div>
    <div class="col-sm-2 text-center py-2 list text-center">
            
        <h6>${ $shoppingcartlist[counter]['sname']}</h6>
    </div>
    <div class="col-sm-2 py-2 list text-center">
        <h6>${ $shoppingcartlist[counter]['squality']}</h6>
    </div>
    <div class="col-sm-2 py-2 text-center list">
        <h6>$${ $shoppingcartlist[counter]['sprice']}</h6>
    </div>
    <div class="col-sm-3 py-2 text-center list">
    <button class="removefromcart btn btn-danger" id="removefrmcart"> Remove </button>
    </div>
    </div>`
            gtotal = gtotal + price2;
            gamount = gamount + quality;
            var cartpage = document.querySelector('.ayo');
            cartpage.innerHTML = loading + cartpage.innerHTML;
            var totalamount = document.querySelector('#totalamount');
            totalamount.innerText = gamount;
            var totalprice = document.querySelector('#totalprice');
            totalprice.innerText = '$' + gtotal;
            ++counter;

        }
    });







    $('.image').mouseenter(function() {

        $(this).siblings('.info').fadeIn();

    });
    $('.productcard').mouseleave(function() {
        $(this).find('.info').fadeOut();

    });



    $('.checkoutbtn').on('click', function(event) {
        event.preventDefault();

        // for (const keys in $shoppingcartlist) {
        //     console.log($shoppingcartlist[keys]['sname']);
        //     console.log($shoppingcartlist[keys]['sprice']);
        //     console.log($shoppingcartlist[keys]['squality']);
        //     $.ajax({
        //         url: "php/populatedb.php",
        //         type: "POST",
        //         data: {
        //             name: $shoppingcartlist[keys]['sname'],
        //             quantity: $shoppingcartlist[keys]['squality'],
        //             total: $shoppingcartlist[keys]['sprice'],
        //             totalitems: counter

        //         },
        //         success: function(result) {
        //             var result = JSON.parse(result);
        //             if (result.statusCode == 100) {
        //                 alert("inserted");
        //                 alert(result.message)
        //             } else if (result.statusCode == 101) {
        //                 alert("Oops something happened");
        //                 alert(result.message);
        //             }

        //         }
        //     })
        // }
        $checkout.fadeIn('slow');
        $cartpage.fadeOut('slow');
    });








    $checkout.hide();
    $cartpage.hide();
    $cart.hide();
    $('#productsection').click(function() {
        $($content).fadeIn('slow');
        $($cartpage).fadeOut('slow');
        $($checkout).fadeOut('slow');
    });

    $('.container_cart').on('click', () => {
        $($content).fadeOut('slow');
        $($checkout).fadeOut('slow');
        $($cartpage).fadeIn('slow');
    });

    $('.container_checkout').on('click', () => {
        $($content).fadeOut('slow');
        $($checkout).fadeIn('slow');
        $($cartpage).fadeOut('slow');
    });

    // $('#signUp').on('click', () => {
    //     var tracker = 0;
    //     var txtBoxes = document.querySelectorAll('.signUpBox');
    //     for (var i = 0; i < txtBoxes.length; i++) {
    //         if (txtBoxes[i].value == "") {
    //             txtBoxes[i].style.border = "1px solid red";
    //             tracker++;
    //         } else {
    //             txtBoxes[i].style.border = "1px solid gray";
    //         }
    //     }

    //     //heck for passwords
    //     var pwd = $('#password').val();
    //     var repwd = $('#repassword');
    //     if (pwd != repwd.val()) {
    //         $('#password').css("border", "1px solid red");
    //         repwd.css("border", "1px solid red");
    //         tracker++;
    //     }

    //     if (tracker == 0) {
    //         var name = $('#fullname').val();
    //         var uname = $('#username').val();
    //         var email = $('#email').val();
    //         //alert(name+', '+uname+', '+email+', '+pwd);


    //         $.ajax({
    //             url: "php/save.php",
    //             type: "POST",
    //             data: {
    //                 name: name,
    //                 uname: uname,
    //                 email: email,
    //                 pwd: pwd
    //             },
    //             success: function(dresult) {
    //                 var dresult = JSON.parse(dresult);
    //                 alert(dresult.message);
    //                 if (dresult.statusCode == 100) {
    //                     window.location.href = "./shopping.php";

    //                     load();



    //                 } else if (dresult.statusCode == 101) {
    //                     alert("Oops something happened");
    //                 }
    //             }
    //         });
    //     }
    // });





    $('.checkoutbutton').on('click', function(e) {
        e.preventDefault();
        var tracker = 0;
        var check = document.querySelectorAll('.formclass');
        for (var i = 0; i < check.length; i++) {
            if (check[i].value == "") {
                check[i].style.border = "1px solid red";
                tracker++;
            } else {
                check[i].style.border = "1px solid gray";
            }
        }
        if (tracker == 0) {
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#emaill").val();
            var address1 = $("#address").val();
            var district1 = $("#district1 option:selected").text();
            var address2 = $("#address2").val();
            var district2 = $("#district2 option:selected").text();
            var cardname = $("#cardname").val();
            var cardnum = $("#cardnumber").val();
            var expiration = $("#expirationdate").val();
            var ccv = $("#cvv").val();
            $.ajax({
                url: "php/insertbuyer.php",
                type: "POST",
                data: {
                    fname: fname,
                    lname: lname,
                    email: email,
                    address1: address1,
                    district1: district1,

                    cardname: cardname,
                    cardnum: cardnum,

                    ccv: ccv,
                    counter: counter,
                    total: gtotal
                },
                success: function(e) {
                    var e = JSON.parse(e);

                    if (e.statusCode == 100) {
                        alert("inserted");
                        for (const keys in $shoppingcartlist) {
                            console.log($shoppingcartlist[keys]['sname']);
                            console.log($shoppingcartlist[keys]['sprice']);
                            console.log($shoppingcartlist[keys]['squality']);
                            $.ajax({
                                url: "php/populatedb.php",
                                type: "POST",
                                data: {
                                    name: $shoppingcartlist[keys]['sname'],
                                    quantity: $shoppingcartlist[keys]['squality'],
                                    total: $shoppingcartlist[keys]['sprice'],
                                    totalitems: counter

                                },
                                success: function(result) {
                                    var result = JSON.parse(result);
                                    if (result.statusCode == 100) {
                                        alert("inserted");
                                        alert(result.message)
                                    } else if (result.statusCode == 101) {
                                        alert("Oops something happened");
                                        alert(result.message);
                                    }

                                }
                            });
                        }
                        gtotal = 0;
                        gamount = 0;
                        counter = 0;


                        for (var x in $shoppingcartlist) {
                            if ($shoppingcartlist.hasOwnProperty(x)) delete $shoppingcartlist[x];
                        }
                        var cartpage = document.querySelector('.ayo');
                        cartpage = '';
                        window.location.href = "./php/invoice.php";
                    } else if (e.statusCode == 101) {
                        alert(e.message);
                    }
                }
            });







            console.log(district1, district2, fname);
        } else {
            alert("Please fill in all field");
        };
    });



});