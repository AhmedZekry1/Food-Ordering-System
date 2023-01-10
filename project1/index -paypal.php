<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover">
    <title>Food Website</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
    <!-- desktop view -->
    <div class="container" id="container">
        <div id="menu">
            <div class="title">
                <img src="./images/lo.png" alt="">
            </div>
            <div class="menu-item">
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Your Orders</a>
                <a href="#">Wishlists</a>
                <a href="#">Cart</a>
                <a href="#">Contact</a>
                <a href="#">Checkout</a>
            </div>
        </div>

        <div id="food-container">
            <div id="header">
                <div class="add-box">
                    <i class="fa fa-map-marker your-address" id="add-address"> Your Address</i>
                </div>
                <div class="util">
                    <i class="fa fa-search"> Search</i>
                    <i class="fa fa-tags"> Offers</i>
                    <i class="fa fa-cart-plus" id="cart-plus"> 0 Items</i>
                </div>
            </div>
            <div id="food-items" class="d-food-items">
                <div id="biryani" class="d-biryani">
                    <p id="category-name">Biryani</p>    
                </div>

                <div id="chicken" class="d-chicken">
                    <p id="category-name">Chicken Delicious</p>    
                </div>

                <div id="paneer" class="d-paneer">
                    <p id="category-name">Paneer Mania</p>
                </div>

                <div id="vegetable" class="d-vegetable">
                    <p id="category-name">Pure Veg Dishes</p> 
                </div>

                <div id="chinese" class="d-chinese">
                    <p id="category-name">Chinese Corner</p> 
                </div>

                <div id="south-indian" class="d-south-indian">
                    <p id="category-name">South Indian</p>
                </div>
            </div>

            <div id="cart-page" class="cart-toggle">
                <p id="cart-title">Cart Items</p>
                <p id="m-total-amount">Total Amout : 100</p>
                <table>
                    <thead>
                        <td>Item</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                    </thead>
                    <tbody id="table-body">
                        
                    </tbody>
                </table>
                <div class="btn-box">
                    <button class="cart-btn">Checkout</button>
                </div>
            </div>
        </div>

        <div id="cart">
            <div class="taste-header">
                <div class="user">
                    <i class="fa fa-user-circle" id="circle"> <?php echo($_SESSION['username']); ?></i>
                    
                </div>
            </div>
            <div id="category-list">
                <p class="item-menu">Go For Hunt</p>
                <div class="border"></div>                
            </div>
            <div id="checkout" class="cart-toggle">
                <p id="total-item">Total Item : 5</p>
                <p id="total-price"></p>
				<p id="chkTotal"></p>
                <p id="delievery">Free delievery on $ 40</p>
<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AW9hqbMRMHuicl7mxUPTrkUxQJa2FKgUaH4eN8YCqY2eGBpcwfGjoVby8wmZEfgpwAo2r86D38DI22_J&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
	//import {chkTotal} from './index.js'

  //var chkTotal=10;
  var chkTotal=document.getElementById("chkTotal");
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
			total=chkTotal.innerText;
			//alert("total "+total);
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":total}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>				
				</div>
            </div>
        </div>
 

    <!-- mobile view -->
    <div id="mobile-view" class="mobile-view">
        <div class="mobile-top">
            <div class="logo-box">
                <img src="./images/foodielogo.png" alt="" id="logo">
                <i class="fa fa-map-marker your-address" id="m-add-address"> Your Address</i>
            </div>
            <div class="top-menu">
                <i class="fa fa-search"></i>
                <i class="fa fa-tag"></i>
                <i class="fa fa-heart-o"></i>
                <i class="fa fa-cart-plus" id="m-cart-plus"> 0</i>
            </div>
        </div>
        
        <div class="item-container">
            <div class="category-header" id="category-header">  
            </div>

            <div id="food-items" class="food-items">
                <div id="biryani" class="m-biryani">
                    <p id="category-name">Biryani</p>    
                </div>
                <div id="chicken" class="m-chicken">
                    <p id="category-name">Chicken Delicious</p>    
                </div>
                <div id="paneer" class="m-paneer">
                    <p id="category-name">Paneer Mania</p>
                </div>
                <div id="vegetable" class="m-vegetable">
                    <p id="category-name">Pure Veg Dishes</p> 
                </div>
                <div id="chinese" class="m-chinese">
                    <p id="category-name">Chinese Corner</p> 
                </div>
                <div id="south-indian" class="m-south-indian">
                    <p id="category-name">South Indian</p>
                </div>
            </div>            
        </div>

        <div class="mobile-footer">
            <p>Home</p>
            <p>Cart</p>
            <p>offers</p>
            <p>orders</p>
        </div>
    </div>
    <script src="./index.js" type="module"></script>
</body>
</html>
