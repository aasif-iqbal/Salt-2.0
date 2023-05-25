<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    // echo("<pre/>");
    if (!is_null($customer_orders_list) && isset($customer_orders_list[0])) {
      // Access the array element at the specified index
      $value = $customer_orders_list[0];
      print_r($value);
      // Rest of your code...
  } else {
      // Handle the case when the array is null or the index is invalid
      echo "The array is null or the index is invalid.";
  }

    // var_dump($customer_orders_list[0]); 
    // var_dump(isset($customer_orders_list));
    // if(isset($customer_orders_list)){
    if($customer_orders_list == NULL){
        echo("<h2>NO Order Made By you,Yet!!</h2>");
    }
  // }
    ?>

    <div class="container">
    <h4>Your Orders</h4>
    <?php 
    if(isset($customer_orders_list)){
        foreach($customer_orders_list as $list):    
    ?>
    <div class="card" style="">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="<?= base_url('uploads/').$list['product_main_image'];?>" class=" rounded-start" height='200' width='150'>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"><?= $list['product_name']; ?></h5>
        <p class="card-text">SIZE :<?= $list['product_size_name']; ?></p>
        <p class="card-text">COLOR :<?= $list['product_color_name']; ?></p>
        <p class="card-text">Payment Mode :<? if($list['payment_mode'] == '1'){echo("COD");}else{echo("Online");} ?></p>
        <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('order-cancellation/'.$list['order_uuid']); ?>" role="button">Cancel Order</a>
        <p>Show only when order is delivered</p>
        <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('order-return-refund/'.$list['order_uuid']); ?>" role="button">Return/Refund Order</a>
        <p>After 15 days</p>
        <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('/'); ?>" role="button">Buy Again</a>
        
      </div>
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">conformation code: #<?= $list['conformation_code']; ?></h5>
        <p class="card-text">Shipping Id : #<?= $list['shipping_uuid']; ?></p>
        <p class="card-text">Order Id : #<?= $list['order_uuid']; ?></p>
        <p class="card-text">Order date :<?= $list['ordered_datetime']; ?></p>        
      </div>
    </div>
  </div>
  <p class="card-text"><small class="text-muted">Cancel this order under 15days</small></p>
</div>
<?php endforeach;} ?>
    </div>
    <script>
// Get current date and time
const now = new Date();

// Calculate date and time 1 days from now
// const fiveDaysFromNow = new Date(now.getTime() + (1 * 24 * 60 * 60 * 1000));
const fiveDaysFromNow = new Date(now.getTime() + (1 * 1/12 * 60 * 60 * 1000)); //5min diff
// Disable button if current date and time is equal to or greater than 1 days from now
if (now >= fiveDaysFromNow) {
    document.getElementById("cancel_order").style.visibility = 'hidden';
}
</script>
</body>
</html>