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

    <section class="product-section pt-7">
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
                                                    data-remote="<?php echo e($imgpath. $products_image[$key]->product_images); ?>"
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
                    <p class="font-size-12 mt-3 mb-2 text-primary">Category: <?php echo e($product_categorie); ?></p>
                    <!-- Product title -->
                    <h2 class="product-title font-weight-500 text-primary mb-0"><?php echo e($products->name); ?></h2>
                    
                    <p class="font-size-12 product-detail text-primary">
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
                        <p class="mb-0 font-size-12 text-primary mr-5">CATEGORY: <?php echo e($product_categorie); ?></p>
                        <p class="mb-0 font-size-12 text-primary ">SKU: <?php echo e($products->SKU); ?></p>
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
            <hr class="mb-0 border-primary">
            <div class="row">
                <div class="border-right border-primary col-md-6 pr-md-0 order-2 order-md-1">
                    <div class="customer-product-review pr-4 py-4  border-primary">
                        <div class="review-title mb-2 mt-0">
                            <h5 class="font-weight-400 text-primary">
                                <span class="r-title">
                                    <?php echo e($avg_rating); ?>/5
                                </span>
                                <span class="h6 font-weight-500 text-primary">
                                    (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)
                                </span>
                            </h5>
                            <?php if(Auth::guard('customers')->check()): ?>
                                <a href="#"
                                    class="btn btn-sm btn-primary btn-icon-only rounded-circle float-right text-white"
                                    data-size="lg" data-toggle="modal"
                                    data-url="<?php echo e(route('rating', [$store->slug, $products->id])); ?>"
                                    data-ajax-popup="true" data-title="<?php echo e(__('Create New Rating')); ?>">
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
                                <p class="mb-0 ml-3 font-size-12 text-primary"> <?php echo e($avg_rating); ?>/5
                                    (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)</p>
                            </div>

                        </div>
                        <!-- Product title -->
                        <?php if(!empty($product_rating)): ?>
                            <p class="font-italic font-size-12 mb-0 mt-2 product-detail text-primary">
                                <?php echo e($product_rating->description); ?>

                            </p>
                            <div class="mt-2">
                                <p class="mb-0 align-items-center d-flex mb-0 text-primary font-size-12">
                                    <span class="avatar avatar-sm bg-primary rounded-pill mr-3">
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
            <hr class="border-primary mt-0">

        </div>

    </section>


    <!-- Products -->
    <section class="bestsellers-section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-4 pr-title">
                    <h4 class="font-weight-300 mt-4 text-primary"><?php echo e(__('Related Products')); ?></h4>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 px-0 swiper-js-container">
                    <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0"
                        data-swiper-sm-items="2" data-swiper-xl-items="4" data-swiper-slidesOffsetBefore="500">
                        <div class="swiper-wrapper tab-content d-flex">
                            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->id != $products->id): ?>
                                    <div class="col-lg-3 col-sm-6 col-md-4 product-box swiper-slide">
                                        <div class="border-0 card card-product rounded-lg">
                                            <div
                                                class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">

                                                <?php if(Auth::guard('customers')->check()): ?>
                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart text-white"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100 "
                                                                data-id="<?php echo e($product->id); ?>" disabled>
                                                                <i class="far fa-heart text-white"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button data-toggle="tooltip" data-original-title="Wishlist"
                                                            type="button"
                                                            class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                            data-id="<?php echo e($product->id); ?>">
                                                            <i class="far fa-heart text-white"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button data-toggle="tooltip" data-original-title="Wishlist"
                                                        type="button"
                                                        class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart text-white"></i>
                                                    </button>
                                                <?php endif; ?>

                                            </div>
                                            <div class="card-image col-9 mx-auto pt-4 pb-4">

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
                                            <div class="card-body pt-0 pb-4 px-4 px-md-3 px-lg-4">
                                                <h6>
                                                    <a class="font-weight-300 text-primary"
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                        <span class="font-weight-600">
                                                            <?php echo e($product->name); ?>

                                                        </span>
                                                    </a>
                                                </h6>
                                                <div class="mb-3">
                                                    <span class="font-size-12 font-weight-600 text-primary">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            class="mr-1">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.6846 1.54449C6.14218 0.144023 8.10781 0.144027 8.5654 1.54449L9.38429 4.05075C9.41301 4.13865 9.4936 4.19876 9.5854 4.20075L12.1696 4.25677C13.5864 4.28749 14.191 6.08576 13.0846 6.97816L10.9486 8.70091C10.8804 8.75594 10.8516 8.84689 10.8757 8.93155L11.6348 11.6008C12.0332 13.0019 10.4448 14.1165 9.27925 13.2537L7.25325 11.7538C7.17694 11.6973 7.07306 11.6973 6.99675 11.7538L4.97074 13.2537C3.80522 14.1165 2.21676 13.0019 2.61521 11.6008L3.37428 8.93155C3.39835 8.84689 3.36961 8.75594 3.30138 8.70091L1.16544 6.97816C0.0590049 6.08576 0.663576 4.28749 2.08036 4.25677L4.6646 4.20075C4.7564 4.19876 4.83699 4.13865 4.86571 4.05075L5.6846 1.54449ZM7.33077 1.95425C7.2654 1.75419 6.9846 1.75419 6.91923 1.95425L6.10034 4.46051C5.89929 5.07584 5.33518 5.49658 4.69255 5.51051L2.10831 5.56653C1.90592 5.57092 1.81955 5.82782 1.97761 5.9553L4.11356 7.67806C4.59113 8.06325 4.79234 8.69988 4.62381 9.2925L3.86474 11.9617C3.80782 12.1619 4.03475 12.3211 4.20125 12.1978L6.22726 10.698C6.76144 10.3025 7.48855 10.3025 8.02274 10.698L10.0487 12.1978C10.2153 12.3211 10.4422 12.1619 10.3853 11.9617L9.62618 9.2925C9.45765 8.69988 9.65887 8.06324 10.1364 7.67806L12.2724 5.9553C12.4305 5.82782 12.3441 5.57092 12.1417 5.56653L9.55745 5.51051C8.91482 5.49658 8.35071 5.07584 8.14966 4.46051L7.33077 1.95425Z"
                                                                fill="#8A8A8A" />
                                                        </svg>
                                                        <?php echo e($product->product_rating()); ?> /
                                                        <?php echo e(__('5.0')); ?>

                                                    </span>
                                                    <span class="text-primary mx-1">•</span>
                                                    <span class="font-size-12  text-primary">
                                                        <b class="font-weight-600 text-lg text-primary">
                                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                                <?php echo e(__('In variant')); ?>

                                                            <?php else: ?>
                                                                <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                            <?php endif; ?>

                                                        </b>
                                                    </span>
                                                    <span class="font-weight-600 text-lg text-primary sub-price">
                                                        <?php if($product->enable_product_variant == 'off'): ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                                

                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                        class="border-0 btn btn-block btn-secondary  rounded-pill">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)"
                                                        class="border-0 btn btn-block btn-secondary  rounded-pill add_to_cart"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <?php echo e(__('ADD TO CART')); ?>

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

<?php echo $__env->make('storefront.layout.theme9', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme9/view.blade.php ENDPATH**/ ?>