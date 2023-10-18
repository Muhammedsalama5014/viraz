<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/product_image/');
$proimg=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Product Details -->
    <div class="container product-section pt-3">
        <div class="row mt-7">
            <div class="row row-grid">
                <div class="breadcrumb-section">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('store.slug',$store->slug)); ?>"><?php echo e(__('Main site')); ?></a></li>
                        <li class="breadcrumb-item active m-0" aria-current="page"><?php echo e($products->name); ?></li>
                    </ul>
                </div>
            </div>
            <div class="row row-grid">
                <div class="col-lg-6">
                    <div class="container product-slider">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item <?php echo e(($key == 0)?'active':''); ?>">
                                        <?php if(!empty($products_image[$key]->product_images) && \Storage::exists('uploads/product_image/'.$products_image[$key]->product_images)): ?>
                                            <img src="<?php echo e($imgpath.$products_image[$key]->product_images); ?>" class="d-block w-100" alt="..." data-remote="<?php echo e($imgpath.$products_image[$key]->product_images); ?>" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo e(__('Previous')); ?></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo e(__('Next')); ?></span>
                            </a>
                        </div>

                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <div class="col-lg-6">
                    <!-- Product title -->
                    <h5 class="h4 store-title"><?php echo e($products->name); ?></h5>
                    <div class="pd-rate">
                        <div class="p-rateing  d-flex">
                            <?php if($store_setting->enable_rating == 'on'): ?>
                                <span class="static-rating static-rating-sm d-block">
                                    <?php for($i =1;$i<=5;$i++): ?>
                                        <?php
                                            $icon = 'fa-star';
                                            $color = '';
                                            $newVal1 = ($i-0.5);
                                            if($avg_rating < $i && $avg_rating >= $newVal1)
                                            {
                                                $icon = 'fa-star-half-alt';
                                            }
                                            if($avg_rating >= $newVal1)
                                            {
                                                $color = 'text-primary';
                                            }
                                        ?>
                                        <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                    <?php endfor; ?>
                                </span>
                                <p class="mb-0 ml-3"><span class="t-gray"><?php echo e($avg_rating); ?>/5 (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>) </span></p>
                            <?php endif; ?>
                        </div>
                        <div class="p-rate">
                        <?php if(Auth::guard('customers')->check()): ?>
                            <?php if(!empty($wishlist) && isset($wishlist[$products->id]['product_id'])): ?>
                                <?php if($wishlist[$products->id]['product_id'] != $products->id): ?>
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($products->id); ?>" data-id="<?php echo e($products->id); ?>">
                                        <i class="far fa-heart"></i>
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($products->id); ?>" disabled>
                                        <i class="fas fa-heart"></i>
                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($products->id); ?>" data-id="<?php echo e($products->id); ?>">
                                    <i class="far fa-heart"></i>
                                </button>
                            <?php endif; ?>
                        <?php else: ?>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($products->id); ?>" data-id="<?php echo e($products->id); ?>">
                                    <i class="far fa-heart"></i>
                            </button>
                        <?php endif; ?>
                        </div>
                    </div>
                    <p class="text-sm mb-0 product-detail"><?php echo $products->detail; ?></p>
                    <?php if($products->enable_product_variant =='on'): ?>
                        <input type="hidden" id="product_id" value="<?php echo e($products->id); ?>">
                        <input type="hidden" id="variant_id" value="">
                        <input type="hidden" id="variant_qty" value="">
                        <div class="p-color mt-3">
                            <p class="mb-0">VARIATION:</p>
                            <?php $__currentLoopData = $product_variant_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 mb-4 mb-sm-0">
                                    <p class="d-block h6 mb-0">
                                    <p class="mb-0"><?php echo e($variant->variant_name); ?></p>
                                    <select name="product[<?php echo e($key); ?>]" id="pro_variants_name" class="form-control custom-select variant-selection  pro_variants_name<?php echo e($key); ?>">
                                        <option value=""><?php echo e(__('Select')); ?></option>
                                        <?php $__currentLoopData = $variant->variant_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($values); ?>"><?php echo e($values); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="product-price">
                        <span class="h3 mb-0 p-price variation_price">
                             <?php if($products->enable_product_variant =='on'): ?>
                                <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                            <?php else: ?>
                                <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                            <?php endif; ?>
                        </span>
                        <sup class="h3 mb-0 sub-price"><?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?></sup>
                    </div>
                    <div class="cart-buttons">
                        <a href="#" class="btn btn-primary rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3 add_to_cart" data-id="<?php echo e($products->id); ?>">
                            <span class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                            <span class="btn-inner--icon">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                        </a>
                    </div>
                    <div class="cat-id d-flex">
                        <p class="mb-0 t-black14 f-14"><span class="t-l-gray"><?php echo e(__('Category')); ?>:</span> <?php echo e($products->product_category()); ?></p>
                        <p class="mb-0 t-black14 ml-4 f-14"><span class="t-l-gray"><?php echo e(__('ID')); ?>: </span> <?php echo e($products->SKU); ?></p>
                    </div>
                    <?php if(!empty($products->custom_field_1) && !empty($products->custom_value_1)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_1); ?> : </span> <?php echo e($products->custom_value_1); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_2) && !empty($products->custom_value_2)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_2); ?> : </span> <?php echo e($products->custom_value_2); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_3) && !empty($products->custom_value_3)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_3); ?> : </span> <?php echo e($products->custom_value_3); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_4) && !empty($products->custom_value_4)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_4); ?> : </span> <?php echo e($products->custom_value_4); ?></div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>


    <section class="product-section bg-body pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <?php if(!empty($products_image[$key]->product_images) && \Storage::exists('uploads/product_image/'.$products_image[$key]->product_images)): ?>
                                    <img src="<?php echo e($imgpath.$products_image[$key]->product_images); ?>" class="d-block w-100">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" class="d-block w-100">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="store-tabs" id="accordion" role="tablist">
                        <?php if(!empty($products->description)): ?>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            <?php echo e(__('DESCRIPTION')); ?>

                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <p class="t-black">
                                            <?php echo $products->description; ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($products->specification)): ?>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
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
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree"
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
                    <?php if(!empty($products->attachment)): ?>
                        <div class="button">
                            <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$products->attachment))); ?>" class="text-primary btn-instruction" download="<?php echo e($products->attachment); ?>">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-shopping-basket"></i>
                                </span>
                                <?php echo e(__('Download instruction .pdf')); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="customer-product-review">
                        <div class="review-title">
                            <h5>
                                <span class="r-title"><?php echo e(__('Reviews')); ?>:</span>
                                <span class="r-rate"><?php echo e($avg_rating); ?>/5</span>
                                <span class="t-gray"> (<?php echo e(__('reviews')); ?>)</span>
                            </h5>
                            <div class="p-rateing  d-flex">
                                <span class="static-rating static-rating-sm d-block mr-2 padtop">
                                <?php if($store_setting->enable_rating == 'on'): ?>
                                        <?php for($i =1;$i<=5;$i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = ($i-0.5);
                                                if($avg_rating < $i && $avg_rating >= $newVal1)
                                                {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if($avg_rating >= $newVal1)
                                                {
                                                    $color = 'text-primary';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </span>
                                <?php if(Auth::guard('customers')->check()): ?>
                                    <a href="#" class="btn btn-sm btn-primary btn-icon-only rounded-circle float-right text-white" data-size="lg" data-toggle="modal" data-url="<?php echo e(route('rating',[$store->slug,$products->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Rating')); ?>">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $__currentLoopData = $product_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_key => $product_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_rating->rating_view == 'on'): ?>
                                <div class="p-rateing  d-flex">
                                        <span class="static-rating static-rating-sm d-block">
                                            <?php for($i =0;$i<5;$i++): ?>
                                                <i class="star fas fa-star <?php echo e(($product_rating->ratting > $i  ? 'text-primary' : '')); ?>"></i>
                                            <?php endfor; ?>
                                        </span>
                                    <p class="mb-0 ml-3"><span class="t-gray"><?php echo e($avg_rating); ?>/5 (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>) </span></p>
                                </div>
                                <p class="text-sm mb-0 mt-2 product-detail"><?php echo e($product_rating->description); ?></p>
                                <div class="mt-2">
                                    <p class="mb-0 t-black13 s-title"><?php echo e($product_rating->name); ?></p>
                                    <span class="s-title"><?php echo e($product_rating->title); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Products -->
    <section class="top-product">
        <div class="container">
            <div class="row">
                <div class="pr-title">
                    <h3 class=" mt-4 store-title-medium text-primary"><?php echo e(__('Related products')); ?></h3>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product->id != $products->id): ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                            <div class="card card-product">
                                <div class="card-image">
                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                            <img alt="Image placeholder" src="<?php echo e($proimg.$product->is_cover); ?>" class="img-center img-fluid" style="width:auto; height:221px;">
                                        <?php else: ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid" style="width:auto; height:221px;">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                <span class="static-rating static-rating-sm">
                                    <?php if($store->enable_rating == 'on'): ?>
                                        <?php for($i =1;$i<=5;$i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = ($i-0.5);
                                                if($product->product_rating() < $i && $product->product_rating() >= $newVal1)
                                                {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if($product->product_rating() >= $newVal1)
                                                {
                                                    $color = 'text-primary';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </span>
                                    <h6><a class="t-black13" href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>"> <?php echo e($product->name); ?></a></h6>
                                    <p class="text-sm">
                                        <span class="td-gray"><?php echo e(__('Category')); ?> &nbsp; : </span> <?php echo e($product->product_category()); ?>

                                    </p>
                                </div>
                                <div class="card-body pt-0">
                                    <?php if($product['enable_product_variant'] == 'on'): ?>
                                        <h3 class="store-title-medium t-secondary ml-5 mb-4"><?php echo e(__('In Variant')); ?></h3>
                                        <a class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3" href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                            <span class="btn-inner--icon">
                                                <?php echo e(__('ADD TO CART')); ?>

                                                <i class="fas fa-shopping-basket"></i>
                                            </span>
                                        </a>
                                        <?php if(Auth::guard('customers')->check()): ?>
                                            <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                    <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($product->id); ?>" disabled>
                                                        <i class="fas fa-heart"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <h3 class="store-title-medium t-secondary ml-5 mb-4"><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></h3>
                                        <a class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3" href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                            <span class="btn-inner--icon">
                                                <?php echo e(__('ADD TO CART')); ?>

                                                <i class="fas fa-shopping-basket"></i>
                                            </span>
                                        </a>
                                        <?php if(Auth::guard('customers')->check()): ?>
                                            <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                    <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($product->id); ?>" disabled>
                                                        <i class="fas fa-heart"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>

        $(document).on('change', '#pro_variants_name', function () {
            var variants = [];
            $(".variant-selection").each(function (index, element) {
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

                    success: function (data) {
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme3/view.blade.php ENDPATH**/ ?>