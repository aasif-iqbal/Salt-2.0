<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fifthobject</title>
</head>
<body>
    
    <?php 
    // echo("<pre/>");
    if (!is_null($customer_orders_list) && isset($customer_orders_list)) {
      // Access the array element at the specified index
      $value = $customer_orders_list;
      // echo("<pre/>");
      // print_r($value);
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
        $total_orders = count($customer_orders_list);
        for($i=0; $i<$total_orders; $i++){
    ?>
    <div class="card" style="">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="<?= base_url('uploads/').$customer_orders_list[$i]['product_image'];?>" class=" rounded-start" height='250' width='250'>
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title"><?= $customer_orders_list[$i]['product_name']; ?></h5>
        <p class="card-text">SIZE :<?= $customer_orders_list[$i]['product_size_name']; ?></p>
        <p class="card-text">COLOR :<?= $customer_orders_list[$i]['product_color_name']; ?></p>
        <p class="card-text">Payment Mode :
          <?= $customer_orders_list[$i]['payment_method']; ?>
      </p>
        <a class="btn btn-outline-danger btn-small" id="cancel_order" 
        href="<?= base_url('order-cancellation/'.$customer_orders_list[$i]['order_uuid']); ?>" role="button">Cancel Order</a>
        <p>Show only when order is delivered</p>
        <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('order-return-refund/'.$customer_orders_list[$i]['order_uuid']); ?>" role="button">Return/Refund Order</a>
        <p>After 15 days</p>
        <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('/'); ?>" role="button">Buy Again</a>
        
      </div>
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">
          <!-- conformation code: #</?= $customer_orders_list['conformation_code']; ?> -->
        </h5>
        <p class="card-text">
          <!-- Shipping Id : #</?= $licustomer_orders_listst['shipping_uuid']; ?> -->
        </p>
        <p class="card-text">Order Id : #<?= $customer_orders_list[$i]['order_uuid']; ?></p>
    <p class="card-text">Order date :<?= $customer_orders_list[$i]['createdAt']; ?></p>        
      </div>
    </div>
  </div>
  <p class="card-text"><small class="text-muted">Cancel this order under 15days</small></p>
</div>
<?php }
} ?>
    </div>
    <script>
      /*
      bug- it will work only when window is refresh or page reload.if user will remain active or page is open, is does not able to disabled cancel button
      */ 
//self-invoke function to check current date then after 5days it will disabled-cancel order.
(function () {
  
// Get current date and time
const now = new Date();

// Calculate date and time 1 days from now
// const fiveDaysFromNow = new Date(now.getTime() + (1 * 24 * 60 * 60 * 1000));
const fiveDaysFromNow = new Date(now.getTime() + (1 * 1/12 * 60 * 60 * 1000)); //5min diff
console.log(now);
console.log(typeof(fiveDaysFromNow));
// Disable button if current date and time is equal to or greater than 1 days from now
if (now >= new Date('Tue May 30 2023 11:06:04')) {
    console.log('true')
    document.getElementById("cancel_order").style.visibility = 'hidden';
}else{
  alert('show cancel btn');
}

// ================================ Method 2 ========================================
/*
1. Fetch order_date from database- (tbl_orders)
2. Get current_date using js.
3. compare and disabled button if time expires
*/


})();


</script>
</body>
</html>