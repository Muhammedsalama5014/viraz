<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="return_url">
    <input type="hidden" id="return_order_id">
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages();
        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    ?>
    <?php
        $coupon_price = !empty($coupon_price) ? $coupon_price : 0;
        $shipping_price = !empty($shipping_price) ? $shipping_price : 0;
    ?>
    
    <input type="hidden" id="return_url">
    <input type="hidden" id="return_order_id">

    <section class="my-cart-section pt-8">
        <div class="container">

            <!-- Shopping cart table -->
            <div class="row align-items-center">
                <div class="col-md-3 col-lg-2">
                    <h3 class="font-weight-400 m-md-0 text-primary">My Cart</h3>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="nav nav-tabs nav-fill border-0" id="nav-tab" role="tablist">
                        <div class="payment-step border border-primary row no-gutters w-100">
                            <div class="col-sm-4">
                                <a href="<?php echo e(route('store.cart', $store->slug)); ?>"
                                    class=" tab-a border-0 btn btn-block text-primary m-0 rounded-0">1 -
                                    <?php echo e(__('My Cart')); ?></a>
                            </div>
                            <div class="col-sm-4">
                                <a href="<?php echo e(route('user-address.useraddress', $store->slug)); ?>"
                                    class="border-0 tab-a btn btn-block m-0 text-primary rounded-0">2 -
                                    <?php echo e(__('Customer')); ?></a>
                            </div>
                            <div class="col-sm-4">
                                <a href="<?php echo e(route('store-payment.payment', $store->slug)); ?>"
                                    class="active-a border-0 tab-a btn btn-block m-0 text-primary rounded-0">3 -
                                    <?php echo e(__('Payment')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane tab-active" data-id="tab3">
                    <div class="row mt-5">
                        <div class="col-xl-8 col-lg-7">
                            <form>
                                <?php if($store['enable_cod'] == 'on'): ?>
                                <div class="card">
                                    <div class="box-space">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <div>
                                                    <label class="h6 mb-0 lh-180"
                                                        for="radio-payment-paypal"><?php echo e(__('COD')); ?></label>
                                                </div>
                                                <p class="text-muted mt-2 mb-0 text-12">
                                                    <?php echo e(__('Cash on delivery is a type of transaction in which payment for a good is made at the time of delivery.')); ?>

                                                </p>
                                            </div>
                                            <div class="col-12 col-lg col-md-4 text-right">
                                                
                                                <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                                    action="<?php echo e(route('user.cod', $store->slug)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="product_id">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary btn-sm payment-btn payment-btn"
                                                            id="cash_on_delivery"><?php echo e(__('Pay Now')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                                     <!-- Add money using Stripe -->
                        <?php if(isset($store_payments['is_stripe_enabled']) && $store_payments['is_stripe_enabled'] == 'on'): ?>
                        <form role="form" action="<?php echo e(route('stripe.post', $store->slug)); ?>" method="post"
                            class="require-validation" id="payment-form">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <div class="box-space">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div>
                                                <label class="h6 mb-0 lh-180"
                                                    for="radio-payment-paypal"><?php echo e(__('Stripe')); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <p class="text-muted mt-2 mb-0 text-12">
                                                <?php echo e(__('Safe money transfer using your bank account. We support Mastercard, Visa, Maestro and Skrill.')); ?>

                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 text-right">
                                            <img alt="Image placeholder"
                                                src="<?php echo e(asset('assets/theme1/img/mastercard.png')); ?>" width="40"
                                                class="mr-2">
                                            <img alt="Image placeholder"
                                                src="<?php echo e(asset('assets/theme1/img/visa.png')); ?>" width="40"
                                                class="mr-2">
                                            <img alt="Image placeholder"
                                                src="<?php echo e(asset('assets/theme1/img/skrill.png')); ?>" width="40">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="card-name-on"
                                                    class="form-control-label t-gray font-600"><?php echo e(__('Name on card')); ?></label>
                                                <input type="text" name="name" id="card-name-on"
                                                    class="form-control required" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div id="card-element"></div>
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <div class="col-md-10">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="error" style="display: none;">
                                                <div class='alert-danger alert text_sm'>
                                                    <?php echo e(__('Please correct the errors and try again.')); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-right pr-0">
                                        <div class="form-group">
                                            <input type="hidden" name="plan_id">
                                            <button class="btn btn-primary btn-sm pt-0 payment-btn" type="submit">
                                                <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>

                    <!-- Add money using PayPal -->
                    <?php if(isset($store_payments['is_paypal_enabled']) && $store_payments['is_paypal_enabled'] == 'on'): ?>
                        <div class="card">
                            <div class="box-space">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <label class="h6 mb-0 lh-180"
                                            for="radio-payment-paypal"><?php echo e('Paypal'); ?></label>
                                        <p class="text-muted mt-2 mb-0 text-12">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to PayPal to finish complete your purchase.')); ?>

                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/theme1/img/paypa.png')); ?>"
                                            width="100" class="ml-2">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('pay.with.paypal', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id">
                                            <div class="form-group mt-3">
                                                <button class="btn btn-primary btn-sm pt-0 payment-btn" type="submit">
                                                    <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Add money using whatsapp -->
                    <?php if($store['enable_whatsapp'] == 'on'): ?>
                        <div class="card">
                            <div class="box-space">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <label class="h6 mb-0 lh-180"
                                            for="radio-payment-whatsapp"><?php echo e(__('WhatsApp')); ?></label>
                                        <p class="text-muted mt-2 mb-0 text-12">
                                            <?php echo e(__('Click to chat. The click to chat feature lets customers click an URL in order to directly start a chat with another person or business via WhatsApp. ... QR code. As you know, having to add a phone number to
                                                                                            your contacts in order to start up a WhatsApp message can take a little while')); ?>.....
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-md-4 col-sm-12 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/whatsapp.png')); ?>"
                                            width="75" class="ml-2">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('user.whatsapp', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id">
                                            <div class="form-group mt-3">
                                                <button type="button" class="btn btn-primary btn-sm payment-btn"
                                                    id="owner-whatsapp"><?php echo e(__('Pay Now')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="box-space pt-0">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label
                                                class="form-control-label t-gray font-600"><?php echo e(__('Phone Number')); ?></label>
                                            <input class="form-control input-primary" name="wts_number"
                                                id="wts_number" type="text" placeholder="Enter Your Phone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Add money using Telegram -->
                    <?php if($store['enable_telegram'] == 'on'): ?>
                        <div class="card">
                            <div class="box-space">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <label class="h6 mb-0 lh-180"
                                            for="radio-payment-whatsapp"><?php echo e(__('Telegram')); ?></label>
                                        <p class="text-muted mt-2 mb-0 text-12">
                                            <?php echo e(__('Click to chat. The click to chat feature lets customers click an URL in order to directly start a chat with another person or business via WhatsApp. ... QR code. As you know, having to add a phone number to
                                                                                            your contacts in order to start up a WhatsApp message can take a little while')); ?>.....
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-md-4 col-sm-12 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/telegram.svg')); ?>"
                                            width="75" class="ml-2">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('user.telegram', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id">
                                            <div class="form-group mt-3">
                                                <button type="button" class="btn btn-primary btn-sm payment-btn"
                                                    id="owner-telegram"><?php echo e(__('Pay Now')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Add money using Bank Transfer -->
                    <?php if($store['enable_bank'] == 'on'): ?>
                        <div class="card">
                            <div class="box-space">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <label class="h6 mb-0 lh-180"><?php echo e('Bank Transfer'); ?></label>
                                        <p class="white_space text_sm"><?php echo e($store->bank_number); ?></p>
                                        <div class="col-9 p-0">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                                action="<?php echo e(route('user.bank_transfer', $store->slug)); ?>"
                                                id="bank_transfer_form">
                                                <?php echo csrf_field(); ?>
                                                <label for="bank_transfer_invoice"
                                                    class="col-form-label font-bold-700 p-0">
                                                    <div class="btn btn-primary cursor-pointer">
                                                        <?php echo e(__('Upload invoice reciept')); ?>


                                                    </div>
                                                    <input type="file" name="bank_transfer_invoice"
                                                        id="bank_transfer_invoice" class="form-control file d-none"
                                                        data-filename="invoice_logo_update">
                                                </label>
                                                <input type="hidden" name="product_id">

                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/bank.png')); ?>"
                                            width="70">
                                        <div class="form-group mt-3">
                                            <button type="button" class="btn btn-primary btn-sm payment-btn"
                                                id="bank_transfer"><?php echo e(__('Pay Now')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Add money using Paystack -->
                    <?php if(isset($store_payments['is_paystack_enabled']) && $store_payments['is_paystack_enabled'] == 'on'): ?>
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <script src="https://checkout.paystack.com/service-worker.js"></script>
                        
                        <script>
                            function payWithPaystack() {
                                var paystack_callback = "<?php echo e(url('/paystack')); ?>";
                                var order_id =
                                '<?php echo e($order_id = str_pad(!empty($order->id) ? $order->id + 1 : 0 + 1, 4, '100', STR_PAD_LEFT)); ?>';
                                var slug = '<?php echo e($store->slug); ?>';
                                var handler = PaystackPop.setup({
                                    key: '<?php echo e($store_payments['paystack_public_key']); ?>',
                                    email: '<?php echo e($cust_details['email']); ?>',
                                    amount: $('.total_price').data('value') * 100,
                                    currency: '<?php echo e($store['currency_code']); ?>',
                                    ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                                        1
                                    ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                    metadata: {
                                        custom_fields: [{
                                            display_name: "Mobile Number",
                                            variable_name: "mobile_number",
                                            value: "<?php echo e($cust_details['phone']); ?>"
                                        }]
                                    },

                                    callback: function(response) {
                                        console.log(response.reference, order_id);
                                        window.location.href = paystack_callback + '/' + slug + '/' + response.reference + '/' +
                                            <?php echo e($order_id); ?>;
                                    },
                                    onClose: function() {
                                        alert('window closed');
                                    }
                                });
                                handler.openIframe();
                            }
                        </script>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Paystack')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Paystack to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder"
                                            src="<?php echo e(asset('assets/img/paystack-logo.jpg')); ?>" width="110">
                                        <input type="hidden" name="product_id">
                                        <div class="form-group mt-3">
                                            <div class="text-sm-right ">
                                                <button class="btn btn-primary btn-sm float-right payment-btn" type="button"
                                                    onclick="payWithPaystack()">
                                                    <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_flutterwave_enabled']) && $store_payments['is_flutterwave_enabled'] == 'on'): ?>
                        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                        
                        <script>
                            function payWithRave() {
                                var API_publicKey = '<?php echo e($store_payments['flutterwave_public_key']); ?>';
                                var nowTim = "<?php echo e(date('d-m-Y-h-i-a')); ?>";
                                var order_id = '<?php echo e($order_id = time()); ?>';
                                var flutter_callback = "<?php echo e(url('/flutterwave')); ?>";
                                var x = getpaidSetup({
                                    PBFPubKey: API_publicKey,
                                    customer_email: '<?php echo e($cust_details['email']); ?>',
                                    amount: $('.total_price').data('value'),
                                    customer_phone: '<?php echo e($cust_details['phone']); ?>',
                                    currency: '<?php echo e($store['currency_code']); ?>',
                                    txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) + 'fluttpay_online-' +
                                        <?php echo e(date('Y-m-d')); ?>,
                                    meta: [{
                                        metaname: "payment_id",
                                        metavalue: "id"
                                    }],
                                    onclose: function() {},
                                    callback: function(response) {

                                        var txref = response.tx.txRef;

                                        if (
                                            response.tx.chargeResponseCode == "00" ||
                                            response.tx.chargeResponseCode == "0"
                                        ) {
                                            window.location.href = flutter_callback + '/<?php echo e($store->slug); ?>/' + txref + '/' +
                                                order_id;
                                        } else {
                                            // redirect to a failure page.
                                        }
                                        x.close(); // use this to close the modal immediately after payment.
                                    }
                                });
                            }
                        </script>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Flutterwave')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Flutterwave to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder"
                                            src="<?php echo e(asset('assets/img/flutterwave_logo.png')); ?>" width="110">
                                        <input type="hidden" name="product_id">
                                        <div class="form-group mt-3">
                                            <div class="text-sm-right ">
                                                <button class="btn btn-primary btn-sm float-right payment-btn" type="button"
                                                    onclick="payWithRave()">
                                                    <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_razorpay_enabled']) && $store_payments['is_razorpay_enabled'] == 'on'): ?>
                        <?php
                            $logo = asset(Storage::url('uploads/logo/'));
                            $company_logo = \App\Models\Utility::getValByName('company_logo');
                        ?>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        
                        <script>
                            function payRazorPay() {

                                var getAmount = $('.total_price').data('value');
                                var order_id =
                                '<?php echo e($order_id = str_pad(!empty($order->id) ? $order->id + 1 : 0 + 1, 4, '100', STR_PAD_LEFT)); ?>';
                                var product_id = '<?php echo e($order_id); ?>';
                                var useremail = '<?php echo e($cust_details['email']); ?>';
                                var razorPay_callback = '<?php echo e(url('razorpay')); ?>';
                                var totalAmount = getAmount * 100;
                                var product_array = '<?php echo e($encode_product); ?>';
                                var product = JSON.parse(product_array.replace(/&quot;/g, '"'));


                                var coupon_id = $('.hidden_coupon').attr('data_id');
                                var dicount_price = $('.dicount_price').html();

                                var options = {
                                    "key": "<?php echo e($store_payments['razorpay_public_key']); ?>", // your Razorpay Key Id
                                    "amount": totalAmount,
                                    "name": product,
                                    "currency": '<?php echo e($store['currency_code']); ?>',
                                    "description": "Order Id : " + order_id,
                                    "image": "<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>",
                                    "handler": function(response) {
                                        window.location.href = razorPay_callback + '/<?php echo e($store->slug); ?>/' + response
                                            .razorpay_payment_id + '/' + order_id;
                                    },
                                    "theme": {
                                        "color": "#528FF0"
                                    }
                                };

                                var rzp1 = new Razorpay(options);
                                rzp1.open();
                            }
                        </script>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Razorpay')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Razorpay to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/razorpay.png')); ?>"
                                            width="110">
                                        <input type="hidden" name="product_id">
                                        <div class="form-group mt-3">
                                            <div class="text-sm-right ">
                                                <button class="btn btn-primary btn-sm float-right payment-btn" type="button"
                                                    onclick="payRazorPay()">
                                                    <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_paytm_enabled']) && $store_payments['is_paytm_enabled'] == 'on'): ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Paytm')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Paytm to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/Paytm.png')); ?>"
                                            width="110">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('paytm.prepare.payments', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id"
                                                value="<?php echo e(date('Y-m-d')); ?>-<?php echo e(strtotime(date('Y-m-d H:i:s'))); ?>-payatm">
                                            <input type="hidden" name="order_id"
                                                value="<?php echo e(str_pad(!empty($order->id) ? $order->id + 1 : 0 + 1, 4, '100', STR_PAD_LEFT)); ?>">
                                            <?php
                                                $skrill_data = [
                                                    'transaction_id' => md5(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'),
                                                    'user_id' => 'user_id',
                                                    'amount' => 'amount',
                                                    'currency' => 'currency',
                                                ];
                                                session()->put('skrill_data', $skrill_data);

                                            ?>
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right payment-btn"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_mercado_enabled']) && $store_payments['is_mercado_enabled'] == 'on'): ?>
                        <script>
                            function payMercado() {

                                var product_array = '<?php echo e($encode_product); ?>';
                                var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
                                var order_id = '<?php echo e($order_id = time()); ?>';

                                var total_price = $('#Subtotal .total_price').attr('data-value');
                                var coupon_id = $('.hidden_coupon').attr('data_id');
                                var dicount_price = $('.dicount_price').html();

                                var data = {
                                    coupon_id: coupon_id,
                                    dicount_price: dicount_price,
                                    total_price: total_price,
                                    product: product,
                                    order_id: order_id,
                                }
                                $.ajax({
                                    url: '<?php echo e(route('mercadopago.prepare', $store->slug)); ?>',
                                    method: 'POST',
                                    data: data,
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(data) {
                                        if (data.status == 'success') {
                                            window.location.href = data.url;
                                        } else {
                                            show_toastr("Error", data.success, data["status"]);
                                        }
                                    }
                                });
                            }
                        </script>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Mercado Pago')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/mercadopago.png')); ?>"
                                            width="110">

                                        <div class="form-group mt-3">
                                            <div class="text-sm-right ">
                                                <button type="button" class="btn btn-primary btn-sm float-right payment-btn"
                                                    onclick="payMercado()"><?php echo e(__('Pay Now')); ?></button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_mollie_enabled']) && $store_payments['is_mollie_enabled'] == 'on'): ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Mercado Pago')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/mollie.png')); ?>"
                                            width="100">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('mollie.prepare.payments', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id"
                                                value="<?php echo e(date('Y-m-d')); ?>-<?php echo e(strtotime(date('Y-m-d H:i:s'))); ?>-payatm">
                                            <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right payment-btn"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_skrill_enabled']) && $store_payments['is_skrill_enabled'] == 'on'): ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('Skrill')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/skrill.png')); ?>"
                                            width="100">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('skrill.prepare.payments', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="transaction_id"
                                                value="<?php echo e(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'); ?>">
                                            <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right payment-btn"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_coingate_enabled']) && $store_payments['is_coingate_enabled'] == 'on'): ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('CoinGate')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/coingate.png')); ?>"
                                            width="100">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('coingate.prepare', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="transaction_id"
                                                value="<?php echo e(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'); ?>">
                                            <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right payment-btn"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(isset($store_payments['is_paymentwall_enabled']) && $store_payments['is_paymentwall_enabled'] == 'on'): ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div>
                                            <label class="h6 mb-0 lh-180"
                                                for="radio-payment-paypal"><?php echo e(__('PaymentWall')); ?></label>
                                        </div>
                                        <p class="text_sm text-muted mt-2 mb-0">
                                            <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to PaymentWall to finish complete your purchase')); ?>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4 text-right">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/Paymentwall.png')); ?>"
                                            width="100">
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            action="<?php echo e(route('paymentwall.session.store', $store->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="transaction_id"
                                                value="<?php echo e(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'); ?>">
                                            <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right payment-btn"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                                <div class="mt-2 mt-sm-4 text-center text-sm-right">
                                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>" class="text-primary">
                                        <?php echo e(__('Return to shop')); ?>

                                    </a>
                                    <a href="#" class="btn btn-primary ml-4 px-5 rounded-pill">
                                        <?php echo e(__('PROCEED TO CHECKOUT')); ?>

                                    </a>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0 col-md-7 mx-md-auto">
                            <div data-toggle="sticky" data-sticky-offset="30">
                                <div class="card shadow-none border-primary rounded-0" id="card-summary">

                                    <div class="bg-primary card-header py-3 rounded-0">
                                        <div class="row align-items-center">
                                            <h3 class="font-weight-300 mb-0 ml-3 text-white"><?php echo e(__('Summary')); ?></h3>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <?php if(!empty($products)): ?>
                                            <?php
                                                $total = 0;
                                                $sub_tax = 0;
                                                $sub_total = 0;
                                            ?>

                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($product['variant_id']) && !empty($product['variant_id'])): ?>
                                                    <div class="border-bottom border-primary m-0 py-3 row">
                                                        <div class="col-7">
                                                            <div class="media align-items-center">
                                                                <img alt="Image placeholder" class="mr-2"
                                                                    src="<?php echo e(asset($product['image'])); ?>"
                                                                    style="width: 42px;">
                                                                <div class="media-body ml-2">
                                                                    <div class="sum-title lh-100">
                                                                        <p
                                                                            class="font-size-12 font-weight-300 mb-0 text-primary">
                                                                            <?php echo e($product['product_name'] . ' - ( ' . $product['variant_name'] . ' ) '); ?>

                                                                        </p>
                                                                    </div>
                                                                    <?php
                                                                        $total_tax = 0;
                                                                    ?>
                                                                    <small class="text-muted s-dim">
                                                                        <?php echo e($product['quantity']); ?> x
                                                                        <?php echo e(\App\Models\Utility::priceFormat($product['variant_price'])); ?>

                                                                        <?php if(!empty($product['tax'])): ?>
                                                                            +
                                                                            <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                                    $total_tax += $sub_tax;
                                                                                ?>

                                                                                <?php echo e(\App\Models\Utility::priceFormat($sub_tax) . ' (' . $tax['tax_name'] . ' ' . $tax['tax'] . '%)'); ?>

                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="align-items-center col-5 d-flex justify-content-between lh-100">
                                                            <div>
                                                                <small class="text-primary"><?php echo e(__('Price')); ?></small>
                                                                <h5 class="font-weight-500 mb-0 text-primary">
                                                                    <?php
                                                                        $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                                        $subtotal = $product['variant_price'] * $product['quantity'];

                                                                        $sub_total += $subtotal;
                                                                        $final_total = $totalprice - $coupon_price +$shipping_price;
                                                                    ?>

                                                                    <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                                </h5>
                                                                <?php
                                                                    $total += $totalprice;
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="border-bottom border-primary m-0 py-3 row">
                                                        <div class="col-7">
                                                            <div class="media align-items-center">
                                                                <img alt="Image placeholder" class="mr-2"
                                                                    src="<?php echo e(asset($product['image'])); ?>"
                                                                    style="width: 42px;">
                                                                <div class="media-body ml-2">
                                                                    <div class="sum-title lh-100">
                                                                        <p
                                                                            class="font-size-12 font-weight-300 mb-0 text-primary">
                                                                            <?php echo e($product['product_name']); ?></p>
                                                                    </div>
                                                                    <?php
                                                                        $total_tax = 0;
                                                                    ?>
                                                                    <small class="text-muted s-dim">
                                                                        <?php echo e($product['quantity']); ?> x
                                                                        <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                                                        <?php if(!empty($product['tax'])): ?>
                                                                            +
                                                                            <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                                    $total_tax += $sub_tax;
                                                                                ?>

                                                                                <?php echo e(\App\Models\Utility::priceFormat($sub_tax) . ' (' . $tax['tax_name'] . ' ' . $tax['tax'] . '%)'); ?>

                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </small>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="align-items-center col-5 d-flex justify-content-between lh-100 d-block items-center">
                                                            <div>
                                                                <small class="text-primary"><?php echo e(__('Price')); ?></small>
                                                                <h5 class="font-weight-500 mb-0 text-primary">
                                                                    <?php
                                                                    $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                                    $subtotal = $product['price'] * $product['quantity'];
                                                                    $sub_total += $subtotal;
                                                                ?>

                                                                    <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                                </h5>
                                                                <?php
                                                                    $total += $totalprice;
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>

                                        <!-- Subtotal -->
                                        
                                        <div class="card-body cart-subtotal">
                                            <!-- Tax -->
                                            <div class="row mt-2 pt-2 p-2">
                                                <div class="col-7 text-right">
                                                    <small class="font-weight-bold"><?php echo e(__('Subtotal (Before Tax)')); ?>

                                                        :</small>
                                                </div>
                                                <div class="col-5 text-right">
                                                    <span
                                                        class="text-sm font-weight-bold t-black15" id="sub_total"><?php echo e(\App\Models\Utility::priceFormat(!empty($sub_total) ? $sub_total : 0)); ?></span>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row mt-2 pt-2 p-2 border-top">
                                                    <div class="col-7 text-right">
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <div class="text-limit lh-100">
                                                                    <small
                                                                        class="font-weight-bold mb-0"><?php echo e($tax); ?></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 text-right">

                                                        <span
                                                            class="text-sm font-weight-bold t-black15" id=""><?php echo e(\App\Models\Utility::priceFormat($taxArr['rate'][$k])); ?></span>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <!-- Coupon -->
                                            <div class="row mt-2 pt-2 p-2 border-top">
                                                <div class="col-7 text-right">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <div class="text-limit lh-100">
                                                                <small class="font-weight-bold mb-0"><?php echo e(__('Coupon')); ?>

                                                                    :</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5 text-right">
                                                    <span
                                                        class="text-sm font-weight-bold dicount_price">-<?php echo e(\App\Models\Utility::priceFormat($coupon_price)); ?></span>
                                                </div>
                                            </div>

                                            <!-- Shipping -->


                                            <?php if($shipping_price != 0): ?>
                                                <div class="shipping_price_add" >
                                                    <div class="row mt-2 pt-2 p-2 border-top">
                                                        <div class="col-7 text-right pt-2">
                                                            <div class="media align-items-center">
                                                                <div class="media-body">
                                                                    <div class="text-limit lh-100 text-sm">
                                                                        <?php echo e(__('Shipping Price')); ?> :</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 text-right"><span
                                                                class="text-sm font-weight-bold shipping_price"
                                                                data-value="<?php echo e($shipping_price); ?>"><?php echo e(\App\Models\Utility::priceFormat($shipping_price)); ?></span></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Final total -->
                                            <div class="row mt-2 pt-2 border-top">
                                                <input type="hidden" class="product_total" value="<?php echo e($total); ?>">
                                                <input type="hidden" class="total_pay_price"
                                                    value="<?php echo e(App\Models\Utility::priceFormat($total)); ?>">
                                                <div class="col-7 text-right">
                                                    <small class="text-uppercase font-weight-bold "><?php echo e(__('Total')); ?>

                                                        :</small>
                                                </div>
                                                <div class="col-5 text-right final_total_price">
                                                    <span class="text-sm font-weight-bold s-p-total pro_total_price"
                                                        data-original="<?php echo e(\App\Models\Utility::priceFormat(!empty($final_total) ? $final_total : 0)); ?>">
                                                        <?php echo e(\App\Models\Utility::priceFormat(!empty($final_total) ? $final_total : '0')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>










    <?php if(isset($store_payments['is_stripe_enabled']) && $store_payments['is_stripe_enabled'] == 'on'): ?>
        <script src="https://js.stripe.com/v3/"></script>
        <script type="text/javascript">
            var stripe = Stripe('<?php echo e(isset($store_payments['stripe_key']) ? $store_payments['stripe_key'] : ''); ?>');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '14px',
                    color: '#32325d',
                },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $("#card-errors").html(result.error.message);
                        show_toastr('Error', result.error.message, 'error');
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        </script>
    <?php endif; ?>
    <script>
        $(document).on('click', '#owner-whatsapp', function() {
            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';
            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();

            var data = {
                type: 'whatsapp',
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
                wts_number: $('#wts_number').val()
            }
            getWhatsappUrl(dicount_price, total_price, coupon_id, data);

            $.ajax({
                url: '<?php echo e(route('user.whatsapp', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {

                        // show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);
                        show_toastr(data["status"],data["success"], data["status"]);

                        setTimeout(function() {
                            var get_url_msg_url = $('#return_url').val();
                            var append_href = get_url_msg_url +
                                '<?php echo e(route('user.order', [$store->slug, Crypt::encrypt(!empty($order->id) ? $order->id + 1 : 0 + 1)])); ?>';
                            window.open(append_href, '_blank');
                        }, 1000);

                        setTimeout(function() {
                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);

                            window.location.href = url;
                        }, 1000);

                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }

                }
            });

        });

        $(document).on('click', '#owner-telegram', function() {
            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';
            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();


            var data = {
                type: 'telegram',
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
            }

            getWhatsappUrl(dicount_price, total_price, coupon_id, data);

            $.ajax({
                url: '<?php echo e(route('user.telegram', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {

                        // show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);
                        show_toastr(data["status"],data["success"], data["status"]);

                        setTimeout(function() {


                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);

                            window.location.href = url;
                        }, 1000);

                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        });
        $(document).on('click', '#cash_on_delivery', function() {

            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';

            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();

            var data = {
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
            }

            $.ajax({
                url: '<?php echo e(route('user.cod', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        // show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);
                        show_toastr(data["status"],data["success"], data["status"]);

                        setTimeout(function() {
                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);
                            window.location.href = url;
                        }, 1000);
                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        });
        $(document).on('click', '#bank_transfer', function() {

            var product_array = '<?php echo $encode_product; ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';
            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();
            var files = $('#bank_transfer_invoice')[0].files;

            var formData = new FormData($("#bank_transfer_form")[0]);
            formData.append('product', product_array);
            formData.append('order_id', order_id);
            formData.append('total_price', total_price);
            formData.append('coupon_id', coupon_id);
            formData.append('dicount_price', dicount_price);
            formData.append('files', files);

            $.ajax({
                url: '<?php echo e(route('user.bank_transfer', $store->slug)); ?>',
                method: 'POST',
                // data: data,
                data: formData,
                contentType: false,
                // cache: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {

                        // show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);
                        show_toastr(data["status"],data["success"], data["status"]);
                        setTimeout(function() {
                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);
                            window.location.href = url;
                        }, 1000);
                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        });
    </script>
    <script>
        // Apply Coupon
        $(document).on('click', '.apply-coupon', function(e) {
            e.preventDefault();

            var ele = $(this);
            var coupon = ele.closest('.row').find('.coupon').val();
            var hidden_field = $('.hidden_coupon').val();
            var price = $('#card-summary .product_total').val();
            var shipping_price = $('#card-summary .shipping_price').attr('data-value');

            if (coupon == hidden_field) {
                show_toastr('Error', 'Coupon Already Used', 'error');
            } else {
                if (coupon != '') {
                    $.ajax({
                        url: '<?php echo e(route('apply.productcoupon')); ?>',
                        datType: 'json',
                        data: {
                            price: price,
                            shipping_price: shipping_price,
                            store_id: <?php echo e($store->id); ?>,
                            coupon: coupon
                        },
                        success: function(data) {
                            $('#stripe_coupon, #paypal_coupon').val(coupon);
                            if (data.is_success) {
                                $('.hidden_coupon').val(coupon);
                                $('.hidden_coupon').attr(data);

                                $('.dicount_price').html(data.discount_price);

                                var html = '';
                                html +=
                                    '<span class="text-sm font-weight-bold total_price" data-value="' +
                                    data.final_price_data_value + '">' + data.final_price + '</span>'
                                $('.final_total_price').html(html);


                                // $('.coupon-tr').show().find('.coupon-price').text(data.discount_price);
                                // $('.final-price').text(data.final_price);
                                show_toastr('Success', data.message, 'success');
                            } else {
                                // $('.coupon-tr').hide().find('.coupon-price').text('');
                                // $('.final-price').text(data.final_price);
                                show_toastr('Error', data.message, 'error');
                            }
                        }
                    })
                } else {
                    show_toastr('Error', '<?php echo e(__('Invalid Coupon Code.')); ?>', 'error');
                }
            }

        });

        //for create/get Whatsapp Url
        function getWhatsappUrl(coupon = '', finalprice = '', coupon_id = '', data = '') {
            $.ajax({
                url: '<?php echo e(route('get.whatsappurl', $store->slug)); ?>',
                method: 'post',
                data: {
                    dicount_price: coupon,
                    finalprice: finalprice,
                    coupon_id: coupon_id,
                    data: data
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#return_url').val(data.url);
                        $('#return_order_id').val(data.order_id);

                    } else {
                        $('#return_url').val('')
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        }

        //for create/get Telegram Url
        function getTelegramUrl(coupon = '', finalprice = '', coupon_id = '', data = '') {
            $.ajax({
                url: '<?php echo e(route('get.whatsappurl', $store->slug)); ?>',
                method: 'post',
                data: {
                    dicount_price: coupon,
                    finalprice: finalprice,
                    coupon_id: coupon_id,
                    data: data
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#return_url').val(data.url);
                        $('#return_order_id').val(data.order_id);

                    } else {
                        $('#return_url').val('')
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        }
        // function removecartsession(slug) {
        //     $.ajax({
        //         url: '<?php echo e(route('remove.session', $store->slug)); ?>?cart=yes',
        //         method: 'get',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(data) {

        //         }
        //     });
        // }


        function removesession(slug) {
            $.ajax({
                url: '<?php echo e(route('remove.session', $store->slug)); ?>',
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                }
            });
        }
    </script>
        <script>

            $(document).ready(function() {

                setTimeout(function() {
                    var shipping_id =
                            '<?php echo e(isset($cust_details['shipping_id']) ? $cust_details['shipping_id'] : ''); ?>';
                    getTotal(shipping_id);
                }, 200);
            });

                function getTotal(shipping_id) {
                    var pro_total_price = $('.pro_total_price').attr('data-original');
                    if (shipping_id == undefined) {
                        $('.shipping_price_add').hide();
                        return false
                    } else {
                        $('.shipping_price_add').show();
                    }

                    $.ajax({
                        url: '<?php echo e(route('user.shipping', [$store->slug, '_shipping'])); ?>'.replace('_shipping', shipping_id),
                        data: {
                            "pro_total_price": pro_total_price,
                            "_token": "<?php echo e(csrf_token()); ?>",
                        },
                        method: 'POST',
                        context: this,
                        dataType: 'json',

                        success: function(data) {
                            var price = data.price + pro_total_price;
                            $('.shipping_price').html(data.price);
                            $('.shipping_price').attr('data-value', data.price);
                            $('.pro_total_price').html(data.total_price);
                        }
                    });
                }
        </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme9', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme9/payment.blade.php ENDPATH**/ ?>