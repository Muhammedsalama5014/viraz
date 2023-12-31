<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on' ? 'rtl' : ''); ?>">
<?php
$userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
$setting = \DB::table('settings')
    ->where('name', 'company_favicon')
    ->where('created_by', $store->id)
    ->first();
$settings = Utility::settings();
$getStoreThemeSetting = Utility::getStoreThemeSetting($store->id, $store->theme_dir);
$getStoreThemeSetting1 = [];

if (!empty($getStoreThemeSetting['dashboard'])) {
    $getStoreThemeSetting = json_decode($getStoreThemeSetting['dashboard'], true);
    $getStoreThemeSetting1 = Utility::getStoreThemeSetting($store->id, $store->theme_dir);
}

if (empty($getStoreThemeSetting)) {
    $path = storage_path() . '/uploads/' . $store->theme_dir . '/' . $store->theme_dir . '.json';
    $getStoreThemeSetting = json_decode(file_get_contents($path), true);
}

// store RTL

// store RTL
$SITE_RTL = Cookie::get('SITE_RTL');

if ($SITE_RTL == '') {
    $SITE_RTL = 'off';
}
$imgpath=\App\Models\Utility::get_file('uploads/');
    $s_logo = \App\Models\Utility::get_file('uploads/store_logo/');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e(ucfirst(env('APP_NAME'))); ?> - <?php echo e(ucfirst($store->tagline)); ?>">
    <meta name="keywords" content="<?php echo e($store->metakeyword); ?>">
    <meta name="description" content="<?php echo e($store->metadesc); ?>">

    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e($store->tagline ? $store->tagline : config('APP_NAME', ucfirst($store->name))); ?>

    </title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon"
        href="<?php echo e(asset(Storage::url('uploads/logo/') . (!empty($setting->value) ? $setting->value : 'favicon.png'))); ?>"
        type="image/png">
    

    
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/swiper.min.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/purpose.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/all.min.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme6/css/storego.css')); ?>" id="stylesheet">
    

    
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/theme6/css/' . (!empty($store->store_theme) ? $store->store_theme : 'green-color.css'))); ?>">

    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>

<body>
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }

        $languages = \App\Models\Utility::languages();

        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    ?>
    <header class="header" id="header-main">
        <!-- Topbar -->
        <div id="navbar-top-main" class="navbar-top bg-primary">
            <div class="container px-0">
                <div class="d-block navbar-nav text-center">
                    <span class="ls-3 mr-0 navbar-text t-white text-uppercase top-header-text">
                        <b>FREE SHIPPING world wide</b> for all orders over $199
                    </span>
                </div>
            </div>
            <div class="close-btn mr-2 px-2 cursor-pointer">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.05806 2.94194C1.81398 2.69786 1.81398 2.30214 2.05806 2.05806C2.30214 1.81398 2.69786 1.81398 2.94194 2.05806L7.5 6.61612L12.0581 2.05806C12.3021 1.81398 12.6979 1.81398 12.9419 2.05806C13.186 2.30214 13.186 2.69786 12.9419 2.94194L8.38388 7.5L12.9419 12.0581C13.186 12.3021 13.186 12.6979 12.9419 12.9419C12.6979 13.186 12.3021 13.186 12.0581 12.9419L7.5 8.38388L2.94194 12.9419C2.69786 13.186 2.30214 13.186 2.05806 12.9419C1.81398 12.6979 1.81398 12.3021 2.05806 12.0581L6.61612 7.5L2.05806 2.94194Z"
                        fill="white" />
                </svg>
            </div>
        </div>

        <?php
            $navDark = \Request::route()->getName() == 'customer.loginform' || \Request::route()->getName() == 'store.usercreate' || \Request::route()->getName() == 'customer.home' || \Request::route()->getName() == 'pageoption.slug' || \Request::route()->getName() == 'store.store_blog_view' || \Request::route()->getName() == 'store.blog' || \Request::route()->getName() == 'customer.home' || \Request::route()->getName() == 'store.cart' || \Request::route()->getName() == 'store.categorie.product' || \Request::route()->getName() == 'store.wishlist' || \Request::route()->getName() == 'store.product.product_view' || \Request::route()->getName() == 'user-address.useraddress' || \Request::route()->getName() == 'store-payment.payment' || \Request::route()->getName() == 'customer.order' ? 'navbar navbar-main navbar-expand-lg navbar-transparent nav-secondary' : '';

            // @DD(\Request::route()->getName());

        ?>
        <!-- Main navbar -->
        <nav class=" <?php echo e($getStoreThemeSetting[1]['section_enable'] == 'off' ? 'nav-secondary navbar navbar-expand-lg navbar-main navbar-transparent' : 'navbar navbar-main navbar-expand-lg navbar-transparent'); ?> <?php echo e($navDark); ?>"
            id="navbar-main">
            <div class="container px-lg-0">

                <a class="navbar-brand mr-lg-5" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                    <?php if(!empty($store->logo)): ?>
                        <img alt="Image placeholder img_shadow"
                            src="<?php echo e($s_logo . $store->logo); ?>" id="navbar-logo"
                            style="height: 40px;">
                    <?php else: ?>
                        <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/logo.png'))); ?>"
                            id="navbar-logo" style="height: 45px;">
                    <?php endif; ?>
                </a>
                <!-- Navbar collapse trigger -->
                <button class="navbar-toggler pr-0" type="button" data-toggle="collapse"
                    data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar nav -->
                <div class="collapse navbar-collapse " id="navbar-main-collapse">
                    <ul class="navbar-nav align-items-lg-center">
                        <!-- Home - Overview  -->
                        <li class="nav-item ">
                            <a class="align-items-center d-flex font-weight-600 nav-link text-nowrap"
                                href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.369 9.35829V4.01069C14.1073 4.01069 14.7059 3.41215 14.7059 2.6738V1.3369C14.7059 0.59855 14.1073 0 13.369 0H1.3369C0.59855 0 0 0.59855 0 1.3369V2.6738C0 3.41215 0.59855 4.01069 1.3369 4.01069H10.0267C10.3959 4.01069 10.6952 3.71142 10.6952 3.34225C10.6952 2.97307 10.3959 2.6738 10.0267 2.6738H1.3369V1.3369H13.369V2.6738C12.6306 2.6738 12.0321 3.27235 12.0321 4.01069V9.35829C12.0321 9.72746 11.7328 10.0267 11.3636 10.0267H3.34225C2.97307 10.0267 2.6738 9.72746 2.6738 9.35829V5.34759C2.6738 4.97842 2.37452 4.67914 2.00535 4.67914C1.63617 4.67914 1.3369 4.97842 1.3369 5.34759V9.35829C1.3369 10.4658 2.23472 11.3636 3.34225 11.3636H11.3636C12.4712 11.3636 13.369 10.4658 13.369 9.35829Z"
                                        fill="white" />
                                </svg>
                                <?php echo e(ucfirst($store->name)); ?>

                            </a>

                        </li>
                        <?php if(!empty($page_slug_urls)): ?>
                            <?php $__currentLoopData = $page_slug_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $page_slug_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page_slug_url->enable_page_header == 'on'): ?>
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="<?php echo e(env('APP_URL') . '/page/' . $page_slug_url->slug); ?>"><?php echo e(ucfirst($page_slug_url->name)); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if($store['blog_enable'] == 'on' && !empty($blog)): ?>
                            <li class="nav-item ">
                                <a class="nav-link"
                                    href="<?php echo e(route('store.blog', $store->slug)); ?>"><?php echo e(__('Blog')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto nav-my-store">
                        <li class="nav-item d-lg-none d-xl-block">
                            <div class="form-group header-search">
                                <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                    method="get">
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group input-group-lg input-group-merge">
                                        <input type="text" class="form-control form-control-flush"
                                            placeholder="Type your product..." name="search_data">
                                        <div class="input-group-append">
                                            <button type="submit" class="border-0 btn btn-block">
                                                <svg width="15" height="15" viewBox="0 0 15 15"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 5.625C0 8.7316 2.5184 11.25 5.625 11.25C6.92373 11.25 8.11966 10.8099 9.07176 10.0706C9.10762 10.1465 9.15692 10.2176 9.21967 10.2803L13.7197 14.7803C14.0126 15.0732 14.4874 15.0732 14.7803 14.7803C15.0732 14.4874 15.0732 14.0126 14.7803 13.7197L10.2803 9.21967C10.2176 9.15692 10.1465 9.10762 10.0706 9.07176C10.8099 8.11966 11.25 6.92373 11.25 5.625C11.25 2.5184 8.7316 0 5.625 0C2.5184 0 0 2.5184 0 5.625ZM1.5 5.625C1.5 3.34683 3.34683 1.5 5.625 1.5C7.90317 1.5 9.75 3.34683 9.75 5.625C9.75 7.90317 7.90317 9.75 5.625 9.75C3.34683 9.75 1.5 7.90317 1.5 5.625Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <?php
                            $counterDark = \Request::route()->getName() == 'customer.loginform' || \Request::route()->getName() == 'store.usercreate' || \Request::route()->getName() == 'customer.home' || \Request::route()->getName() == 'pageoption.slug' || \Request::route()->getName() == 'store.store_blog_view' || \Request::route()->getName() == 'store.blog' || \Request::route()->getName() == 'customer.home' || \Request::route()->getName() == 'store.cart' || \Request::route()->getName() == 'store.categorie.product' || \Request::route()->getName() == 'store.wishlist' || \Request::route()->getName() == 'store.product.product_view' || \Request::route()->getName() == 'user-address.useraddress' || \Request::route()->getName() == 'store-payment.payment' || \Request::route()->getName() == 'customer.order' ? 'text-dark' : '';

                        ?>

                        <li class="nav-item align-items-center d-flex nav-item">
                            
                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>"
                                    class="nav-heart btn  ml-2 icon-font">
                                    <svg width="14" height="11" viewBox="0 0 14 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.28104 10.816L7.00066 9.70588L7.73831 10.8059C7.29288 11.061 6.73058 11.0649 6.28104 10.816ZM5.94502 1.94599C5.40383 1.60628 4.69678 1.29412 3.92584 1.29412C2.15782 1.29412 1.12007 2.4958 1.46598 4.14522C2.05823 6.9692 7.00066 9.70588 7.00066 9.70588C6.28104 10.816 6.28131 10.8162 6.28104 10.816L6.27824 10.8145L6.27363 10.8119L6.25911 10.8038C6.2471 10.797 6.23049 10.7876 6.20954 10.7757C6.16767 10.7518 6.10844 10.7176 6.03417 10.6739C5.88575 10.5864 5.67656 10.46 5.42518 10.3001C4.92434 9.98146 4.24646 9.52329 3.54432 8.96724C2.84615 8.41431 2.09728 7.74366 1.47274 6.99682C0.856963 6.26045 0.297325 5.37361 0.091352 4.39147C-0.143665 3.27085 0.0676085 2.1527 0.80853 1.29418C1.55422 0.430121 2.68948 0 3.92584 0C5.2026 0 6.26391 0.555807 6.92232 0.999458C6.94884 1.01733 6.97495 1.03518 7.00066 1.053C7.02636 1.03518 7.05248 1.01733 7.079 0.999458C7.73741 0.555807 8.79871 0 10.0755 0C12.8375 0 14.4309 2.36483 13.8978 4.44365C13.6534 5.39682 13.0871 6.26486 12.4702 6.99358C11.8447 7.73242 11.1053 8.39982 10.4174 8.95274C9.72601 9.50845 9.06246 9.96769 8.57284 10.2877C8.32717 10.4482 8.12312 10.5751 7.97846 10.6631C7.90609 10.7071 7.84843 10.7414 7.8077 10.7654C7.79739 10.7715 7.78816 10.7769 7.78004 10.7816C7.77213 10.7863 7.76528 10.7903 7.75953 10.7936L7.74545 10.8018L7.741 10.8043L7.73831 10.8059C7.73804 10.806 7.73831 10.8059 7.00066 9.70588C7.00066 9.70588 11.8169 6.94702 12.5353 4.14522C12.8812 2.79622 11.8435 1.29412 10.0755 1.29412C9.30453 1.29412 8.59749 1.60628 8.0563 1.94599C7.41033 2.35148 7.00066 2.79622 7.00066 2.79622C7.00066 2.79622 6.59098 2.35148 5.94502 1.94599Z"
                                            fill="white" />
                                    </svg>
                                    <span
                                        class="badge badge-floating badge-pill bg-white border-dark wishlist_count
                                    <?php echo e($counterDark); ?>">
                                    <?php if(!empty($wishlist)): ?>
                                    <?php echo e(count($wishlist)); ?>

                                <?php elseif(!empty($cart['wishlist'])): ?>
                                    <?php echo e(count($cart['wishlist'])); ?>

                                <?php else: ?>
                                    0
                                <?php endif; ?>
                                    </span>
                                </a>
                            <?php endif; ?>

                            
                            <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                                <div class="drop-down">
                                    <div id="dropDown" class="drop-down__button ">

                                        <a href="javascript:;"
                                            class="<?php echo e($counterDark == '' ? 'text-light' : $counterDark); ?> font-weight-bold  ">
                                            <?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?> </a>
                                    </div>
                                    <div class="drop-down__menu-box">
                                        <ul class="drop-down__menu">
                                            <li data-name="profile" class="drop-down__item">
                                                <a href="<?php echo e(route('store.slug', $store->slug)); ?>" class="nav-link">
                                                    <?php echo e(__('My Dashboard')); ?>

                                                </a>
                                            </li>
                                            <li data-name="activity" class="drop-down__item">
                                                <a href="" data-size="lg"
                                                    data-url="<?php echo e(route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)])); ?>"
                                                    data-ajax-popup="true" data-title="<?php echo e(__('Edit Profile')); ?>"
                                                    data-toggle="modal" class="nav-link">
                                                    <?php echo e(__('My Profile')); ?>

                                                </a>
                                            </li>
                                            <li data-name="activity" class="drop-down__item">
                                                <a href="<?php echo e(route('customer.home', $store->slug)); ?>"
                                                    class="nav-link">
                                                    <?php echo e(__('My Orders')); ?>

                                                </a>
                                            </li>
                                            <li class="drop-down__item">
                                                <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                                    <a href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                                        class="nav-link">
                                                        <?php echo e(__('Sign in')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                        class="nav-link">
                                                        <?php echo e(__('Logout')); ?>

                                                    </a>
                                                    <form id="customer-frm-logout"
                                                        action="<?php echo e(route('customer.logout', $store->slug)); ?>"
                                                        method="POST" class="d-none">
                                                        <?php echo e(csrf_field()); ?>

                                                    </form>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(route('customer.login', $store->slug)); ?>"
                                    class="nav-heart btn mr-0 icon-font">
                                    <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.16667 14.6676H3.05556C2.71805 14.6676 2.44444 14.394 2.44444 14.0565C2.44444 13.719 2.71805 13.4454 3.05556 13.4454H9.16667C9.50417 13.4454 9.77778 13.1717 9.77778 12.8342V10.2981C9.74701 9.95521 9.54135 9.6525 9.23389 9.49757C6.83856 8.53046 4.16144 8.53046 1.76611 9.49757C1.45865 9.6525 1.25299 9.95521 1.22222 10.2981V14.0565C1.22222 14.394 0.948618 14.6676 0.611111 14.6676C0.273604 14.6676 0 14.394 0 14.0565V10.2981C0.0270247 9.4546 0.535525 8.70135 1.30778 8.36091C3.99696 7.27423 7.00304 7.27423 9.69222 8.36091C10.4645 8.70135 10.973 9.4546 11 10.2981V12.8342C11 13.8468 10.1792 14.6676 9.16667 14.6676ZM8.55545 3.05556C8.55545 1.36802 7.18743 0 5.49989 0C3.81235 0 2.44434 1.36802 2.44434 3.05556C2.44434 4.74309 3.81235 6.11111 5.49989 6.11111C7.18743 6.11111 8.55545 4.74309 8.55545 3.05556ZM7.33317 3.05599C7.33317 4.06851 6.51236 4.88932 5.49984 4.88932C4.48732 4.88932 3.6665 4.06851 3.6665 3.05599C3.6665 2.04347 4.48732 1.22266 5.49984 1.22266C6.51236 1.22266 7.33317 2.04347 7.33317 3.05599Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                            
                            <a href="<?php echo e(route('store.cart', $store->slug)); ?>" class="nav-heart btn icon-font">
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.2919 8.13529H5.50403C4.5856 8.13555 3.79748 7.48102 3.6291 6.57815L2.74566 1.79231C2.68975 1.48654 2.42089 1.26607 2.11009 1.27114H0.63557C0.284554 1.27114 0 0.986585 0 0.63557C0 0.284554 0.284554 7.71206e-08 0.63557 7.71206e-08H2.1228C3.04124 -0.000259399 3.82935 0.654274 3.99773 1.55715L4.88118 6.34299C4.93709 6.64876 5.20595 6.86922 5.51675 6.86415H12.2983C12.6091 6.86922 12.8779 6.64876 12.9338 6.34299L13.7347 2.02111C13.769 1.83381 13.7175 1.64099 13.5944 1.49571C13.4713 1.35044 13.2895 1.26802 13.0991 1.27114H5.72013C5.36911 1.27114 5.08456 0.986585 5.08456 0.63557C5.08456 0.284554 5.36911 7.71206e-08 5.72013 7.71206e-08H13.0927C13.6597 -0.000160116 14.1974 0.252022 14.5597 0.688097C14.9221 1.12417 15.0716 1.6989 14.9677 2.25627L14.1669 6.57815C13.9985 7.48102 13.2104 8.13555 12.2919 8.13529ZM8.26264 10.6782C8.26264 9.62515 7.40897 8.77148 6.35593 8.77148C6.00491 8.77148 5.72036 9.05604 5.72036 9.40705C5.72036 9.75807 6.00491 10.0426 6.35593 10.0426C6.70694 10.0426 6.9915 10.3272 6.9915 10.6782C6.9915 11.0292 6.70694 11.3138 6.35593 11.3138C6.00491 11.3138 5.72036 11.0292 5.72036 10.6782C5.72036 10.3272 5.4358 10.0426 5.08479 10.0426C4.73377 10.0426 4.44922 10.3272 4.44922 10.6782C4.44922 11.7312 5.30288 12.5849 6.35593 12.5849C7.40897 12.5849 8.26264 11.7312 8.26264 10.6782ZM12.076 11.9493C12.076 11.5983 11.7914 11.3138 11.4404 11.3138C11.0894 11.3138 10.8048 11.0292 10.8048 10.6782C10.8048 10.3272 11.0894 10.0426 11.4404 10.0426C11.7914 10.0426 12.076 10.3272 12.076 10.6782C12.076 11.0292 12.3605 11.3138 12.7115 11.3138C13.0626 11.3138 13.3471 11.0292 13.3471 10.6782C13.3471 9.62515 12.4934 8.77148 11.4404 8.77148C10.3874 8.77148 9.53369 9.62515 9.53369 10.6782C9.53369 11.7312 10.3874 12.5849 11.4404 12.5849C11.7914 12.5849 12.076 12.3003 12.076 11.9493Z"
                                        fill="white" />
                                </svg>
                                <span
                                    class="badge badge-floating badge-pill bg-white border-dark
                                <?php echo e($counterDark); ?>

                                 "
                                    id="shoping_counts">
                                    <?php echo e(!empty($total_item) ? $total_item : '0'); ?></span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0 align-items-center d-flex nav-item" href="#"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <img src="<?php echo e(asset('assets/img/1737380_banking_connections_earth_globe_icon.svg')); ?>"
                                    alt="">
                                <?php echo e(Str::upper($currantLang)); ?>

                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>"
                                        class="dropdown-item <?php if($language == $currantLang): ?> active-language text-primary <?php endif; ?>">
                                        <span> <?php echo e(Str::upper($language)); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages();

        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    ?>



    <?php echo $__env->yieldContent('content'); ?>

    <footer id="footer-main" class="mt-3">
        <div class="container">

            <div class="row pt-md top-footer pb-2">
                <!-- subscriber-->

                <?php if(!empty($getStoreThemeSetting[9])): ?>
                    <?php if($getStoreThemeSetting[9]['section_enable'] == 'on'): ?>
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                <img src="<?php echo e($imgpath . $getStoreThemeSetting[9]['inner-list'][0]['field_default_text']); ?>"
                                    alt="Footer logo" style="height: 53%;" class="footerlogo">
                            </a>
                        </div>



                        <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $storethemesetting['inner-list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyy => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($theme['field_name'] == 'Enable Quick Link 1'): ?>
                                    <?php if($getStoreThemeSetting[10]['inner-list'][0]['field_default_text'] == 'on'): ?>
                                        <?php if(!empty($getStoreThemeSetting[10])): ?>
                                            <?php if((isset($getStoreThemeSetting[10]['section_enable']) &&
                                                $getStoreThemeSetting[10]['section_enable'] == 'on') ||
                                                $getStoreThemeSetting[10]['inner-list'][1]['field_default_text']): ?>
                                                <div class="col-6 col-lg-2 col-md-2 col-sm-4 mb-4 ml-lg-auto">
                                                    <h6
                                                        class="font-size-12 heading ls-2 mb-3 text-secondary text-uppercase">
                                                        <?php echo e(__($getStoreThemeSetting[10]['inner-list'][1]['field_default_text'])); ?>

                                                    </h6>
                                                    <ul class="list-unstyled">
                                                        <?php if(isset(
                                                            $getStoreThemeSetting[11]['homepage-header-quick-link-name-1'],
                                                            $getStoreThemeSetting[11]['homepage-header-quick-link-1'])): ?>
                                                            <?php $__currentLoopData = $getStoreThemeSetting[11]['homepage-header-quick-link-name-1']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name_key => $storethemesettingname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = $getStoreThemeSetting[11]['homepage-header-quick-link-1']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link_key => $storethemesettinglink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($name_key == $link_key): ?>
                                                                        <li>
                                                                            <a class="font-size-12 text-secondary"
                                                                                href="<?php echo e($storethemesettinglink); ?>">
                                                                                <?php echo e($storethemesettingname); ?>

                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php for($i = 0; $i < $getStoreThemeSetting[11]['loop_number']; $i++): ?>
                                                                <li>
                                                                    <a class="font-size-12 text-secondary"
                                                                        href="<?php echo e($getStoreThemeSetting[11]['inner-list'][1]['field_default_text']); ?>">
                                                                        <?php echo e($getStoreThemeSetting[11]['inner-list'][0]['field_default_text']); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>

                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($getStoreThemeSetting[12]['inner-list'][0]['field_default_text'] == 'on'): ?>
                                        <?php if(!empty($getStoreThemeSetting[12])): ?>
                                            <?php if((isset($getStoreThemeSetting[12]['section_enable']) &&
                                                $getStoreThemeSetting[12]['section_enable'] == 'on') ||
                                                $getStoreThemeSetting[12]['inner-list'][1]['field_default_text']): ?>
                                                <div class="col-6 col-lg-2 col-md-2 col-sm-4 mb-4">
                                                    <h6
                                                        class="font-size-12 heading ls-2 mb-3 text-secondary text-uppercase">
                                                        <?php echo e(__($getStoreThemeSetting[12]['inner-list'][1]['field_default_text'])); ?>

                                                    </h6>
                                                    <ul class="list-unstyled">
                                                        <?php if(isset(
                                                            $getStoreThemeSetting[13]['homepage-header-quick-link-name-2'],
                                                            $getStoreThemeSetting[13]['homepage-header-quick-link-2'])): ?>
                                                            <?php $__currentLoopData = $getStoreThemeSetting[13]['homepage-header-quick-link-name-2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name_key => $storethemesettingname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = $getStoreThemeSetting[13]['homepage-header-quick-link-2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link_key => $storethemesettinglink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($name_key == $link_key): ?>
                                                                        <li><a class="font-size-12 text-secondary"
                                                                                href="<?php echo e($storethemesettinglink); ?>">
                                                                                <?php echo e($storethemesettingname); ?></a></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php for($i = 0; $i < $getStoreThemeSetting[13]['loop_number']; $i++): ?>
                                                                <li><a class="font-size-12 text-secondary"
                                                                        href="<?php echo e($getStoreThemeSetting[13]['inner-list'][1]['field_default_text']); ?>">
                                                                        <?php echo e($getStoreThemeSetting[13]['inner-list'][0]['field_default_text']); ?></a>
                                                                </li>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>

                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($getStoreThemeSetting[14]['inner-list'][1]['field_default_text'] == 'on'): ?>
                                        <?php if(!empty($getStoreThemeSetting[14])): ?>
                                            <?php if((isset($getStoreThemeSetting[14]['section_enable']) &&
                                                $getStoreThemeSetting[14]['section_enable'] == 'on') ||
                                                $getStoreThemeSetting[14]['inner-list'][1]['field_default_text']): ?>
                                                <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                                                    <h6
                                                        class="font-size-12 heading ls-2 mb-3 text-secondary text-uppercase">
                                                        <?php echo e(__($getStoreThemeSetting[14]['inner-list'][0]['field_default_text'])); ?>

                                                    </h6>
                                                    <ul class="list-unstyled">
                                                        <?php if(isset(
                                                            $getStoreThemeSetting[15]['homepage-header-quick-link-name-3'],
                                                            $getStoreThemeSetting[15]['homepage-header-quick-link-3'])): ?>
                                                            <?php $__currentLoopData = $getStoreThemeSetting[15]['homepage-header-quick-link-name-3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name_key => $storethemesettingname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = $getStoreThemeSetting[15]['homepage-header-quick-link-3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link_key => $storethemesettinglink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($name_key == $link_key): ?>
                                                                        <li><a class="font-size-12 text-secondary"
                                                                                href="<?php echo e($storethemesettinglink); ?>">
                                                                                <?php echo e($storethemesettingname); ?></a></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php for($i = 0; $i < $getStoreThemeSetting[15]['loop_number']; $i++): ?>
                                                                <li><a class="font-size-12 text-secondary"
                                                                        href="<?php echo e($getStoreThemeSetting[15]['inner-list'][1]['field_default_text']); ?>">
                                                                        <?php echo e($getStoreThemeSetting[15]['inner-list'][0]['field_default_text']); ?></a>
                                                                </li>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>

                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>

            </div>

            <div class="row align-items-center  pt-2 pb-4">
                <?php if($getStoreThemeSetting[16]['section_enable'] == 'on'): ?>
                    <div class="align-items-center d-sm-flex justify-content-between col-12">
                        <div class="copyright font-size-12 text-md-left">
                            <?php if($getStoreThemeSetting[16]['section_enable'] == 'on'): ?>
                                <?php echo e($getStoreThemeSetting[16]['inner-list'][0]['field_default_text']); ?>

                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if($getStoreThemeSetting[16]['section_enable'] == 'on'): ?>

                                <ul class="list-inline footer-social">
                                    <?php if(isset($getStoreThemeSetting[17]['homepage-footer-2-social-icon']) ||
                                        isset($getStoreThemeSetting[17]['homepage-footer-2-social-link'])): ?>
                                        <?php if(isset($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']) &&
                                            isset($getStoreThemeSetting[17]['inner-list'][0]['field_default_text'])): ?>
                                            <?php $__currentLoopData = $getStoreThemeSetting[17]['homepage-footer-2-social-icon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon_key => $storethemesettingicon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $getStoreThemeSetting[17]['homepage-footer-2-social-link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link_key => $storethemesettinglink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($icon_key == $link_key): ?>
                                                        <li class="d-inline-block mr-2">
                                                            <a href="<?php echo e($storethemesettinglink); ?>"
                                                                class="d-flex align-items-center justify-content-center">
                                                                <?php echo $storethemesettingicon; ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php for($i = 0; $i < $getStoreThemeSetting[17]['loop_number']; $i++): ?>
                                            <?php if(isset($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']) &&
                                                isset($getStoreThemeSetting[17]['inner-list'][0]['field_default_text'])): ?>
                                                <li class="d-inline-block mr-2">
                                                    <a class="d-flex align-items-center justify-content-center footer-icon"
                                                        href="<?php echo e($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']); ?>"
                                                        target="_blank">
                                                        <?php echo $getStoreThemeSetting[17]['inner-list'][0]['field_default_text']; ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </ul>

                            <?php endif; ?>
                        </div>

                    </div>
                <?php endif; ?>
            </div>

        </div>
    </footer>


    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <div class="modal-title">
                        <h6 class="mb-0" id="modelCommanModelLabel"></h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    

    <script src="<?php echo e(asset('assets/theme6/js/purpose.core.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/swiper.min.js')); ?>"></script>
    <script href="<?php echo e(asset('assets/theme6/js/storego.js')); ?>"></script>
    <script href="<?php echo e(asset('assets/theme6/js/regular.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme6/js/purpose.js')); ?>"></script>
    <script>
        var dataTabelLang = {
            paginate: {
                previous: "<?php echo e('Previous'); ?>",
                next: "<?php echo e('Next'); ?>"
            },
            lengthMenu: "<?php echo e('Show'); ?> MENU <?php echo e('entries'); ?>",
            zeroRecords: "<?php echo e('No data available in table'); ?>",
            info: "<?php echo e('Showing'); ?> START <?php echo e('to'); ?> END <?php echo e('of'); ?> TOTAL <?php echo e('entries'); ?>",
            infoEmpty: " ",
            search: "<?php echo e('Search:'); ?>"
        }
    </script>

    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>


    <?php if(App\Models\Utility::getValByName('gdpr_cookie') == 'on'): ?>
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "<?php echo e(App\Models\Utility::getValByName('cookie_text')); ?>"
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'cookieNoticePosition': 'bottom',
                'learnMoreLinkEnabled': false,
                'learnMoreLinkHref': '/cookie-banner-information.html',
                'learnMoreLinkText': {
                    'it': 'Saperne di più',
                    'en': 'Learn more',
                    'de': 'Mehr erfahren',
                    'fr': 'En savoir plus'
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'expiresIn': 30,
                'buttonBgColor': '#d35400',
                'buttonTextColor': '#fff',
                'noticeBgColor': '#000',
                'noticeTextColor': '#fff',
                'linkColor': '#009fdd'
            };
        </script>
        <script src="<?php echo e(asset('custom/js/cookie.notice.js')); ?>"></script>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('script-page'); ?>

    <?php if(Session::has('success')): ?>
        <script>
            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>


    <?php
        $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($store_settings->google_analytic); ?>"></script>

    <?php echo $store_settings->storejs; ?>

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
                url: '<?php echo e(route('user.addToCart', ['__product_id', $store->slug, 'variation_id'])); ?>'
                    .replace(
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
    <script>
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
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '<?php echo e($store_settings->google_analytic); ?>');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo e($store_settings->fbpixel_code); ?>');
        fbq('track', 'PageView');
    </script>

    <script type="text/javascript">
        // $(function() {
        //     $(".drop-down__button ").on("click", function(e) {
        //         $(".drop-down").addClass("drop-down--active");
        //         e.stopPropagation()
        //     });
        //     $(document).on("click", function(e) {
        //         if ($(e.target).is(".drop-down") === false) {
        //             $(".drop-down").removeClass("drop-down--active");
        //         }
        //     });
        // });

        // drop-down__button
        $("#dropDown").click(function() {
            $(".drop-down__menu-box").slideToggle();
        });
    </script>
    <script>
        $('.close-btn').click(function() {
            $('#navbar-top-main').hide();
        });
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($store_settings->fbpixel_code); ?>" /></noscript>

</body>
<?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/layout/theme6.blade.php ENDPATH**/ ?>