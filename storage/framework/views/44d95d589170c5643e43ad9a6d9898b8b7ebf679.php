<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .product-box .product-price {
            justify-content: unset;
        }

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
    </style>
<?php $__env->stopPush(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/');
$productImg = \App\Models\Utility::get_file('uploads/is_cover_image/');
$catimg = \App\Models\Utility::get_file('uploads/product_image/');
$default =\App\Models\Utility::get_file('uploads/theme2/header/storego-image.png');
$s_logo = \App\Models\Utility::get_file('uploads/store_logo/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Header -->
    <div class="home-banner-slider">
        <?php if($getStoreThemeSetting[0]['section_enable'] == 'on'): ?>
        <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($storethemesetting['section_name'] == 'Banner-Image'): ?>
                <div class="banner-img th3" width="660" height="766" style="background: url(<?php echo e($imgpath.(!empty($storethemesetting['inner-list'][0]['field_default_text'])?$storethemesetting['inner-list'][0]['field_default_text']:'theme3/header/header_img_3.png')); ?>);">
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        <?php if($theme3_product != null): ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-0">
                        <h1 class=" mt-4 store-title t-secondary w-75"><?php echo e($theme3_product->name); ?></h1>
                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="black-border"></div>
                                <ul class="banner-list">
                                    <li><a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product->id])); ?>" class="text-dark"><?php echo e(__('DESCRIPTION')); ?></a></li>
                                    <li><a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product->id])); ?>" class="text-dark"><?php echo e(__('SPECIFICATION')); ?></a></li>
                                    <li><a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product->id])); ?>" class="text-dark"><?php echo e(__('DETAILS')); ?></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 banner-center-img">
                                <?php if($theme3_product_image != null && $theme3_product_image->count()>0): ?>
                                    <img class="b1" width="216" height="268" src="<?php echo e($catimg .$theme3_product_image[0]['product_images']); ?>" alt="New collection" title="New collection">
                                <?php endif; ?>
                                <?php if($theme3_product_image != null &&  $theme3_product_image->count()>1): ?>
                                    <img class="b2" width="142" height="188" src="<?php echo e($catimg.$theme3_product_image[1]['product_images']); ?>" alt="New collection" title="New collection">
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($theme3_product_image != null ): ?>
                            <div class="row m-t-40">
                                <div class="col-lg-6 col-md-6 col-sm-12 d-flex" style="height: 100px;">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-detail">
                                    <?php if($theme3_product['enable_product_variant'] == 'on'): ?>
                                        <h3 class="store-title-medium t-secondary ml-5 mb-4"><?php echo e(__('In variant')); ?></h3>
                                        <a class="btn btn-sm btn-dark  btn-icon hover-translate-y-n3" href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product->id])); ?>">
                                <span class="btn-inner--icon">
                                    <span class="btn-inner--text text-white"><?php echo e(__('ADD TO CART')); ?></span>
                                    <i class="fas fa-shopping-basket"></i>
                                </span>
                                        </a>
                                    <?php else: ?>
                                        <h3 class="store-title-medium t-secondary ml-5 mb-4"><?php echo e(\App\Models\Utility::priceFormat($theme3_product->price)); ?></h3>
                                        <a class="btn btn-sm btn-black btn-icon add_to_cart" data-id="<?php echo e($theme3_product->id); ?>">
                                            <span class="btn-inner--text text-white"><?php echo e(__('ADD TO CART')); ?></span>
                                            <span class="btn-inner--icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </span>
                                        </a>
                                        <?php if(!empty($wishlist) && isset($wishlist[$theme3_product->id]['product_id'])): ?>
                                            <?php if($wishlist[$theme3_product->id]['product_id'] != $theme3_product->id): ?>
                                                <button type="button" style="font-size: 20px" class="btn btn-sm btn-dark  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($theme3_product->id); ?>" data-id="<?php echo e($theme3_product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" style="font-size: 20px" class="btn btn-sm btn-dark  btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($theme3_product->id); ?>" disabled>
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button" style="font-size: 20px" class="btn btn-sm btn-dark  btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($theme3_product->id); ?>" data-id="<?php echo e($theme3_product->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Features -->
        <section class="store-promotions bg-primary">
            <?php if($getStoreThemeSetting[1]['section_enable'] == 'on'): ?>
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($storethemesetting['section_name'] == 'Home-Promotions'): ?>
                        <?php if(isset($storethemesetting['homepage-promotions-font-icon']) ||
                            isset($storethemesetting['homepage-promotions-title']) ||
                            isset($storethemesetting['homepage-promotions-description'])): ?>
                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-4 text-center">
                                            <div class="icon text-primary">
                                                <?php echo $storethemesetting['homepage-promotions-font-icon'][$i]; ?>

                                                <strong class="t-secondary">
                                                    <?php echo e($storethemesetting['homepage-promotions-title'][$i]); ?>

                                                </strong>
                                            </div>

                                            <p class=" mt-2 mb-0 t-gray">
                                                <?php echo e($storethemesetting['homepage-promotions-description'][$i]); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                        <?php else: ?>
                            <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-4 text-center">
                                        <div class="icon text-primary">
                                                <?php echo $storethemesetting['inner-list'][0]['field_default_text']; ?>

                                            <strong class="t-secondary">
                                                <?php echo e($storethemesetting['inner-list'][1]['field_default_text']); ?>

                                            </strong>
                                        </div>

                                        <p class=" mt-2 mb-0 t-gray">
                                            <?php echo e($storethemesetting['inner-list'][2]['field_default_text']); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    

                </div>
            </div>
<?php endif; ?>
        </section>


    <!-- Blog-->
    <?php if($store->blog_enable == 'on'): ?>
        <section class="new-collection-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <?php if($blogs->count()>0): ?>
                                            <?php if(\Storage::exists('uploads/store_logo/'.($blogs[0]['blog_cover_image']))): ?>
                                                <img class="d-block" width="837" height="566" src="<?php echo e($s_logo.($blogs[0]['blog_cover_image'])); ?>" alt="New collection" title="New collection">
                                            <?php else: ?>
                                                <img class="d-block" width="837" height="566" src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>" alt="New collection" title="New collection">
                                            <?php endif; ?>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h3><?php echo e($blogs[0]['title']); ?></h3>
                                                <a href="<?php echo e(route('store.store_blog_view',[$store->slug,$blogs[0]['id']])); ?>" class="btn btn-sm btn-white btn-icon  hover-translate-y-n3">
                                                    <span class="btn-inner--text"><?php echo e(__('Show More')); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="new-collection-box bt-0">
                                    <?php if($blogs->count()>1): ?>
                                        <img class="d-block" width="403" height="255" src="<?php echo e($s_logo.($blogs[1]['blog_cover_image'])); ?>" alt="New collection" title="New collection">
                                        <div class="new-collection-content">
                                            <h3><?php echo e($blogs[1]['title']); ?></h3>
                                            <a href="<?php echo e(route('store.store_blog_view',[$store->slug,$blogs[1]['id']])); ?>"><?php echo e(__('SHOW MORE')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="new-collection-box bt-10">
                                    <?php if($blogs->count()>2): ?>
                                        <img class="d-block" width="403" height="255" src="<?php echo e($s_logo.($blogs[2]['blog_cover_image'])); ?>" alt="New collection" title="New collection">
                                        <div class="new-collection-content">
                                            <h3><?php echo e($blogs[2]['title']); ?></h3>
                                            <a href="<?php echo e(route('store.store_blog_view',[$store->slug,$blogs[2]['id']])); ?>"><?php echo e(__('SHOW MORE')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Top Rated Products -->
    <?php if(count($topRatedProducts)>0): ?>
        <section class="store-feature-section bg-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 text-center">
                        <h3 class="store-title t-secondary"><?php echo e(__('Featured Collections')); ?></h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                            <div class="card card-product">
                                <div class="card-image">
                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>">
                                        <?php if(!empty($topRatedProduct->product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$topRatedProduct->product->is_cover)): ?>
                                            <img alt="Image placeholder" height="163" width="123" src="<?php echo e($productImg.(!empty($topRatedProduct->product->is_cover)?$topRatedProduct->product->is_cover:'')); ?>" class="img-center">
                                        <?php else: ?>
                                            <img alt="Image placeholder" height="163" width="123" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <h6><a class="t-black13" href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>"><?php echo e($topRatedProduct['product']['name']); ?></a></h6>
                                    <p class="text-sm">
                                        <?php echo e(__('Category')); ?>:<span class="t-black">
                                            <?php echo e($topRatedProduct->product->product_category()); ?>

                                        </span>
                                    </p>
                                    <?php if($topRatedProduct->product['enable_product_variant'] == 'on'): ?>
                                        <div class="product-price m-0">
                                            <span class="card-price t-black15"><?php echo e(__('In variant')); ?></span>
                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>">
                                                <button type="button" class="m-4 btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </button>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <p><span class="card-price t-black15"><?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->price)); ?></span></p>
                                        <div class="product-price m-0">
                                            <a class="btn btn-sm btn-black btn-icon add_to_cart" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                <span class="btn-inner--text text-white"><?php echo e(__('Add to cart')); ?></span>
                                                <span class="btn-inner--icon text-white">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                            </a>
                                            <?php if(Auth::guard('customers')->check()): ?>
                                                <?php if(!empty($wishlist) && isset($wishlist[$topRatedProduct->product->id]['product_id'])): ?>
                                                    <?php if($wishlist[$topRatedProduct->product->id]['product_id'] != $topRatedProduct->product->id): ?>
                                                        <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                            <i class="far fa-heart"></i>
                                                        </button>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($topRatedProduct->product->id); ?>" disabled>
                                                            <i class="fas fa-heart"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    
    <?php if($theme3_product_random != null && $theme3_product_random->count()>0): ?>
        <section class="your-time-section mt-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="right-img">

                        </div>
                        <?php if(!empty($theme3_product_random->is_cover) && \Storage::exists('uploads/is_cover_image/'.$theme3_product_random->is_cover)): ?>
                            <img class="hoodie-img" src="<?php echo e($productImg.(!empty($theme3_product_random->is_cover)?$theme3_product_random->is_cover:'')); ?>" title="<?php echo e($theme3_product_random->name); ?>" alt="Image Placeholder">
                        <?php else: ?>
                            <img class="hoodie-img" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" title="<?php echo e($theme3_product_random->name); ?>" alt="Image Placeholder">
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 left-img">
                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product_random->id])); ?>" class="store-title t-secondary"><?php echo e($theme3_product_random->name); ?></a>
                        <p class="mb-4 w-50 mt-3"><?php echo $theme3_product_random->detail; ?></p>
                        <div class="d-flex">
                            <?php if($theme3_product_random['enable_product_variant'] == 'on'): ?>
                                <div class="product-price m-0">
                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product_random->id])); ?>" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3">
                                        <i class="fas fa-shopping-basket"></i>
                                    </a>
                                    <h3 class="store-title-medium t-secondary ml-5"><?php echo e(__('In variant')); ?></h3>
                                </div>
                            <?php else: ?>
                                <div class="product-price m-0">
                                    <a class="btn btn-sm btn-black btn-icon add_to_cart" data-id="<?php echo e($theme3_product_random->id); ?>">
                                        <span class="btn-inner--text text-white"><?php echo e(__('Add to cart')); ?></span>
                                        <span class="btn-inner--icon text-white">
                                        <i class="fas fa-shopping-basket"></i>
                                    </span>
                                    </a>
                                    <?php if(Auth::guard('customers')->check()): ?>
                                        <?php if(!empty($wishlist) && isset($wishlist[$theme3_product_random->id]['product_id'])): ?>
                                            <?php if($wishlist[$theme3_product_random->id]['product_id'] != $theme3_product_random->id): ?>
                                                <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($theme3_product_random->id); ?>" data-id="<?php echo e($theme3_product_random->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($theme3_product_random->id); ?>" disabled>
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($theme3_product_random->id); ?>" data-id="<?php echo e($theme3_product_random->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($theme3_product_random->id); ?>" data-id="<?php echo e($theme3_product_random->id); ?>">
                                                <i class="far fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <h3 class="store-title-medium t-secondary ml-5"><?php echo e(\App\Models\Utility::priceFormat($theme3_product_random->price)); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section id="pro_items" class="bestsellers-section bg-body">
        <?php if($products['Start shopping']->count() > 0): ?>
            <div class="container mt-10 mb-5">
                <div class="row">
                    <div class="pr-title mb-4 bg-primary">
                        <h3 class="mt-4 store-title product_title"><?php echo e(__('Products')); ?></h3>
                        <div class="p-tablist">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/','_',$category); ?>" data-id="<?php echo e($key); ?>" class="nav-link bor-radius bg-primary text-dark product_title <?php echo e(($key==0)?'active':''); ?> productTab" id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home"
                                        aria-selected="false">
                                            <?php echo e(__($category)); ?>

                                        </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content bestsellers-tabs" id="myTabContent">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e(($key=="Start shopping")?'active show':''); ?>" id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-4 col-lg-4 col-sm-6 product-box">
                                                    <div class="card card-fluid card-product">
                                                        <div class="card-image">
                                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                                                    <img alt="Image placeholder" width="123" height="163" src="<?php echo e($productImg.$product->is_cover); ?>" class="img-center img-fluid">
                                                                <?php else: ?>
                                                                    <img alt="Image placeholder" width="123" height="163" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
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
                                                        <div class="card-body">
                                                            <?php if($product['enable_product_variant'] == 'on'): ?>
                                                                <div class="product-price m-0">
                                                                    
                                                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                        <button type="button" class="m-4 btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3">
                                                                            <?php echo e(__('In variant')); ?>

                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            <?php else: ?>
                                                                <p><span class="card-price t-black15"><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span></p>
                                                                <div class="product-price m-0">
                                                                    <a class="btn btn-sm btn-black btn-icon add_to_cart" data-id="<?php echo e($product->id); ?>">
                                                                        <span class="btn-inner--text text-white"><?php echo e(__('Add to cart')); ?></span>
                                                                        <span class="btn-inner--icon text-white">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                    </a>
                                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                            <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                                <i class="far fa-heart"></i>
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 bg-light-gray" data-id="<?php echo e($product->id); ?>" disabled>
                                                                                <i class="fas fa-heart"></i>
                                                                            </button>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <button type="button" class="btn btn-sm btn-primary rounded-pill btn-icon hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
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
        <?php endif; ?>
    </section>

    <!-- Products categories-->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($storethemesetting['section_name']) &&
            $storethemesetting['section_name'] == 'Home-Categories' &&
            $storethemesetting['section_enable'] == 'on' &&
            !empty($pro_categories)): ?>
            <?php
                // dd($storethemesetting);
                $Titlekey = array_search('Title', array_column($storethemesetting['inner-list'], 'field_name'));
                $Title = $storethemesetting['inner-list'][$Titlekey]['field_default_text'];

                $Description_key = array_search('Description', array_column($storethemesetting['inner-list'], 'field_name'));
                $Description = $storethemesetting['inner-list'][$Description_key]['field_default_text'];
            ?>
        <section class="categories-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 text-center">
                        <h3 class="store-title t-secondary"><?php echo e($Title); ?></h3>
                        <p><?php echo e($Description); ?></p>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product_count[$key] > 0): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 c-box">
                                <div class="cat-box" style="height:  245px;">
                                    <h4 class="store-title-small"><?php echo e($pro_categorie->name); ?></h4>
                                    <a class="see-more" href="<?php echo e(route('store.categorie.product',[$store->slug,$pro_categorie->name])); ?>"><?php echo e(__('SHOW MORE')); ?></a>
                                </div>
                                <div class="cat-img">
                                    <a class="see-more" href="<?php echo e(route('store.categorie.product',[$store->slug,$pro_categorie->name])); ?>">
                                        <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/'.$pro_categorie->categorie_img)): ?>
                                            <img height="221" width="112" src="<?php echo e($catimg .(!empty($pro_categorie->categorie_img)?$pro_categorie->categorie_img:'default.jpg')); ?>">
                                        <?php else: ?>
                                            <img height="221" width="112" src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Testimonials (v1) -->
<?php if($getStoreThemeSetting[3]['section_enable'] == 'on'): ?>
        <section class="testimonial-section mt-5">
            <div class="container">
                <div class="row testimonial-slider">
                    <div class="col-lg-12">
                        <div class="swiper-js-container overflow-hidden">
                            <div class="swiper-container"   data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="1" data-swiper-xl-items="1" style="cursor: grab;">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($storethemesetting['section_name']) &&
                                        $storethemesetting['section_name'] == 'Home-Testimonial' &&
                                         $storethemesetting['array_type'] == 'multi-inner-list'): ?>
                                            <?php if(isset($storethemesetting['homepage-testimonial-card-image']) ||
                                            isset($storethemesetting['homepage-testimonial-card-title']) ||
                                            isset($storethemesetting['homepage-testimonial-card-sub-text']) ||
                                            isset($storethemesetting['homepage-testimonial-card-description']) ||
                                            isset($storethemesetting['homepage-testimonial-card-enable'])): ?>
                                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                                <?php if($storethemesetting['homepage-testimonial-card-enable'][$i] == 'on'): ?>
                                                    <div class="swiper-slide">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                                <div class="col-lg-12 text-right">
                                                                    <p class="sub-title"><?php echo e($getStoreThemeSetting[3]['inner-list'][1]['field_default_text']); ?></p>
                                                                        <h3 class="store-title t-secondary"><?php echo e($getStoreThemeSetting[3]['inner-list'][0]['field_default_text']); ?></h3>
                                                                </div>

                                                                <div class="swiper-slide p-3">
                                                                    <div class="card bg-transparent">
                                                                        <div class="card-body">
                                                                            <p class="t-dcs t-gray"><?php echo e($storethemesetting['homepage-testimonial-card-description'][$i]); ?></p>
                                                                            <div class="d-flex collection-qoute">
                                                                                <h5 class="t-author t-black14">  <?php echo e($storethemesetting['homepage-testimonial-card-title'][$i]); ?></h5>
                                                                                <small class="d-block t-author-dcs t-black"> <?php echo e($storethemesetting['homepage-testimonial-card-sub-text'][$i]); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                                    <img alt="Image placeholder" height="530px" width="700px"
                                                                    src="<?php echo e($imgpath. (!empty($storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text']) ? $storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text'] : 'theme3/header/header_img_3.png')); ?>" class="tes-img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            <?php else: ?>
                                            
                                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>

                                                <div class="swiper-slide" <?php echo e($i); ?>>
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-5 col-md-12 col-sm-12">
                                                            <div class="col-lg-12 text-right">

                                                                <?php for($k=0;$k<=count($getStoreThemeSetting);$k++): ?>
                                                                    <?php if(isset($getStoreThemeSetting[$k]['section_name']) &&
                                                                        $getStoreThemeSetting[$k]['section_name'] == 'Home-Testimonial' &&
                                                                        $getStoreThemeSetting[$k]['array_type'] == 'inner-list' &&
                                                                        $getStoreThemeSetting[$k]['section_enable'] == 'on'): ?>
                                                                          <?php
                                                                          $Heading_key = array_search('Main Heading', array_column($getStoreThemeSetting[$k]['inner-list'], 'field_name'));
                                                                          $Heading = $getStoreThemeSetting[$k]['inner-list'][$Heading_key]['field_default_text'];

                                                                          $HeadingSubText_key = array_search('Main Heading Title', array_column($getStoreThemeSetting[$k]['inner-list'], 'field_name'));
                                                                          $HeadingSubText = $getStoreThemeSetting[$k]['inner-list'][$HeadingSubText_key]['field_default_text'];
                                                                      ?>
                                                                      <p class="sub-title"><?php echo e($HeadingSubText); ?></p>
                                                                      <h3 class="store-title t-secondary"><?php echo e($Heading); ?></h3>
                                                                    <?php endif; ?>
                                                               <?php endfor; ?>
                                                            </div>
                                                            <div class="swiper-slide p-3">
                                                                <div class="card bg-transparent">
                                                                    <div class="card-body">
                                                                        <?php for($a=0;$a<=count($getStoreThemeSetting);$a++): ?>
                                                                        <?php if(isset($getStoreThemeSetting[$a]['section_name']) &&
                                                                        $getStoreThemeSetting[$a]['section_name'] == 'Home-Testimonial' &&
                                                                        $getStoreThemeSetting[$a]['array_type'] == 'multi-inner-list'): ?>
                                                                            <p class="t-dcs t-gray">  <?php echo e($getStoreThemeSetting[$a]['inner-list'][4]['field_default_text']); ?></p>
                                                                            <div class="d-flex collection-qoute">
                                                                                <h5 class="t-author t-black14"> <?php echo e($getStoreThemeSetting[$a]['inner-list'][2]['field_default_text']); ?></h5>
                                                                                <small class="d-block t-author-dcs t-black"> <?php echo e($getStoreThemeSetting[$a]['inner-list'][3]['field_default_text']); ?></small>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php endfor; ?>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 col-md-12 col-sm-12">
                                                            <img alt="Image placeholder" height="530px" width="700px" src="<?php echo e($imgpath.(!empty($storethemesetting['inner-list'][1]['field_default_text']) ? $storethemesetting['inner-list'][1]['field_default_text'] : 'theme3/header/header_img_3.png')); ?>" class="tes-img">
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php endfor; ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- navigation buttons -->
                            <div id="js-prev1" class="swiper-button-prev"></div>
                            <div id="js-next1" class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme3/index.blade.php ENDPATH**/ ?>