<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/product_image/');
$proimg=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>

    <section class="product-section pt-3">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider">
                        <div class="carousel-container position-relative row ">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item  <?php echo e($key == 0 ? 'active' : ''); ?>"
                                            data-slide-number="<?php echo e($key); ?>">
                                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                                <img src="<?php echo e($imgpath . $products_image[$key]->product_images); ?>"
                                                    class="d-block w-100" alt="..."
                                                    data-remote="<?php echo e($imgpath . $products_image[$key]->product_images); ?>"
                                                    data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    class="d-block w-100" alt="..."
                                                    data-remote="<?php echo e($imgpath . $products_image[$key]->product_images); ?>"
                                                    data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Carousel Navigation -->
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="carousel-selector-<?php echo e($key); ?>"
                                                    class="thumb col-lg-4 col-sm-4 col-4 px-1 py-2 "
                                                    data-target="#myCarousel" data-slide-to="<?php echo e($key); ?>">
                                                    <?php if(!empty($products_image[$key]->product_images)): ?>
                                                        <img src="<?php echo e($imgpath. $products_image[$key]->product_images); ?>"
                                                            class="img-fluid" alt="...">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                            class="img-fluid" alt="...">
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- /row -->
                    </div> <!-- /container -->
                </div>

                <div class="col-lg-5 pl-lg-5">
                    <div class="pd-rate">
                        <?php $__currentLoopData = $product_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_key => $product_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_rating->rating_view == 'on'): ?>
                                <div class="p-rateing d-flex">
                                    <span class="static-rating static-rating-sm d-block">
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <i
                                                class="star fas fa-star <?php echo e($product_rating->ratting > $i ? 'text-primary' : ''); ?>"></i>
                                        <?php endfor; ?>
                                    </span>
                                    <p class="mb-0 ml-3"><span class="font-size-12 text-secondary"> <?php echo e($avg_rating); ?>/5
                                            (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)
                                        </span></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-rate ">
                            <?php if(Auth::guard('customers')->check()): ?>
                                <?php if(!empty($wishlist) && isset($wishlist[$products->id]['product_id'])): ?>
                                    <?php if($wishlist[$products->id]['product_id'] != $products->id): ?>
                                        <button type="button"
                                            class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                            data-id="<?php echo e($products->id); ?>">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="action-item wishlist-icon"
                                            data-id="<?php echo e($products->id); ?>" disabled>
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="button"
                                        class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                        data-id="<?php echo e($products->id); ?>">
                                        <i class="far fa-heart"></i>
                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <button type="button"
                                    class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                    data-id="<?php echo e($products->id); ?>">
                                    <i class="far fa-heart"></i>
                                </button>
                            <?php endif; ?>
                        </div>

                    </div>

                    <p class="font-size-12 mt-3 mb-2 text-secondary">Category: <?php echo e($product_categorie); ?></p>
                    <!-- Product title -->
                    <h2 class="product-title font-weight-500 text-secondary mb-0"><?php echo e($products->name); ?></h2>
                    
                    <p class="font-size-12 product-detail text-secondary">
                        <?php echo $products->detail; ?>

                    </p>

                    <div class="row">
                        <?php if($products->enable_product_variant == 'on'): ?>
                            <input type="hidden" id="product_id" value="<?php echo e($products->id); ?>">
                            <input type="hidden" id="variant_id" value="">
                            <input type="hidden" id="variant_qty" value="">
                            <div class="col-md-5">
                                <p class="mb-0">VARIATION:</p>
                                <?php $__currentLoopData = $product_variant_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="dropdown w-100">
                                        <p class="mb-0"><?php echo e($variant->variant_name); ?></p>
                                        <select name="product[<?php echo e($key); ?>]" id="pro_variants_name"
                                            class="btn btn-outline-secondary d-flex font-size-12 font-weight-400 justify-content-between px-3 rounded-0 w-100 variant-selection  pro_variants_name<?php echo e($key); ?>">
                                            <option value=""> <?php echo e(__('Select')); ?></option>
                                            <?php $__currentLoopData = $variant->variant_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($values); ?>"><?php echo e($values); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="product-price mb-4">
                        <span class="mb-0 p-price text-secondary variation_price">
                            <?php if($products->enable_product_variant == 'on'): ?>
                                <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                            <?php else: ?>
                                <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                            <?php endif; ?>
                            
                        </span>
                        <span class="mb-0 sub-price ml-4">
                            <?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?>

                            
                        </span>
                    </div>
                    <a href="#"
                        class="btn btn-block btn-primary font-size-12 py-4 rounded-0 text-underline add_to_cart"
                        data-id="<?php echo e($products->id); ?>">
                        <?php echo e(__('Add to cart')); ?>

                    </a>
                    <div class="mt-4 d-flex cart-buttons">
                        <p class="mb-0 font-size-12 text-secondary mr-5">CATEGORY: <?php echo e($product_categorie); ?></p>
                        <p class="mb-0 font-size-12 text-secondary ">SKU: <?php echo e($products->SKU); ?></p>
                    </div>
                    <?php if(!empty($products->custom_field_1) && !empty($products->custom_value_1)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_1); ?> : </span>
                                <?php echo e($products->custom_value_1); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_2) && !empty($products->custom_value_2)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_2); ?> : </span>
                                <?php echo e($products->custom_value_2); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_3) && !empty($products->custom_value_3)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_3); ?> : </span>
                                <?php echo e($products->custom_value_3); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_4) && !empty($products->custom_value_4)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_4); ?> : </span>
                                <?php echo e($products->custom_value_4); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <section class="product-details">

        <div class="container">
            <hr class="mb-0 border-secondary">
            <div class="row">
                <div class="border-right border-secondary col-md-6 pr-md-0 order-2 order-md-1">
                    <div class="customer-product-review pr-4 py-4  border-secondary">
                        <div class="review-title mb-2 mt-0">
                            <h5 class="font-weight-400 text-secondary">
                                <span class="r-title">
                                    <?php echo e($avg_rating); ?>/5
                                </span>
                                <span class="h6 font-weight-500 text-secondary">
                                    (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)
                                </span>
                            </h5>
                            <?php if(Auth::guard('customers')->check()): ?>
                            <a href="#" class="btn btn-sm btn-primary btn-icon-only rounded-circle float-right text-white" data-size="lg" data-toggle="modal" data-url="<?php echo e(route('rating',[$store->slug,$products->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Rating')); ?>">
                                <i class="fas fa-plus"></i>
                            </a>
                            <?php endif; ?>
                        </div>

                        <div class="pd-rate">
                            <div class="p-rateing d-flex">
                                <span class="static-rating static-rating-sm d-block">
                                    <?php if($store_setting->enable_rating == 'on'): ?>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = $i - 0.5;
                                                if ($avg_rating < $i && $avg_rating >= $newVal1) {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if ($avg_rating >= $newVal1) {
                                                    $color = 'text-primary';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </span>
                                <p class="mb-0 ml-3 font-size-12 text-secondary"> <?php echo e($avg_rating); ?>/5
                                    (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)</p>
                            </div>

                        </div>
                        <!-- Product title -->
                        <?php if(!empty($product_rating)): ?>
                            <p class="font-italic font-size-12 mb-0 mt-2 product-detail text-secondary">
                                <?php echo e($product_rating->description); ?>

                            </p>
                            <div class="mt-2">
                                <p class="mb-0 align-items-center d-flex mb-0 text-secondary font-size-12">
                                    <span class="avatar avatar-sm bg-secondary rounded-pill mr-3">
                                    </span>
                                    <b><?php echo e($product_rating->name); ?> :</b>
                                    <?php echo e($product_rating->title); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="col-md-6 pt-4 pl-md-5 order-1 order-md-2">

                    
                    <?php if(!empty($products->description)): ?>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" class="productdesc">
                                        <?php echo e(__('DESCRIPTION')); ?>

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <?php echo $products->description; ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->specification)): ?>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed productdesc" data-toggle="collapse" href="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <?php echo e(__('SPECIFICATION')); ?>

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body">
                                    <?php echo $products->specification; ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->detail)): ?>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed productdesc" data-toggle="collapse" href="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        <?php echo e(__('DETAILS')); ?>

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body">
                                    <?php echo $products->detail; ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
            <hr class="border-secondary mt-0">

        </div>

    </section>


    <!-- Products -->
    <section class="bestsellers-section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-4 pr-title">
                    <h4 class="font-weight-300 mt-4 text-secondary">Related Products</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 px-0 swiper-js-container">
                    <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0"
                        data-swiper-sm-items="2" data-swiper-xl-items="4" data-swiper-slidesOffsetBefore="500">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->id != $products->id): ?>
                                    <div class="col-lg-4 col-sm-6 product-box swiper-slide">
                                        <div class="border-0 card card-product rounded-0">
                                            <div
                                                class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">
                                                <span
                                                    class="badge badge-secondary font-size-12 font-weight-300 ls-1 px-4 py-3 text-uppercase rounded-0">Bestseller</span>
                                                
                                                <?php if(Auth::guard('customers')->check()): ?>
                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                            <button type="button"
                                                                class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <button type="button" class="action-item wishlist-icon"
                                                                data-id="<?php echo e($product->id); ?>" disabled>
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button type="button"
                                                            class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                            data-id="<?php echo e($product->id); ?>">
                                                            <i class="far fa-heart"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button type="button"
                                                        class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-image col-6 mx-auto pt-5 pb-4">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                    <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e($proimg. $product->is_cover); ?>"
                                                            class="img-center img-fluid">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            class="img-center img-fluid">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="card-body pt-0 text-center">
                                                <h6 class="mb-3">
                                                    
                                                    <a class="t-black13"
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                        <?php echo e($product->name); ?></a>
                                                </h6>
                                                <span class="card-price mb-4">
                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                        <?php echo e(__('In variant')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                    <?php endif; ?>
                                                </span>
                                                
                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                        class="border-0 btn btn-block btn-secondary pcart-icon py-4 rounded-0 text-underline">
                                                        <?php echo e(__('Add To Cart')); ?>


                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                        class="border-0 btn btn-block btn-secondary pcart-icon py-4 rounded-0 text-underline"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <?php echo e(__('Add To Cart')); ?>


                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <!-- Add Arrow -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#pro_variants_name', function() {
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });
            if (variants.length > 0) {

                $.ajax({
                    url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function(data) {
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme6/view.blade.php ENDPATH**/ ?>