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
    <div class="h5">Status Code</div>

    <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        Pending
        The initial status when an order is placed and awaiting further processing.
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>


</div>
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