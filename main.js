$(document).ready(()=>{


   
const $content =$('.test_container');
const $cart =$('.cart_container');
const $checkout =$('.checkout_container');
$content.hide();
$cart.hide();


$('.container_inventory').on('click',()=>{
$content.show();
$cart.hide();
$checkout.hide();
});
$('.container_cart').on('click',()=>{
    $content.hide();
    $cart.show();
    $checkout.hide();
    });

    $('.container_checkout').on('click',()=>{
        $content.hide();
        $cart.hide();
        $checkout.show();
        });

});
