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
        #refund_upi_id{
            display:none;
        }
        #refund_bank_acct{
            display:none;
        }
        #change_address{
            display:none;
        }
    </style>
</head>
<body>
    <div class="h3 p-3">Customer Order Cancellation</div>
    <div class="h4 p-3">Return And Refund Order(Product)</div>
    <div class="container">
    <h6>order summary</h6>
    <form action="<?= base_url('submit-order-return-refund');?>" method="POST">

    <!-- hidden inputs -->
    <input type="hidden" name="order_uuid" value="<?= $order_cancel[0]['order_uuid'];?>">
    <input type="hidden" name="product_uuid" value="<?= $cancel_order_info[0]['product_uuid'];?>">
    <input type="hidden" name="variation_uuid" 
            value="<?= $cancel_order_info[0]['variation_uuid'];?>">
    <input type="hidden" name="shipping_uuid" value="<?= $order_cancel[0]['shipping_uuid'];?>">
    <input type="hidden" name="user_uuid" value="<?= $order_cancel[0]['user_uuid'];?>">

    <input type="hidden" name="product_name" value="<?= $cancel_order_info[0]['product_name'];?>">
    <input type="hidden" name="product_size_name" value="<?= $order_cancel[0]['product_size_name'];?>">
    <input type="hidden" name="product_color_name" value="<?= $order_cancel[0]['product_color_name'];?>">
    <input type="hidden" name="product_mrp" value="<?= $order_cancel[0]['product_mrp'];?>">
    <input type="hidden" name="product_selling_price" value="<?= $order_cancel[0]['product_selling_price'];?>">
    <input type="hidden" name="product_discount" value="<?= $order_cancel[0]['discount_percentage'];?>">
    
    <input type="hidden" name="total_quantity" value="<?= $order_cancel[0]['total_quantity'];?>">
    <input type="hidden" name="payment_mode" value="<?= $order_cancel[0]['payment_mode'];?>">
    <input type="hidden" name="payment_id" value="<?= $order_cancel[0]['payment_id'];?>">
    <input type="hidden" name="order_datetime" value="<?= $order_cancel[0]['ordered_datetime'];?>">
    <input type="hidden" name="product_json" value='<?= ($order_cancel[0]['product_json']);?>'>

<!-- Ends hidden inputs -->

<div class="card" style="">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="<?= base_url('uploads/').$order_cancel[0]['product_main_image'];?>" class=" rounded-start" height='200' width='150'>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"><?= $order_cancel[0]['product_name']; ?></h5>
        <p class="card-text">SIZE :<?= $order_cancel[0]['product_size_name']; ?></p>
        <p class="card-text">COLOR :<?= $order_cancel[0]['product_color_name']; ?></p>
        <p class="card-text">QUANTITY :<?= $order_cancel[0]['total_quantity']; ?></p>
        <p class="card-text">Mode of Payment: <?php if($order_cancel[0]['payment_mode']== "1"){echo("COD");}else{echo("Online");}?></p>        
      </div>
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">conformation code: #<?= $order_cancel[0]['conformation_code']; ?></h5>
        <p class="card-text">Shipping Id : #<?= $order_cancel[0]['shipping_uuid']; ?></p>
        <p class="card-text">Order Id : #<?= $order_cancel[0]['order_uuid']; ?></p>
        <small><p class="card-text">Order date : <?= $order_cancel[0]['ordered_datetime']; ?></p></small>   
        <small><p class="card-text">Shipping date : <?= $order_cancel[0]['order_recived_datetime']; ?></p></small>   
      </div>
    </div>
  </div>  
</div>

<div class="h6 mt-2">Reason for cancellation</div>
    <div class='my-4' style="margin-left:20%;margin-right:30%;">        
        <p>Why are you returning this?</p>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="" value="Received_different_Product">
            <label class="form-check-label" for="reasonForReturn1">
                Received different Product
            </label>
            </div>
            </li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="" value="Size_Issue">
            <label class="form-check-label" for="reasonForReturn1">
                Size Issue
            </label>
            </div></li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="" value="Color_Issue">
            <label class="form-check-label" for="reasonForReturn1">
                Color Issue
            </label>
            </div></li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="other_reason">
            <label class="form-check-label" for="reasonForReturn1">
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
     
    <p>Refund Amount:<strong>&nbsp;Rs.1899</strong></p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        
        <div class="form-check">
            <input class="form-check-input" type="radio" name="refunding_mode_of_payment" id="refund_to_same_mode" value="0" checked>
            <label class="form-check-label" for="">
                Same Mode As you pay When Product is purchesed            
            </div>
             <hr>
            <!-- Refund UPI -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="refunding_mode_of_payment" id="refund_to_upi" value="1">
            <label class="form-check-label" for="">
                Refund through UPI ID
            </label><span class='float-right bg-success bg-gradient text-white pr-3 pl-3'>Faster</span>
            </div>
            <div class="mt-3 mb-3" id='refund_upi_id'>
                <input type="text" class="form-control" name="refund_payment_upi" id="" placeholder="johndeo@paytm">
            </div>
            </li>
            <li class="list-group-item">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="refunding_mode_of_payment" id="refund_to_bank" value="2">
            <label class="form-check-label" for="">
                Refund to Bank Account
            </label>
            <br>
            <p class="card-text"><small class="text-muted">Estimated refund timing: 3-5 bussiness days of receiving your return.</small></p>
            </div>
        <div id="refund_bank_acct">
            <div>
                <select class="form-select mt-2" name="refund_bank_name" aria-label="Default select example">
                    <option selected>Choose Bank</option>
                    <option value="1">SBI</option>
                    <option value="2">BANK OF INDIA</option>
                    <option value="3">ICICI</option>
                </select>            
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Account Holder Name</label>
                <input type="text" class="form-control" name="refund_acct_holder_name" id="formGroupExampleInput" placeholder="eg. Ramesh Kumar">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Account no.</label>
                <input type="text" class="form-control" name="refund_acct_num" id="refund_acct_num2" placeholder="">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Account no.</label>
                <input type="text" class="form-control" id="refund_acct_num3" placeholder="Re-Enter Account no.">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">IFSC Code</label>
                <input type="text" class="form-control" name="refund_IFSC_code" id="formGroupExampleInput2" placeholder="">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Branch Name</label>
                <input type="text" class="form-control" name="refund_branch_name" id="formGroupExampleInput2" placeholder="">
            </div>
            </li>
    </ul>
    </div>
    <hr>
    <h6>Pickup</h6>
    </div><!--form check-->
    <!-- </?php var_dump($pickup_db_datetime);?>  -->
    <div class='my-4' style="margin-left:20%;margin-right:30%;">  
          
        <p>Your package will be picked up by a courier service. Please return the item and packaging in its original condition to avoid pickup cancellation by courier service. More details..</p>
        <p>Printer not required - the carrier will bring your label.
        As we've prioritized our customers' most urgent needs, you will see longer than usual pick-up timeline.</p>
        <hr>
        <div class="h5">Pickup Date & Time</div>

        <!-- <p>Sunday, 25 Mar, 2023</p> -->
        <p><?= $future_day; ?>, <?php echo $pickup_datetime;?></p>
        
        <p>11:00 - 19:00</p>
        <input type="hidden" name="pickup_datetime" value="<?php echo($pickup_db_datetime);?>">
        <hr>
        <div class="h5">Pickup Address</div>
        <p>Jack & Jill school, Hazaribagh , Hazaribagh, Delhi - 825301</p>
        <p>Address type: Home</p>
        <p>Phone No: +91-9090908888</p>
        <!-- </ ?php var_dump($return_pickup_address[0]); ?> -->

                <!-- hidden field -->
<input type="hidden" name="return_addr_house_no_1" value="<?= $return_pickup_address[0]['addr_house_no'];?>">
<input type="hidden" name="return_addr_locality_1" value="<?= $return_pickup_address[0]['addr_locality'];?>">
<input type="hidden" name="return_addr_city_1" value="<?= $return_pickup_address[0]['addr_city'];?>">
<input type="hidden" name="return_addr_pin_code_1" value="<?= $return_pickup_address[0]['addr_pin_code'];?>">
<input type="hidden" name="return_addr_state_1" value='<?= $return_pickup_address[0]['addr_state'];?>'>
<input type="hidden" name="return_addr_country_1" value='<?= $return_pickup_address[0]['addr_country'];?>'>
<input type="hidden" name="return_addr_type_1" value='<?= $return_pickup_address[0]['addr_type'];?>'>
<input type="hidden" name="receivers_phone_no_1" value='<?= $return_pickup_address[0]['receivers_phone_no'];?>'>
        <!-- end hidden field -->
        <!-- change_address end -->


        
        <div class="form-check">
            <input class="form-check-input" type="radio" name="pickup_addr_status" id="pickup_addr_status1" value="1" checked>
            <label class="form-check-label" for="">
                same as above
            </label>            
        </div>
        <hr>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="pickup_addr_status" id="pickup_addr_status2" value="2">
            <label class="form-check-label" for="">
                change pickup address
            </label>            
        </div>
        <hr>
    <!-- <a class='link' onclick="changeAddress();"  role="button">change pickup address</a> -->

        <!-- <button type="button" id="change_pickup_addr" class="btn btn-secondary btn-sm">change pickup address</button> -->

    <div id='change_address'>
        <div class="mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Address (House no,Street)</label>
                <input type="text" class="form-control" name="return_addr_house_no" id="" placeholder="">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Locality / Town</label>
                <input type="text" class="form-control" name="return_addr_locality" id="" placeholder="">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">City / District</label>
                <input type="text" class="form-control" id="" name="return_addr_city" placeholder="">
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="formGroupExampleInput2" class="form-label">Pin Code</label>
                    <input type="text" class="form-control" id="" name="return_addr_pin_code" placeholder="">
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2" class="form-label">State</label>
                    <input type="text" class="form-control" id="" name="return_addr_state" placeholder="">
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2" class="form-label">Country</label>
                    <input type="text" class="form-control" id="" name="return_addr_country" placeholder="">
                </div>
            </div> 
            
         
            
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3  pb-1">Address Type</label>
    <div class="col-sm-9">
         <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="return_addr_type" id="inlineRadio1" value="1">
                <label class="form-check-label" for="">Home</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="return_addr_type" id="inlineRadio2" value="2">
                <label class="form-check-label" for="">Work</label>
        </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Phone no</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="receivers_phone_no">
    </div>
  </div>

</div>
        <div class="d-grid gap-2 col-6 mx-auto">
   
    <button type="submit" class="btn btn-outline-primary">CONFIRM YOUR RETURN</button>
</div>
    </div>
    </div>
    
</form>
<!-- form ends -->
    </div>
    <script>
        let other_reason = document.getElementById('other_reason'); 
        
        let refund_to_same_mode = document.getElementById('refund_to_same_mode');      
        let refund_to_upi = document.getElementById('refund_to_upi');
        let refund_to_bank = document.getElementById('refund_to_bank');

        let pickup_addr_status1 = document.getElementById('pickup_addr_status1');
        let pickup_addr_status2 = document.getElementById('pickup_addr_status2');
        
        other_reason.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('return_form').style.display = 'block';
            }
        });
        
        refund_to_same_mode.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('refund_bank_acct').style.display = 'none';
                document.getElementById('refund_upi_id').style.display = 'none';
            }
        });

        refund_to_upi.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('refund_bank_acct').style.display = 'none';
                document.getElementById('refund_upi_id').style.display = 'block';
            }
        });

        refund_to_bank.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('refund_upi_id').style.display = 'none';
                document.getElementById('refund_bank_acct').style.display = 'block';
            }
        });

        pickup_addr_status1.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                
                document.getElementById('change_address').style.display = 'none';
            }
        });

        pickup_addr_status2.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                
                document.getElementById('change_address').style.display = 'block';
            }
        });

        // change_pickup_addr.addEventListener('click', function(event){            
            function changeAddress(){
            // event.preventDefault();
            console.log('btn ck');
            const change_address = document.getElementById('change_address');
            if(change_address.style.display == 'none'||change_address.style.display == ''){
                change_address.style.display = 'block';            
            }else{
                change_address.style.display = 'none';            
            }            
        }
        // });

    </script>
</body>
</html>