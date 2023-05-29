<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>    
    <?php 
    // $userLoginData = $this->session->userdata('userLoginData');
    // var_dump($customerInfo[0]);
    ?>
    <?php  
    // echo("<pre>");
    // print_r(($customerCartItems));
    //error
    // https://o515678.ingest.sentry.io/api/4503925471707136/envelope/?sentry_key=faa87b9121f2449cb849f27e4d737f35&sentry_version=7 429
    ?>

<div class="container">
    <div class="h1 mt-3 mb-3 text-dark" style='text-align: center;'>
            Shopping - Bag
    </div>
    <div class="row mt-4">
        <div class="col-md-8 col-sm-12">                
            <div class="card mb-4" style="">
                <div class="card-body"> 
                    <!-- HIDDEN INPUTS STARTS-->
                    <input type='hidden' value='<?= $customerInfo[0]->user_uuid;?>' id='user_uuid' />                                           
                    <!-- END HIDDEN INPUTS  -->
                    <p class='h4' id='username' value='<?= $customerInfo[0]->user_name ?>'>Hi, <?= $customerInfo[0]->user_name ?></p>  
                    <p>Your Order Will be Delivered Here,</p>                   
                    <div class="h5 card-subtitle mb-2 text-muted">Address</div>
                    <p class="card-text">
                    <?= $customerInfo[0]->addr_house_no;?> ,
                    <?= $customerInfo[0]->addr_locality;?> ,
                    <?= $customerInfo[0]->addr_city;?> ,
                    <?= $customerInfo[0]->addr_pin_code;?>,
                    <?= $customerInfo[0]->addr_state;?>,
                    <?= $customerInfo[0]->addr_country;?>                        
                    <br>
                    Address type: <?= ($customerInfo[0]->addr_type=='1')?'Home':'Work';?>
                            <br>
                            <p class="">Phone on: +91-<?= $customerInfo[0]->receivers_phone_no;?><br>
                            <small class="text-muted">Phone no of a person who revieves parcel</small></p>
                        </p>
                        <a href="<?= base_url('edit-addr') ?>" class="card-link link-dark float-right">Edit</a>                        
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-body">
                        <p>Your Product will delivered on 5-7 days.</p>
                    </div>
                </div>

            <!-- PRODUCT CARD -->
                <div class="row">
                    <?php 
                    $total_amount_to_pay = 0;
                    $total_quantity_inCart = 0;
                    $product_arr = [];
                    // echo("<pre/>");
                    // var_dump($customerCartItems);

                    if(isset($customerCartItems)){
                        
                    foreach($customerCartItems as $cartItem):
                        $product_arr = $cartItem->product_name;
                        // print_r($product_arr);
                    ?>                    
                        <div class="col-md-6">                             
                            <div class="card h-100">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="<?= base_url('uploads/'.$cartItem->product_image); ?>" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title" id='product_name'>
                                                <?= $cartItem->product_name; ?></h5>
                                            <p class="card-text">
                                                Price:<?= ($cartItem->product_selling_price * $cartItem->item_count); ?></p>
                                            <p class="card-text" id='product_quantity'>
                                                <small class="text-muted">Item quantity: <?= $cartItem->item_count; ?>|
                                                Color:<?= $cartItem->product_color_name; ?> | Size:<?= $cartItem->product_size_name; ?>
                                            </small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <? 
                        //total price in cart/bag
                        $subtotal = (($cartItem->item_count)*($cartItem->product_selling_price));
                        $total_amount_to_pay += $subtotal;
                        $total_quantity_inCart += $cartItem->item_count;
                    endforeach; }?>                                                  
                </div>
            </div>
            
            <div class="col-4" style="margin-top:30%;">
                <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title">Order Summery</h5>
                            <!-- <p class="card-text">Rs. 899</p> -->
                            <hr>
                            <p class="card-text" id='' 
                            value="<?= ($total_amount_to_pay); ?>">Total:Rs. <?= $total_amount_to_pay; ?></p>
                            <input type="hidden" name="" id='total_amount' value='<?= ($total_amount_to_pay); ?>'>
                            
                            <button class='btn btn-dark mt-1' id="rzp-button1" value="pay" onclick="pay_now_online()" disabled>Online Payment</button>
                            <!-- captcha code for cod -->

                            <!-- <div id='show_captcha'><div>
                            <button onclick='changeCaptcha(7)'>change</button><br>
                            <input type='text' id='captcha_value' value='' name=''><br>
                            <button onclick='checkCaptcha()'>Submit</button>
                            -->

                            <!-- end captcha code for cod -->
                            <button class='btn btn-dark mt-1 float-right' id='cod' onclick="pay_now_cod()">Cash on delivery</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- sample upi and card name -->
    <!-- https://razorpay.com/docs/payments/payment-gateway/web-integration/hosted/test-integration -->
    <script>
    var show_captcha = document.getElementById('show_captcha');

    function changeCaptcha(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
        }    
    show_captcha.innerHTML = result;
    // return result;
    }

    </script>
    <!-- 
        JSon sample
    projectInfo_Json = [{"user_uuid":"988f64b4-bc4a-11ed-bb06-98460a99789a","product_uuid":"2a76760a-fa1d-11ed-990c-98460a99789a","product_name":"Red T shirt White line","product_image":"edit-646dee4959f84.jpeg","item_count":"1","product_size_name":"M","product_color_name":"Purple","product_selling_price":"2275"},{"user_uuid":"988f64b4-bc4a-11ed-bb06-98460a99789a","product_uuid":"b012fa34-ee30-11ed-9ffa-98460a99789a","product_name":"Regular Fit Rib-knit resort shirt","product_image":"w1.jpeg","item_count":"1","product_size_name":"L","product_color_name":"Blue","product_selling_price":"2849"}]
    -->
    
        <script>
            var projectInfoJSON = `<?= json_encode($customerCartItems_Json) ?>`;
            // customerCartItems is from admin_model
            var customerCartItemsJSON = `<?= json_encode($customerCartItems); ?>`;
            var totalQuantityInCart = `<?= json_encode($total_quantity_inCart); ?>`;
            var totalAmountToPay = `<?= json_encode($total_amount_to_pay); ?>`;
            // projectInfo_Json = JSON.parse(project_info);
            // // console.log(typeof(projectInfo_Json));
            // projectInfo_Json = (JSON.stringify(projectInfo_Json));            
            
            console.log('total_quantity_inCart',totalQuantityInCart);
            // console.log('==============');
            console.log('customerCartItems', customerCartItemsJSON);

            var product_name = document.getElementById('product_name');
            let product_quantity = document.getElementById('product_quantity');
            let total_amount = document.getElementById('total_amount');
            let user_uuid = document.getElementById('user_uuid');
            total_amount = Number(total_amount.value) * 100;
            
            // console.log('total_amount', (total_amount));

            //total_amount = number(total_amount) * 100
            // For new api-key
            //https://dashboard.razorpay.com/app/website-app-settings/api-keys
            // function pay_now_online(){
            //     console.log(projectInfo_Json);
            // }

            function pay_now_online(){
                //updating pending payment when payment is completed..
                var options = {
                    "key": "rzp_test_p6TTjiqWqUW7c7", 
                    "amount": total_amount,  // 100ps ie 1Rs
                    "currency": "INR",
                    "name": "Fifth Object",
                    "description": "Company description",
                    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                    // "callback_url": "http://localhost/Payment-Gateway-Razorpay/thank_you.php", //Your Thank-you page                    
                    
                    "handler": function (response){                        
                        jQuery.ajax({
                            type:'post',
                            url:'<?= base_url('eStore/EStore_Controller/onlinePayment_ajax'); ?>',
                            data:{
                                payment_id:response.razorpay_payment_id,productInfo_json:projectInfo_Json,
                                total_amount:2,
                                user_uuid:user_uuid.value
                            },            
                            success:function(data){
                                //  alert(data);
                                // window.location.href="thank_you.php"
                                window.location.href = "<?= base_url('thanks');?>";
                            }
                        })
                                console.log(response); //return obj
                                 
                                console.log(response.razorpay_payment_id);
                    }
                //handler-end                    
                //    "image": "https://example.com/your_logo",
                //    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                //  "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/", //Your Thank-you page                    
                }; //options-end

                var rzp1 = new Razorpay(options);
                //document.getElementById('rzp-button1').onclick = function(e){
                
                    rzp1.open();
                //e.preventDefault();
                //}  
//                 var rzp1 = new Razorpay(options);
//   document.getElementById('rzp-button1').onclick = function (e) {
//     rzp1.open();
//     e.preventDefault();
//   }

    }

//=======================  * PAYMENT MODE - CASH ON DELIVERY *  ==========================
    function pay_now_cod(){         
        let user_uuid = document.getElementById('user_uuid');

        let customer_order_item_list = {
            customer_user_uuid : user_uuid.value,
            total_quantity_inCart : totalQuantityInCart,
            total_amount_to_pay : totalAmountToPay,
            customer_cart_items_json : customerCartItemsJSON,
            product_info_json : projectInfoJSON
        };    
        // console.log('customer_order_item_list----',customer_order_item_list);
        $.ajax({
            url:'<?= base_url('eStore/EStore_Controller/cashOnDelivery_ajax'); ?>',
            method: 'POST',
            data: customer_order_item_list,
                success:function(data){
                        console.log('data-:', data);
                        //Redirect to thanks - page
                        //window.location.href = "</?= base_url('thanks');?>";
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