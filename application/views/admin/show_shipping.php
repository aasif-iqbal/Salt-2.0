<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    
</head>
<body>

  <div class="h3 ml-3">Order Details</div>    
    <hr>
    <?php 
  //  echo("<pre/>");
  //  print_r(($order_details)); 
    ?>
    <div class="container-fluid">
    <div class='float-right mb-3'>

        <!-- Check this libs in header file - "assets/data-table/js/export.js" -->        
        <button type="button" class="btn btn-sm btn-outline-primary dataExport float-right" data-type="txt">Download text</button>         
         <button type="button" class="btn btn-sm btn-outline-primary dataExport float-right mx-2" data-type="csv">Download csv</button>
         <button type="button" class="btn btn-sm btn-outline-primary dataExport float-right" data-type="excel">Download xls</button>
         <!-- For pdf dom converter [PRINT] -->            
         <!-- Check application/libraries/dompdf ->pdf.php(for autoload) -->
         <!-- @Admin_controller/fetchSingleProductOrderDetails -->


      </div>
    <div class="table-responsive">
      
    <table class="table  table-bordered table-striped"  id="dataTable" style="width:100%">
  <thead>
    <tr>
      <th scope="col">S.no</th>      
      <th scope="col">Product image</th>      
      <th scope="col">Product_name</th>
      <th scope="col">Color</th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
      <th scope="col">Customer name</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Phone no</th>
      <th scope="col">Order_shipping_address</th>
      <th scope="col">Address type</th>
      <th scope="col">Total order(quantity)</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Transaction_Id</th>
      <th scope="col">transaction_status</th>
      <th scope="col">Order-datetime</th>
      <th scope="col">order_received_datetime</th>
      <th scope="col">order_shipping_status</th>
      <th scope="col">order_return_status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>    
    <?php
    if(isset($order_details)){
      $order_count = count($order_details);
      for($i=0; $i < $order_count; $i++){ ?>
      <tr>
        <th scope="row"><?= $i ?></th>        
        <td><img src="<?= base_url('').'uploads/'.$order_details[$i]['product_image']; ?>" alt="" style='height:70px;width:60px;'></td>
        <td><?= $order_details[$i]['product_name']; ?></td>
        <td><?= $order_details[$i]['product_color_name']; ?></td>
        <td><?= $order_details[$i]['product_size_name']; ?></td>
        <td>Rs.<?= $order_details[$i]['product_selling_price']; ?>/-</td>
        <td><?= $order_details[$i]['user_name']; ?></td>
        <td><?= $order_details[$i]['user_email']; ?></td>
        <td><?= $order_details[$i]['receivers_phone_no']; ?></td>
        <td>
          <?= $order_details[$i]['addr_house_no']; ?>, 
          <?= $order_details[$i]['addr_locality']; ?>,
          <?= $order_details[$i]['addr_city']; ?>,
          <?= $order_details[$i]['addr_pin_code']; ?>,
          <?= $order_details[$i]['addr_state']; ?>,
          <?= $order_details[$i]['addr_country']; ?>        
      </td>
        <td><?= $order_details[$i]['addr_type']; ?></td>
        <td><?= $order_details[$i]['total_product_quantity']; ?></td>
        <td><?= $order_details[$i]['total_amount']; ?></td>
        <td><?= $order_details[$i]['transaction_id']; ?></td>
        <td><?= $order_details[$i]['transaction_status']; ?></td>
        <td><?= $order_details[$i]['createdAt']; ?></td>
        <td><?= $order_details[$i]['order_received_datetime']; ?></td>
        <td><?= $order_details[$i]['order_shipping_status']; ?></td>
        <td><?= $order_details[$i]['order_return_status']; ?></td>
        <td>
          <a class='btn btn-outline-danger btn-sm' data-toggle="tooltip" data-placement="top" title="Print Order Info."
          href="<?= base_url('print-order/'.$order_details[$i]['order_uuid']); ?>"><i class="fa fa-print" aria-hidden="true"></i></a>  
           
        </td>
      </tr>
      <?php } }?>
        
      
      <!-- foreach($order_details as $row):
            if($row['shipping_status'] == 0){
                $value = '<p style="background:red;color:white;">Pending</p>';
            }else{
                $value = '<p style="background:green;color:white;">Shipped</p>';
            }                                   
           $array = json_decode($row['product_json'], true);
    ?> -->
    <!-- <tr>
      <th scope="row"></?= $row['shipping_id']; ?></th>
      <td></td>
      <td></?= $row['shipping_uuid']; ?></td>
      <td></?= $row['order_uuid']; ?></td>
      <td></?= $row['user_uuid']; ?></td>
      <td></?= 'User_uuid:'.$array[0]['user_uuid']; ?></td>
      <td></?= $row['payment_status']; ?></td>
      <td></?= $value; ?></td>
      <td></?= $row['conformation_code']; ?></td>
      <td></?= isset($row['shipping_address'])?$row['shipping_address']:'--'; ?></td>
      <td></?= isset($row['order_datetime'])?$row['order_datetime']:'--'; ?></td>
      <td></?= isset($row['reciver_phone_no'])?$row['reciver_phone_no']:'--'; ?></td>      
      <td><div>sdassaddsa</div><div>sdassaddsa</div><div>sdassaddsa</div><div>sdassaddsa</div></td>
      <td>
        <button type="button" class="btn btn-info">Edit</button> -->
        <!-- </a class="btn btn-info" href="</?=  base_url('status'); ?>" role="button">Edit</a>
      </td>
    </tr>
     -->
  </tbody>
</table>
</div>
</div>
<script>
  $(document).ready(function () {
    $('#dataTable').DataTable();    
  });

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>