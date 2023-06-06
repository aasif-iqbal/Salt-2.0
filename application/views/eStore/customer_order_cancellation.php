<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #return_form{
            display:none;
        }
    </style>
</head>
<body>
<?php 
// echo("<pre/>");
var_dump($order_cancel[0]); 
?>

    <div class="h3 p-3">Customer Order Cancellation</div>
    <div class="h5 p-3">Order Cancellation(before Shipping) If Online Payment done, Refund(Razorpay payment_id)</div>
    <div class="container">
        <h6>order summary</h6>
    <div class="card" style="">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="<?= base_url('uploads/').$order_cancel[0]['product_image'];?>" class=" rounded-start" height='200' width='150'>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
      <div class="card-body">
        <h5 class="card-title"><?= $order_cancel[0]['product_name']; ?></h5>
        <!-- <p class="card-text">SIZE :</?= $order_cancel[0]['product_size_name']; ?></p> -->
        <!-- <p class="card-text">COLOR :</?= $order_cancel[0]['product_color_name']; ?></p> -->
        <p class="card-text">Mode of Payment: <?php if($order_cancel[0]['transaction_status']== "1"){echo("COD");}else{echo("Online");}?></p>        
      </div>
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">conformation code: #<?= $order_cancel[0]['conformation_code']; ?></h5>
        <!-- <p class="card-text">Shipping Id : #</?= $order_cancel[0]['shipping_uuid']; ?></p> -->
        <p class="card-text">Order Id : #<?= $order_cancel[0]['order_uuid']; ?></p>
        <p class="card-text">Order date :<?= $order_cancel[0]['createdAt']; ?></p>        
      </div>
    </div>
  </div>  
</div>

<div class="h6 mt-2">Reason for cancellation</div>
<form action="<?= base_url('submit-order-cancel'); ?>" method="POST">

<input type="hidden" name="order_uuid" value="<?= $order_cancel[0]['order_uuid'];?>">
<input type="hidden" name="product_uuid" value="<?= $cancel_order_info[0]['product_uuid'];?>">
<input type="hidden" name="variation_uuid" 
        value="<?= $cancel_order_info[0]['variation_uuid'];?>">
 
<input type="hidden" name="user_uuid" value="<?= $order_cancel[0]['user_uuid'];?>">

<input type="hidden" name="product_name" value="<?= $cancel_order_info[0]['product_name'];?>">
<!-- </input type="hidden" name="product_size_name" value="</?= $order_cancel[0]['product_size_name'];?>"> -->
<!-- <input type="hidden" name="product_color_name" value="</?= $order_cancel[0]['product_color_name'];?>">
<input type="hidden" name="product_mrp" value="</?= $order_cancel[0]['product_mrp'];?>">
<input type="hidden" name="product_selling_price" value="</?= $order_cancel[0]['product_selling_price'];?>">
<input type="hidden" name="product_discount" value="</?= $order_cancel[0]['discount_percentage'];?>">

<input type="hidden" name="payment_mode" value="</?= $order_cancel[0]['payment_mode'];?>">
<input type="hidden" name="payment_id" value="</?= $order_cancel[0]['payment_id'];?>">
<input type="hidden" name="order_datetime" value="</?= $order_cancel[0]['ordered_datetime'];?>">
<input type="hidden" name="product_json" value='</?= ($order_cancel[0]['product_json']);?>'> -->

<div class='col-md-4 col-lg-4 col-sm-12 my-4' style="">    
  
        <p>Why are you returning this?</p>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Change_My_Mind">
            <label class="form-check-label" for="flexRadioDefault1">
                Change My Mind
            </label>
            </div>
            </li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Order_By_mistake">
            <label class="form-check-label" for="flexRadioDefault1">
                Order By mistake
            </label>
            </div></li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Wrong_Size">
            <label class="form-check-label" for="flexRadioDefault1">
                Wrong Size
            </label>
            </div></li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="other_reason">
            <label class="form-check-label" for="flexRadioDefault1">
                Other
            </label>
            </div>
            <div class="mb-3" id='return_form'>
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div></li>
        </ul>  
    </div>
    
    <hr>
    <h6>Payment status</h6>
    <div class='my-4' style="margin-left:20%;margin-right:30%;">        
    <p>No Payment Done Yet!</p>
    <p>Payment Mode: COD</p>
    <hr>
    <p>Payment Mode: ONLINE</p>
    <p>Refund Amount:<strong>&nbsp;Rs.1899</strong></p>
    </div>
        <div class="d-grid gap-2 col-6 mx-auto">
   
  <button type="submit" class="btn btn-outline-primary">CONFIRM CANCELLATION</button>
</div>

</form>
<!-- form ends -->

    </div>
    </div>
    
    </div>
    <script>
        let other_reason = document.getElementById('other_reason');
        other_reason.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('return_form').style.display = 'block';
            }
        });
    </script>
</body>
</html>