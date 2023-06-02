<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
    <div class="container-fluid">
 
        <div class="col-8 mx-auto">
    <div class="h3">update Order Return status</div>
    <hr>
    <div class="h5">Status Code</div>
<p>
0 => Order Cancel before shipped - No Refund -  COD 
<br>
1 => Order Cancel before shipping - Online Pay Done (Customer had paid for order,we need to refund)
<br>
2 => Order Cancel After shipping - collect Order at doorsteps & Refund - COD (AS customer for mode of return payment like, In Bank acct, UPI )

<br>
3 => Return & Refund After shipping - Online 
Collect order at doorsteps and refund.
a.ask for mode of return 
----- if same mode- in same mode use payment_id/transaction_id and copy it ->goto razorpay dashboard as raise refund.
------ if Bank accound, as for bank details(acct no, IFSC code ....)
------ if UPI, transfer through upi (Fastest)
<br>
4 => NO RETURN
</p>

 

    <!-- Form started -->
    <hr>
    <div>
    <!-- 1=Pending 2=Processing 3=Shipped/Dispatched 4=delivered 5=Cancelled 6=On Hold 7=Refunded -->
    <?php 
    $status = ['1' => 'Pending','2' => 'Processing' ];
    $statusKeys = array_keys($status);
    $statusValues = array_values($status);
    
  //  var_dump($status);
    
    //var_dump($selectedOrderStatus);

    

     ?>
    </div>
    
    <form action="<?= base_url('submit-order-status'); ?>" method="POST">
    <!-- <input type="hidden" name="order_uuid" value="</?= $selectedOrderStatus[0]['order_uuid']?>"> -->
    <div class="form-group">
    <label for="exampleFormControlSelect1">select current order status</label>
    <select class="form-control" id="" name='order_shipping_status'>
    <?php
    for ($i=0; $i < count($status); $i++) { 
        if($selectedOrderStatus[0]['order_shipping_status'] == $statusKeys[$i])
        {
        ?>
            <option value="<?= $selectedOrderStatus[0]['order_shipping_status']?>" selected><?= $statusValues[$i]; ?></option>              
            <?php
        }           
    }
    ?>     
    <option value="1">Pending</option>
    <option value="2">Processing</option>
    <option value="3">Shipped/Dispatched</option>
    <option value="4">Order Delivered</option>
    <option value="5">Cancelled</option>
    <option value="6">On Hold</option>
    <option value="7">Refunded</option>
    </select>
  </div>
  <button class='btn btn-primary float-right' type='submit'>update shipping status</button>
    </form>
        </div>
    </div>
</body>
</html>