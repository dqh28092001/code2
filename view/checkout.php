<?php 
session_start();
    $page_title = "Cart"; 
    include '../Functions/userfunctions.php';
    
    include('../Functions/authenticate.php');

    $cartItems = getCartItems();

    if (mysqli_num_rows($cartItems) == 0)
    {
        header('Location: ../../../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../../css/form.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Alertify Js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />
</head>
<body>
    
<div class="py-3 bg-light">
    <div class="container">
        <h6>
            <a class="text-dark" href="../index.php">
                Home / 
            </a>
                Check Out
        </h6>
    </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="card">
        <div class="card-body shadow">
            <form action="../Functions/placeorder.php" method="POST">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="fw-bold">Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                                <small class="text-danger name"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                                <small class="text-danger email"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" name="phone" id="phone" required placeholder="Enter your phone" class="form-control">
                                <small class="text-danger phone"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" id="pincode" required placeholder="Enter your pin code" class="form-control">
                                <small class="text-danger pincode"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address</label>
                                <textarea name="address" id="address" rows="5" required class="form-control"></textarea>
                                <small class="text-danger address"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <h6>Product</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Name</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Price</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Quantity</h6>
                            </div>
                        </div>
                        <?php 
                        $items = getCartItems();
                        $totalPrice = 0;
                        foreach ($items as $citem) {
                        ?>
                            <div class="mb-1 ">
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2 p-3">
                                            <img src="../uploads/<?= $citem['image']; ?>" alt="Image" width="80px">
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['name']; ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['selling_price']; ?>.00 $</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['prod_qty']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        $totalPrice += $citem['selling_price']*$citem['prod_qty'];
                        }
                        ?>
                        <hr>
                        <h5>Total Price : <span class="float-end"><?=$totalPrice?>.00 $</span></h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" class="btn btn-success w-100">Confirm and place order | COD</button>
                            <div id="paypal-button-container" class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>


</body>
</html>

<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AWQIbg_TWdyf6mdJp0j1EAVZ6eXTHOqZ7keVPvx-C4PXEXGjF7J1D7nXOZCjk00AMC5Ym0b7O3qxtl7m&currency=USD"></script>
  
<script>
    
    paypal.Buttons({
        onClick(){

            var name =$('#name').val();
            var email =$('#email').val();
            var phone =$('#phone').val();
            var pincode =$('#pincode').val();
            var address =$('#address').val();

            if(name.length == 0)
            {
                $('.name').text("This field is required");
            }else{
                $('.name').text("");
            }
            if(email.length == 0)
            {
                $('.email').text("This field is required");
            }else{
                $('.email').text("");
            }
            if(phone.length == 0)
            {
                $('.phone').text("This field is required");
            }else{
                $('.phone').text("");
            }
            if(pincode.length == 0)
            {
                $('.pincode').text("This field is required");
            }else{
                $('.pincode').text("");
            }
            if(address.length == 0)
            {
                $('.address').text("This field is required");
            }else{
                $('.address').text("");
            }
            if (name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0)
            {
                return false
            }
        },
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {

        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?= $totalPrice?>' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
        //   console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        var name =$('#name').val();
            var email =$('#email').val();
            var phone =$('#phone').val();
            var pincode =$('#pincode').val();
            var address =$('#address').val();

        var data = {
            'name': name,
            'email': email,
            'phone': phone,
            'pincode': pincode,
            'address': address,
            'payment_mode':"Paid by PayPal",
            'payment_id':transaction.id,
            'placeOrderBtn': true
        };

        $.ajax({
            method: "POST",
            url: "../Functions/placeorder.php",
            data: data,
            success: function (response) {
                if (response = 201) {
                    alertify.success("Order Placed Successfully");
                    // actions.redirect('my-orders.php');
                    window.location.href = 'my-orders.php';
                }
            }
        });
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>