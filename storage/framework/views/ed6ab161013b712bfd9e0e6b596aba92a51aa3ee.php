<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>

<?php $__env->stopPush(); ?>
<?php
    $imgpath=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Products -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <div class="container">
            <div class="row">
                <div class="pr-title mb-4">
                    <h3 class=" mt-4 store-title text-primary"><?php echo e(__('Products')); ?></h3>
                    <div class="p-tablist">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/','_',$category); ?>" data-id="<?php echo e($key); ?>" class="nav-link <?php echo e(($category==$categorie_name)?'active':''); ?> productTab" id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="false">
                                        <?php echo e($category); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-content bestsellers-tabs" id="myTabContent">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade <?php echo e(($key==$categorie_name)?'active show':''); ?>" id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php if($items->count() > 0): ?>
                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                                                <div class="card card-product">
                                                    <div class="card-image">
                                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                            <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                                                <img alt="Image placeholder" src="<?php echo e($imgpath.$product->is_cover); ?>" class="img-center img-fluid">
                                                            <?php else: ?>
                                                                <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
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
                                                                                $color = 'text-warning';
                                                                            }
                                                                        ?>
                                                                        <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                                                    <?php endfor; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                        <h6>
                                                            <a class="t-black13" href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                <?php echo e($product->name); ?>

                                                            </a>
                                                        </h6>
                                                        <p class="text-sm">
                                                            <span class="td-gray"><?php echo e(__('Category')); ?>:</span> <?php echo e($product->product_category()); ?>

                                                        </p>
                                                        <div class="product-price mt-3">
                                                            <span class="card-price t-black15">
                                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                                    <?php echo e(__('In variant')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                                <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>" class="action-item pcart-icon bg-primary">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <a class="action-item pcart-icon bg-primary add_to_cart" data-toggle="tooltip"  data-id="<?php echo e($product->id); ?>">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="actions card-product-actions">
                                                        <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                            <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            <?php else: ?>
                                                                <button type="button" class="action-item wishlist-icon bg-light-gray" data-id="<?php echo e($product->id); ?>" disabled>
                                                                    <i class="fas fa-heart"></i>
                                                                </button>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="col-12 product-box">
                                            <div class="card card-product">
                                                <h6 class="m-0 text-center no_record"><i class="fas fa-ban"></i> <?php echo e(__('No Record Found')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(".add_to_cart").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function (index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug,'variation_id'])); ?>'.replace('__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                    console.log('error');
                }
            });
        });

        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('store.addtowishlist', [$store->slug,'__product_id'])); ?>'.replace('__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                        $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                        $('.wishlist_count').html(response.count);
                    } else {
                        show_toastr('Error', response.message, 'error');
                    }
                },
                error: function (result) {
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme1/product.blade.php ENDPATH**/ ?>