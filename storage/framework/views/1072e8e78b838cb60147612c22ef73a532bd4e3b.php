<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php
    $imgpath=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>

    <section class="my-cart-section pt-5 mb-5">
        <?php if($products['Start shopping']->count() > 0): ?>
            <div class="container">
                <!-- Shopping cart table -->
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-2">
                        <h3 class="font-weight-400 m-md-0 text-secondary">Product</h3>
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <div class="nav nav-tabs nav-fill border-0 justify-content-end" id="nav-tab" role="tablist">
                            <div class="product-tab d-flex border border-secondary no-gutters">
                                <ul class="tabs" role="tablist" id="myTab">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e(($category==$categorie_name)?'active':''); ?> product-tab-main">
                                            <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>" data-id="<?php echo e($key); ?>"
                                                class="  tab-a border-0 btn btn-block text-secondary m-0 rounded-0 productTab"
                                                id="electronic-tab" data-toggle="tab" role="tab"
                                                aria-controls="home" aria-selected="false">
                                                <?php echo e(__($category)); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content theme6 py-3 px-3 px-sm-0 tabs-container " id="nav-tabContent">

                    
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                        class="tab-content pro-cards <?php echo e(($key==$categorie_name)?'active show':''); ?>"
                            id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                            
                            <div class="row">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="col-lg-3 col-sm-6 product-box d-flex">
                                            <div class="border-0 bg-white card card-product rounded-0 w-100">
                                                <div
                                                    class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">
                                                    <span
                                                        class="badge badge-secondary font-size-12 font-weight-300 ls-1 px-4 py-3 text-uppercase rounded-0"><?php echo e(__('Bestseller')); ?></span>

                                                    <?php if(Auth::guard('customers')->check()): ?>
                                                        <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                            <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                <button data-toggle="tooltip"
                                                                    data-original-title="Wishlist" type="button"
                                                                    class="bg-transparent border-0 p-0  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                    data-id="<?php echo e($product->id); ?>">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            <?php else: ?>
                                                                <button data-toggle="tooltip"
                                                                    data-original-title="Wishlist" type="button"
                                                                    class="bg-transparent border-0 p-0 "
                                                                    data-id="<?php echo e($product->id); ?>" disabled>
                                                                    <i class="fas fa-heart"></i>
                                                                </button>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button data-toggle="tooltip" data-original-title="Wishlist"
                                                            type="button"
                                                            class="bg-transparent border-0 p-0  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                            data-id="<?php echo e($product->id); ?>">
                                                            <i class="far fa-heart"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                                <div
                                                    class="card-image col-6 mx-auto pt-5 pb-4 d-flex justify-content-center align-items-center">

                                                    <a
                                                    href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                        <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                            <img alt="Image placeholder"
                                                                src="<?php echo e($imgpath. $product->is_cover); ?>"
                                                                class="img-center img-fluid">
                                                        <?php else: ?>
                                                            <img alt="Image placeholder"
                                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                class="img-center img-fluid">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <h6 class="mb-3"><span class="d-block"><?php echo e($product->name); ?></span>

                                                    </h6>
                                                    <p class="text-sm">
                                                        <span class="td-gray"><?php echo e(__('Category')); ?>:</span>
                                                        <?php echo e($product->product_category()); ?>

                                                    </p>
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
                                                            <?php echo e(__('ADD TO CART')); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0)"
                                                            class="border-0 btn btn-block btn-secondary pcart-icon py-4 rounded-0 text-underline add_to_cart"
                                                            data-id="<?php echo e($product->id); ?>">
                                                            <?php echo e(__('ADD TO CART')); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            <?php if($categorie_name == 'Start shopping'): ?>

                $('#Furniture').addClass('active');
                $("#myTab li:eq(0)").addClass('active');
            <?php endif; ?>
            // $("#myTab li a:eq(0)").addClass('active');
        });
        // Tab js
        $('#myTab li').click(function() {
            // alert('hello')
            var $this = $(this);
            var $theTab = $(this).attr('data-tab');
            if ($this.hasClass('active')) {} else {
                $this.closest('.tabs-wrapper').find('ul.tabs li, .tabs-container .tab-content').removeClass(
                    'active');
                $('.tabs-container .tab-content[id="' + $theTab + '"], ul.tabs li[data-tab="' + $theTab + ']')
                    .addClass('active');
            }
            $('ul.tabs li').removeClass('active');
            $(this).addClass('active');
            // $('.product-tab-slider').slick('refresh');
        });

        $(".productTab").click(function(e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });
        $(document).on('click', '.qty-plus', function() {
            $(this).prev().val(+$(this).prev().val() + 1);
        });
        $(document).on('click', '.qty-minus', function() {
            if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
        });
        $(document).ready(function() {
            $('.tab-a').click(function() {
                $(".tab-pane").removeClass('tab-active');
                $(".tab-pane[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
                $(".tab-a").removeClass('active-a');
                $(this).parent().find(".tab-a").addClass('active-a');
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme6/product.blade.php ENDPATH**/ ?>