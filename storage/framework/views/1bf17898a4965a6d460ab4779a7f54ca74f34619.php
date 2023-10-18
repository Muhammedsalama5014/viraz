<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/');
$productImg = \App\Models\Utility::get_file('uploads/is_cover_image/');
$catimg = \App\Models\Utility::get_file('uploads/product_image/');
$default =\App\Models\Utility::get_file('uploads/theme2/header/storego-image.png');
$s_logo = \App\Models\Utility::get_file('uploads/store_logo/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Header_img -->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ThemeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($ThemeSetting['section_name']) &&
            $ThemeSetting['section_name'] == 'Home-Header' &&
            $ThemeSetting['section_enable'] == 'on'): ?>
            <?php
                $homepage_header_title_key = array_search('Title', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_title = $ThemeSetting['inner-list'][$homepage_header_title_key]['field_default_text'];

                $homepage_header_Sub_text_key = array_search('Sub text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_Sub_text = $ThemeSetting['inner-list'][$homepage_header_Sub_text_key]['field_default_text'];

                $homepage_header_Button_key = array_search('Button', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_Button = $ThemeSetting['inner-list'][$homepage_header_Button_key]['field_default_text'];

                $homepage_header_Bckground_Image_key = array_search('Bckground Image', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_Bckground_Image = $ThemeSetting['inner-list'][$homepage_header_Bckground_Image_key]['field_default_text'];
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($getStoreThemeSetting[0]['section_enable'] == 'on'): ?>
    <div class="bd-example home-banner-slider">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner" role="listbox">
                <div class="bg-cover bg-size--cover home-banner carousel-item active" data-offset-top="#header-main"
                    style="background-image: url(<?php echo e($imgpath. (!empty($homepage_header_Bckground_Image) ? $homepage_header_Bckground_Image : 'home-banner1.png')); ?>); background-position: center center; padding-top: 77px;">
                    <div class="carousel-caption  d-md-block">
                        <div class="container py-6 box-height">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="h1 text-white store-title w-25">
                                        <?php echo e(!empty($homepage_header_title) ? $homepage_header_title : 'Home Accessories'); ?></h2>
                                    <p class="lead text-white mt-4 w-50">
                                        <?php echo e(!empty($homepage_header_Sub_text) ? $homepage_header_Sub_text : 'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?>

                                    </p>
                                    <a href="#"
                                        class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3"
                                        id="pro_scroll">
                                        <span
                                            class="btn-inner--text t-secondary"><?php echo e(__(!empty($homepage_header_Button) ? $homepage_header_Button : __('Show more products'))); ?></span>
                                        <span class="btn-inner--icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    

    <!-- Products -->

    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="bestsellers-section <?php echo e($getStoreThemeSetting[0]['section_enable'] == 'off' ? 'mt-10' : ''); ?>"
            id="pro_items">
            <div class="container">
                <div class="row">
                    <div class="pr-title mb-4">
                        <div class="p-tablist">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>" data-id="<?php echo e($key); ?>"
                                            class="nav-link <?php echo e($key == 0 ? 'active' : ''); ?> productTab" id="electronic-tab"
                                            data-toggle="tab" role="tab" aria-controls="home" aria-selected="false">
                                            <?php echo e(__($category)); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content bestsellers-tabs" id="myTabContent">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e($key == 'Start shopping' ? 'active show' : ''); ?>"
                                id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                                                    <div class="card card-product">
                                                        <div class="card-image">
                                                            <a
                                                                href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover)): ?>
                                                                    <img alt="Image placeholder"
                                                                        src="<?php echo e($productImg . $product->is_cover); ?>"
                                                                        class="img-center img-fluid"
                                                                        style="height:275px; width:255px;">
                                                                <?php else: ?>
                                                                    <img alt="Image placeholder"
                                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                        class="img-center img-fluid"
                                                                        style="height:275px; width:255px;">
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <h6><a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                                    class="t-black13"><?php echo e($product->name); ?></a></h6>
                                                            <span class="static-rating static-rating-sm">
                                                                <?php if($store->enable_rating == 'on'): ?>
                                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                                        <?php
                                                                            $icon = 'fa-star';
                                                                            $color = '';
                                                                            $newVal1 = $i - 0.5;
                                                                            if ($product->product_rating() < $i && $product->product_rating() >= $newVal1) {
                                                                                $icon = 'fa-star-half-alt';
                                                                            }
                                                                            if ($product->product_rating() >= $newVal1) {
                                                                                $color = 'text-warning';
                                                                            }
                                                                        ?>
                                                                        <i class="star fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                                                    <?php endfor; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                            <div class="product-price mt-3 mb-3">
                                                                <span class="card-price t-black15">
                                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                                        <?php echo e(__('In variant')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                            <div class="product-buttons">
                                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                                        class="btn btn-sm btn-primary rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                                                        <span
                                                                            class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                                                                        <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <a href="javascript:void(0)"
                                                                        class="btn btn-sm btn-primary rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3 add_to_cart"
                                                                        data-id="<?php echo e($product->id); ?>">
                                                                        <span
                                                                            class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                                                                        <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                    </a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::guard('customers')->check()): ?>
                                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                            <button href="#"
                                                                                class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                                data-id="<?php echo e($product->id); ?>">
                                                                                <span class="btn-inner--icon">
                                                                                    <i class="far fa-heart"></i>
                                                                                </span>
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button href="#"
                                                                                class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3"
                                                                                data-id="<?php echo e($product->id); ?>" disabled>
                                                                                <span class="btn-inner--icon">
                                                                                    <i class="fas fa-heart"></i>
                                                                                </span>
                                                                            </button>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <button href="#"
                                                                            class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                            data-id="<?php echo e($product->id); ?>">
                                                                            <span class="btn-inner--icon">
                                                                                <i class="far fa-heart"></i>
                                                                            </span>
                                                                        </button>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <button href="#"
                                                                        class="btn btn-sm bg-gray shadow  btn-icon hover-shadow-lg hover-translate-y-n3 add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                        data-id="<?php echo e($product->id); ?>">
                                                                        <span class="btn-inner--icon">
                                                                            <i class="far fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                <?php endif; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

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
            <section class="top-product">
                <div class="container">
<?php if($getStoreThemeSetting[3]['section_enable'] == 'on'): ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 cat-main-boxes">
                            <div class="categories-content">
                                <h2 class=" mt-4 store-title t-secondary"><?php echo e(!empty($Title) ? $Title : 'Categories'); ?></h2>
                                <p class="t-l-gray mt-3 mb-5 w-75 w-custom">
                                    <?php echo e(!empty($Description) ? $Description : 'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?>

                                </p>
                            </div>
                            <div class="cat-button">
                                <a href="<?php echo e(route('store.categorie.product', [$store->slug])); ?>"
                                    class="btn btn-sm btn-blue bg-gray btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                    <span class="btn-inner--text  t-white"><?php echo e(__('Show more products')); ?></span>
                                    <span class="btn-inner--icon">
                                        <i class="fas fa-shopping-basket"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
<?php endif; ?>
                    <div class="row">
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="col-xl-4 col-lg-4 col-sm-6 product-box product-cat">
                                <div class="card card-product">
                                    <div class="card-image">
                                        <a
                                            href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>">
                                            <?php if(!empty($pro_categorie->categorie_img) &&
                                                \Storage::exists('uploads/product_image/' . $pro_categorie->categorie_img)): ?>
                                                <img alt="Image placeholder"
                                                    src="<?php echo e($catimg . $pro_categorie->categorie_img); ?>"
                                                    class="img-center img-fluid" style="height:335px; width:350px;">
                                            <?php else: ?>
                                                <img alt="Image placeholder"
                                                    src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    class="img-center img-fluid" style="height:335px; width:350px;">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="product-price mt-3">
                                            <div class="p-title">
                                                <h6><span class="card-price t-white"><?php echo e($pro_categorie->name); ?></span>
                                                </h6>
                                                <p class="mb-0 text-white"><?php echo e(__('Products')); ?>:
                                                    <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?></p>
                                                <a href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"
                                                    class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                                    <span
                                                        class="btn-inner--text t-white"><?php echo e(__('Show more products')); ?></span>
                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Top Rated Products -->
    <?php if(count($topRatedProducts) > 0): ?>
        <section class="top-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class=" mt-4 store-title t-secondary"><?php echo e(__('Collections')); ?></h3>
                        <p class="t-l-gray"><?php echo e(__('There is only that moment and the incredible certainty that')); ?> <br>
                            <?php echo e(__('everything under the sun has been written by one hand only')); ?>.</p>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                            <div class="card card-product">
                                <div class="card-image">
                                    <a
                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product_id])); ?>">
                                        <?php if(!empty($topRatedProduct->product->is_cover) &&
                                            \Storage::exists('uploads/is_cover_image/' . $topRatedProduct->product->is_cover)): ?>
                                            <img alt="Image placeholder"
                                                src="<?php echo e($productImg. (!empty($topRatedProduct->product->is_cover) ? $topRatedProduct->product->is_cover : '')); ?>"
                                                class="img-center img-fluid" style="height:275px; width:255px;">
                                        <?php else: ?>
                                            <img alt="Image placeholder"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                class="img-center img-fluid" style="height:275px; width:255px;">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="product-price mt-3">
                                        <div class="p-title">
                                            <h6><span
                                                    class="card-price t-black15"><?php echo e($topRatedProduct->product->product_category()); ?></span>
                                            </h6>
                                        </div>
                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product_id])); ?>"
                                            type="button" class="action-item pcart-icon" data-toggle="tooltip"
                                            data-original-title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="actions card-product-actions">
                                    <button type="button" class="action-item p-new">
                                        <?php echo e(__('New')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- subscriber-->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($storethemesetting['section_name']) &&
            $storethemesetting['section_name'] == 'Home-Email-Subscriber' &&
            $storethemesetting['section_enable'] == 'on'): ?>
            <?php
                // dd($storethemesetting);
                $emailsubs_img_key = array_search('Subscriber Background Image', array_column($storethemesetting['inner-list'], 'field_name'));
                $emailsubs_img = $storethemesetting['inner-list'][$emailsubs_img_key]['field_default_text'];

                $SubscriberTitle_key = array_search('Subscriber Title', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscriberTitle = $storethemesetting['inner-list'][$SubscriberTitle_key]['field_default_text'];

                $SubscriberDescription_key = array_search('Subscriber Description', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscriberDescription = $storethemesetting['inner-list'][$SubscriberDescription_key]['field_default_text'];

                $SubscribeButton_key = array_search('Subscribe Button Text', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscribeButton = $storethemesetting['inner-list'][$SubscribeButton_key]['field_default_text'];
            ?>
            <section class="your-time-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 left-img">
                            <h3 class="medium-store-title t-secondary mb-3">
                                <?php echo e(!empty($SubscriberTitle) ? $SubscriberTitle : 'Always on time'); ?></h3>
                            <p class="mb-4">
                                <?php echo e(!empty($SubscriberDescription) ? $SubscriberDescription : 'Subscription here'); ?></p>
                            <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST'])); ?>

                            <div class="form-group mb-0 form-subscribe">
                                <div class="input-group input-group-lg input-group-merge">
                                    <?php echo e(Form::email('email', null, ['class' => 'form-control bg-white form-control-flush rounded-pill', 'aria-label' => __('Enter your email address'), 'placeholder' => __('Enter Your Email Address')])); ?>

                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded-pill  btn-icon mr-sm-4 scroll-me"
                                            type="submit">
                                            <span class="btn-inner--text"><?php echo e($SubscribeButton); ?></span>
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="right-img"
                                style="background: url(<?php echo e($s_logo . (!empty($storethemesetting['subscriber_img']) ? $storethemesetting['subscriber_img'] : 'email_subscriber_2.png')); ?>);">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Testimonials (v1) -->
    <?php if($getStoreThemeSetting[4]['section_enable'] == 'on'): ?>
    <section class="slice testimonial-section ">
        <div class="container">
            <div class="mb-5 text-center">
                <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($storethemesetting['section_name']) &&
                        $storethemesetting['section_name'] == 'Home-Testimonial' &&
                        $storethemesetting['array_type'] == 'inner-list' &&
                        $storethemesetting['section_enable'] == 'on'): ?>
                        <?php
                            $Heading_key = array_search('Heading', array_column($storethemesetting['inner-list'], 'field_name'));
                            $Heading = $storethemesetting['inner-list'][$Heading_key]['field_default_text'];

                            $HeadingSubText_key = array_search('Heading Sub Text', array_column($storethemesetting['inner-list'], 'field_name'));
                            $HeadingSubText = $storethemesetting['inner-list'][$HeadingSubText_key]['field_default_text'];
                        ?>
                        <h3 class=" mt-4 store-title t-secondary">
                            <?php echo e(!empty($Heading) ? $Heading : 'Testimonials'); ?>

                        </h3>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180 store-dcs t-l-gray">
                                <?php echo e(!empty($HeadingSubText)
                                    ? $HeadingSubText
                                    : 'There is only that moment and the incredible certainty that everything
                                                                    under the sun has been written by one hand only.'); ?>

                            </p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row testimonial-slider">
                <div class="col-lg-12">
                    <div class="swiper-js-container overflow-hidden">
                        <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0"
                            data-swiper-sm-items="1" data-swiper-xl-items="1">
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
                                                <div class="swiper-slide p-3">
                                                    <div class="card bg-transparent">
                                                        <div class="card-body">
                                                            <p class="t-dcs t-gray">
                                                                <?php echo e($storethemesetting['homepage-testimonial-card-description'][$i]); ?>

                                                            </p>
                                                            <div class="d-flex align-items-center collection-qoute">
                                                                <img alt="Image placeholder"
                                                                    src="<?php echo e($imgpath . (!empty($storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text']) ? $storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text'] : '')); ?>"
                                                                    class="avatar  rounded-circle">
                                                                <h5 class="t-author t-black14">
                                                                    <?php echo e($storethemesetting['homepage-testimonial-card-title'][$i]); ?>

                                                                </h5>
                                                                <small class="d-block t-author-dcs">
                                                                    <?php echo e($storethemesetting['homepage-testimonial-card-sub-text'][$i]); ?>

                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        <?php else: ?>
                                            <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                                <div class="swiper-slide p-3">
                                                    <div class="card bg-transparent">
                                                        <div class="card-body">
                                                            <p class="t-dcs t-gray">
                                                                <?php echo e($storethemesetting['inner-list'][4]['field_default_text']); ?>

                                                            </p>
                                                            <div class="d-flex align-items-center collection-qoute">
                                                                <img alt="Image placeholder"
                                                                    src="<?php echo e(asset(Storage::url('uploads/' . (!empty($storethemesetting['inner-list'][1]['field_default_text']) ? $storethemesetting['inner-list'][1]['field_default_text'] : '')))); ?>"
                                                                    class="avatar  rounded-circle">
                                                                <h5 class="t-author t-black14">
                                                                    <?php echo e($storethemesetting['inner-list'][2]['field_default_text']); ?>

                                                                </h5>
                                                                <small class="d-block t-author-dcs">
                                                                    <?php echo e($storethemesetting['inner-list'][3]['field_default_text']); ?></small>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination w-100 mt-4 d-flex align-items-center justify-content-center">
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

    <!-- Features -->
<?php if($getStoreThemeSetting[1]['section_enable'] == 'on'): ?>
    <section class="store-promotions mt-70">
        <div class="container">
            <div class="row">

                <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($storethemesetting['section_name'] == 'Home-Promotions'): ?>
                        <?php if(isset($storethemesetting['homepage-promotions-font-icon']) ||
                            isset($storethemesetting['homepage-promotions-title']) ||
                            isset($storethemesetting['homepage-promotions-description'])): ?>
                            <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-4">
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
                                    <div class="mb-4">
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
    </section>
<?php endif; ?>

    <!-- Client Logo -->
    <?php if($getStoreThemeSetting[6]['section_enable'] == 'on'): ?>
    <div class="client-logo">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($storethemesetting['section_name']) &&
                        $storethemesetting['section_name'] == 'Home-Brand-Logo' &&
                        $storethemesetting['section_enable'] == 'on'): ?>
                        <?php $__currentLoopData = $storethemesetting['inner-list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($image['image_path'])): ?>
                                <?php $__currentLoopData = $image['image_path']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                        <a href="#">
                                            <img src="<?php echo e($imgpath . (!empty($img) ? $img : 'storego-image.png')); ?>"
                                                alt="Footer logo">
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6 ">
                                    <a href="#">
                                        <img src="<?php echo e($default); ?>"
                                            alt="Footer logo">

                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6 ">
                                    <a href="#">
                                        <img src="<?php echo e($default); ?>"
                                            alt="Footer logo">

                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6 ">
                                    <a href="#">
                                        <img src="<?php echo e($default); ?>"
                                            alt="Footer logo">

                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6 ">
                                    <a href="#">
                                        <img src="<?php echo e($default); ?>"
                                            alt="Footer logo">

                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6 ">
                                    <a href="#">
                                        <img src="<?php echo e($default); ?>"
                                            alt="Footer logo">

                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(".add_to_cart").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id', $store->slug, 'variation_id'])); ?>'.replace(
                    '__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function(response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function(result) {
                    console.log('error');
                }
            });
        });

        $(document).on('click', '.add_to_wishlist', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('store.addtowishlist', [$store->slug, '__product_id'])); ?>'.replace(
                    '__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                        $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                        $('.wishlist_count').html(response.count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function(result) {}
            });
        });

        $(".productTab").click(function(e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });

        $("#pro_scroll").click(function() {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme2/index.blade.php ENDPATH**/ ?>