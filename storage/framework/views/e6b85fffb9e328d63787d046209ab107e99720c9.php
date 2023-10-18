<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .p-tablist .nav-tabs .nav-item .nav-link.active {
            background-color: #fff !important;
            border-radius: 25px;
            padding: 10px;
        }

        .p-tablist .nav-tabs .nav-item .nav-link {
            border-radius: 25px;
            padding: 10px;

        }

        .nav-tabs {
            border-bottom: none;
        }

        <?php if(($store->store_theme == 'white-black-color.css')): ?>
        .p-tablist .nav-tabs .nav-item .nav-link {
            color: white !important;
        }

        .store-title {
            color: white;
        }
        <?php endif; ?>
    </style>
<?php $__env->stopPush(); ?>
<?php
    $imgpath=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Products -->
    <?php if($products['Start shopping']->count() > 0): ?>
    <div class="container product-section pt-3">
            <div class="row mt-7">
                <div class="pr-title mb-4 bg-primary">
                    <h3 class="mt-4 store-title"><?php echo e(__('Products')); ?></h3>
                    <div class="p-tablist">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/','_',$category); ?>" data-id="<?php echo e($key); ?>" class="nav-link bor-radius bg-primary text-dark <?php echo e(($category==$categorie_name)?'active':''); ?> productTab" id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="false">
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
                                                <div class="card card-fluid card-product">
                                                    <div class="card-image">
                                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                            <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                                                <img alt="Image placeholder" src="<?php echo e($imgpath.$product->is_cover); ?>" class="img-center img-fluid" style="width:auto; height:221px;">
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
                                                    </div>
                                                    <div class="card-body ">
                                                        <?php if($product['enable_product_variant'] == 'on'): ?>
                                                            <div class="">
                                                                <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                    <button type="button" class="btn btn-sm btn-black text-white shadow hover-shadow-l btn-icon hover-translate-y-n3">
                                                                        <span class="btn-inner--text"> <?php echo e(__('In variant')); ?></span>
                                                                        <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                    </button>
                                                                </a>
                                                                <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                    <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                        <button type="button" class="ml-2 btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?> rounded-pill" data-id="<?php echo e($product->id); ?>">
                                                                            <i class="far fa-heart"></i>
                                                                        </button>
                                                                    <?php else: ?>
                                                                        <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($product->id); ?> rounded-pill" disabled>
                                                                            <i class="fas fa-heart"></i>
                                                                        </button>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?> rounded-pill" data-id="<?php echo e($product->id); ?>">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php else: ?>
                                                        <div class="product-buttons">
                                                            <span class="card-price t-black15 mb-2"><?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?></span>
                                                                <button type="button" class="btn btn-sm rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3 btn-black text-white btn-inner--text add_to_cart" data-id="<?php echo e($product->id); ?>">
                                                                    <span class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                                                                        <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                </button>
                                                                <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                    <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                        <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?> rounded-pill" data-id="<?php echo e($product->id); ?>">
                                                                            <i class="far fa-heart"></i>
                                                                        </button>
                                                                    <?php else: ?>
                                                                        <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 bg-light-gray rounded-pill" data-id="<?php echo e($product->id); ?>" disabled>
                                                                            <i class="fas fa-heart"></i>
                                                                        </button>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <button type="button" class="btn btn-sm btn-primary  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?> rounded-pill" data-id="<?php echo e($product->id); ?>">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
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
    <?php else: ?>
        <div class="container mt-10 mb-5">
            <?php echo e(__('No data found')); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme3/product.blade.php ENDPATH**/ ?>