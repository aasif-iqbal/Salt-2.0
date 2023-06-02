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
    <div class="h3">update current shipping status</div>
    <hr>
    <!-- <div class="h5">Status Code</div> -->
     

   
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
    <input type="hidden" name="order_uuid" value="<?= $selectedOrderStatus[0]['order_uuid']?>">
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