<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fifthobject</title>
    <style>
      #card_id {
        max-width: 33em;
        flex-direction: row;
        /* background-color: #696969; */
        border: 0;
        box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
        margin: 3em auto;
      }
      #card_id.dark {
        color: #fff;
      }
      #card_id#card_id.bg-light-subtle .card-title {
        color: dimgrey;
      }
      #card_id img {
        max-width: 35%;
        /* margin: auto; */
        padding: 0.2em;
        border-radius: 0.7em;
      }
      #card-body-id {
        display: flex;
        justify-content: space-between;
      }
      #text-section-id {
        max-width: 100%;
      }
      .cta-section {
        max-width: 40%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-between;
      }
      .cta-section #btn-placeholder {
        padding: 0.3em 0.5em;
        /* color: #696969; */
      }
      #card_id.bg-light-subtle .cta-section #btn-placeholder {
        /* background-color: #898989; */
        /* border-color: #898989; */
      }
      @media screen and (max-width: 475px) {
      #card_id {
          font-size: 0.9em;
        }
      }
      #return_available{
          font-size:12px;    
      }
      .product-attribute{
          /* font-size:12px;  */
      }
       
      #return_form{
        display:none;
      }
    </style>
</head>
<body>
<?php 
// echo("<pre/>");
// var_dump($product_info_json[0]['productInfo_json']);
$createdAt = strtotime($order_cancel[0]['createdAt']);
$createdAt = date("d F Y", $createdAt);
?>
<!-- <div class="h5 p-3">Order Cancellation(before Shipping) 
  If Online Payment done, Refund(Razorpay payment_id)</div> -->
<div class="container">
  <div class="mx-auto col-md-6">
    <div class="h3 mt-3">Customer Order Cancellation</div>
    <h6>order summary</h6>
      <!-- PRODUCT CARD -->        
      <div class="card bg-light-subtle mt-4" id="card_id">
        <img src="<?= base_url('uploads/'.$order_cancel[0]['product_image']); ?>" class="card-img-top">
        <div class="card-body" id="card-body-id">
        <div class="text-section" id="text-section-id">          
        <span class="fw-bold"><?= $order_cancel[0]['product_name']; ?></span><br/>
        <span class="card-text product-attribute">Color: blue</span>&nbsp;|&nbsp;
        <span class="card-text product-attribute">Size: M</span><br/>
        <span class="card-text product-attribute">Qty: 2</span><br/>
        <span class="card-text product-attribute">Rs. 2334</span><br/>
        <span class="card-text product-attribute">Payment mode:<?= $order_cancel[0]['payment_method']?></span><br/>        
      </div>           
      </div>    
    </div>                                                                              
    <!-- Product card ends -->  
<hr>
    <!-- customer order status -->
  <div class="mt-3 ml-3">
    <h6>Order status</h6>
      <span class="fw-bold text-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>
      <span class="card-text product-attribute border-bottom">Arrived By 19 Jun, Mon</span><br/>
<!-- <p class="card-text">Order Id : #</?= $order_cancel[0]['order_uuid']; ?></p> -->
      <p class="card-text">Order at :&nbsp;<?= $createdAt; ?></p>        
  </div>
<hr>  
  <!-- customer Payment status -->
  <div class="mt-3 ml-3">
    <h6>Payment status</h6>
       <?php if($order_cancel[0]['payment_method'] == 'COD'){ ?>
        <p>No Payment Done Yet!</p>
        <p>Payment Mode: COD</p>
       <?php } else { ?>    
        <p>Payment Mode: ONLINE</p>
        <p>Refund Amount:<strong>&nbsp;<?= $order_cancel[0]['product_selling_price']; ?></strong></p>
    <?php } ?>
  </div>

  <hr>

  <div class="h6 mt-2">Reason for cancellation</div>
    <form action="<?= base_url('submit-order-cancel'); ?>" method="POST">

    <input type="hidden" name="order_uuid" value="<?= $order_cancel[0]['order_uuid'];?>">
    <input type="hidden" name="product_uuid" value="<?= $cancel_order_info[0]['product_uuid'];?>">
    <input type="hidden" name="variation_uuid" 
          value="<?= $cancel_order_info[0]['variation_uuid'];?>">
  
  <input type="hidden" name="user_uuid" value="<?= $order_cancel[0]['user_uuid'];?>">

  <input type="hidden" name="product_name" value="<?= $cancel_order_info[0]['product_name'];?>">

<div class=''>      
  <p> &#129300; &nbsp;Why are you returning this?</p>
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
          </div>
        </li>
        <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Wrong_Size">
            <label class="form-check-label" for="flexRadioDefault1">
                Wrong Size
            </label>
            </div>
        </li>
        <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="other" id="other_reason">
            <label class="form-check-label" for="flexRadioDefault1">
                Other
            </label>
            </div>
            <div class="mb-3" id='return_form'>
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="other_textarea" rows="3"></textarea>
            </div>
        </li>
    </ul>  
</div>
    
<div class="">   
  <button type="button" onclick="submit_cancellation_form()" class="btn btn-outline-primary">CONFIRM CANCELLATION</button>
</div>

</form>
<!-- form ends -->
</div>
</div>
</div>    
</div>
<script>
  // Below code will Open textarea when 'other' radio btn clicked
    let other_reason = document.getElementById('other_reason');
    other_reason.addEventListener('click', function(event){
        if (event.target && event.target.matches("input[type='radio']")) {
            document.getElementById('return_form').style.display = 'block';
        }
    });

function submit_cancellation_form()
{  
  let order_cancellation_detials = `<?= json_encode($order_cancel[0]); ?>`;
  let product_info_json = `<?= json_encode($product_info_json[0]['productInfo_json']); ?>`;
  console.log('product_info_json::',product_info_json);

  let radioButtons = document.getElementsByName('flexRadioDefault');
  var selectedValue = "";

  for (var i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      selectedValue = radioButtons[i].value;
      break;
    }
  }

  if(selectedValue == 'other'){
    let other_textarea = document.getElementById('other_textarea');
    // console.log("other_textarea::", other_textarea.value);  
  }

  // console.log(selectedValue);
      
  let customer_order_cancellation = {
            selectedValue: selectedValue,
            other_textarea: other_textarea.value,
            order_cancellation_detials: JSON.parse(order_cancellation_detials),
            product_info_json: product_info_json
        };    
        // console.log('customer_order_item_list----',customer_order_item_list);
        
        $.ajax({
            url:'<?= base_url('eStore/EStore_Controller/submitCancelledOrder_ajax'); ?>',
            method: 'POST',
            data: customer_order_cancellation,
            success:function(data){
                    console.log('data-:', data);
                    //refresh                        
                },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
              }
            });            
}
</script>
</body>
</html>



<!-- </input type="hidden" name="product_size_name" value="</?= $order_cancel[0]['product_size_name'];?>"> -->
<!-- <input type="hidden" name="product_color_name" value="</?= $order_cancel[0]['product_color_name'];?>">
<input type="hidden" name="product_mrp" value="</?= $order_cancel[0]['product_mrp'];?>">
<input type="hidden" name="product_selling_price" value="</?= $order_cancel[0]['product_selling_price'];?>">
<input type="hidden" name="product_discount" value="</?= $order_cancel[0]['discount_percentage'];?>">

<input type="hidden" name="payment_mode" value="</?= $order_cancel[0]['payment_mode'];?>">
<input type="hidden" name="payment_id" value="</?= $order_cancel[0]['payment_id'];?>">
<input type="hidden" name="order_datetime" value="</?= $order_cancel[0]['ordered_datetime'];?>">
<input type="hidden" name="product_json" value='</?= ($order_cancel[0]['product_json']);?>'> -->