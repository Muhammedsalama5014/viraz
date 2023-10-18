<!DOCTYPE html>
<html lang="en" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">
@php

$userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
$s_logo = \App\Models\Utility::get_file('uploads/store_logo/');
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

$data = DB::table('settings');

$data = $data
    ->where('created_by', '>', 1)
    ->where('store_id', $store->id)
    ->where('name', 'SITE_RTL')
    ->first();
    $imgpath=\App\Models\Utility::get_file('uploads/');
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ ucfirst(env('APP_NAME')) }} - {{ ucfirst($store->tagline) }}">

    <meta name="keywords" content="{{ $store->metakeyword }}">
    <meta name="description" content="{{ $store->metadesc }}">

    <title>@yield('page-title') - {{ $store->tagline ? $store->tagline : env('APP_NAME', ucfirst($store->name)) }}
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ asset(Storage::url('uploads/logo/') . (!empty($setting->value) ? $setting->value : 'favicon.png')) }}"
        type="image/png">

    <link rel="stylesheet" href="{{ asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme1/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/libs/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme1/css/purpose.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme1/css/storego.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/theme1/css/' . (!empty($store->store_theme) ? $store->store_theme : 'green-color.css')) }}">
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @if (isset($data->value) && $data->value == 'on')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css ') }}">
    @endif



    @stack('css-page')
</head>

<body>
    @php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages();
        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);

    @endphp
    <header class="header" id="header-main">
        <!-- Topbar -->
        {{-- @DD($getStoreThemeSetting) --}}
        @if ($storethemesetting['enable_top_bar'] == 'on')
            <div id="navbar-top-main" class="navbar-top bg-l-gray">
                <div class="container px-0">
                    <div class="navbar-nav align-items-center">
                        <div class="d-none d-lg-inline-block">
                            <span class="navbar-text mr-3 t-gray top-header-text pl-2">
                                <i class="fas fa-bell"></i>
                                {{ !empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '' }}<b>
                                    {{ __('FREE SHIPPING ') }}</b>{{ __("world wide for all orders over $199") }}
                            </span>
                        </div>
                        <div class="ml-auto">
                            <ul class="nav topbar-social">
                                <li class="nav-item">
                                    <a href="tel:{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}"
                                        class="nav-link">
                                        <i class="fas fa-phone-volume"></i> <span
                                            class="text-primary mr-2">{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '(212) 308-1220' }}</span>
                                        {{ __('Request a call') }}</a>
                                </li>
                                @if (!empty($storethemesetting['top_bar_whatsapp']))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="https://wa.me/{{ $storethemesetting['top_bar_whatsapp'] }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty($storethemesetting['top_bar_instagram']))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $storethemesetting['top_bar_instagram'] }}"
                                            target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty($storethemesetting['top_bar_twitter']))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $storethemesetting['top_bar_twitter'] }}"
                                            target="_blank">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty($storethemesetting['top_bar_messenger']))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $storethemesetting['top_bar_messenger'] }}"
                                            target="_blank">
                                            <i class="far fa-envelope"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Main navbar -->
        <nav class="navbar navbar-main navbar-expand-lg navbar-transparent" id="navbar-main">
            <div class="container px-lg-0">
                <!-- Logo -->
                <a class="navbar-brand mr-lg-5" href="{{ route('store.slug', $store->slug) }}">
                    {{-- @if (!empty($store->logo))
                        <img alt="Image placeholder"
                            src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}" id="navbar-logo"
                            style="height: 40px;">
                    @else
                        <img alt="Image placeholder" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                            id="navbar-logo" style="height: 40px;">
                    @endif --}}
                    <img src="{{ $s_logo . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png') }}" style="height: 40px;"  id="navbar-logo">
                </a>
                <!-- Navbar collapse trigger -->
                <button class="navbar-toggler pr-0" type="button" data-toggle="collapse"
                    data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar nav -->
                <div class="collapse navbar-collapse" id="navbar-main-collapse">
                    <ul class="navbar-nav align-items-lg-center">
                        <!-- Home - Overview  -->
                        <li class="nav-item ">
                            <a class="nav-link"
                                href="{{ route('store.slug', $store->slug) }}">{{ ucfirst($store->name) }}</a>
                        </li>
                        @if (!empty($page_slug_urls))
                            @foreach ($page_slug_urls as $k => $page_slug_url)
                                @if ($page_slug_url->enable_page_header == 'on')
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ env('APP_URL') . '/page/' . $page_slug_url->slug }}">{{ ucfirst($page_slug_url->name) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        @if ($store['blog_enable'] == 'on' && !empty($blog))
                            <li class="nav-item ">
                                <a class="nav-link"
                                    href="{{ route('store.blog', $store->slug) }}">{{ __('Blog') }}</a>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto nav-my-store">
                        <li class="nav-item d-lg-none d-xl-block">
                            <div class="form-group header-search">
                                <form
                                    action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                    method="get">
                                    @csrf
                                    <div class="input-group input-group-lg input-group-merge rounded-pill bg--gray">
                                        <div class="input-group-append">
                                            <button type="submit"
                                                class="btn btn-block bg--gray rounded-pill border-0"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                        <input type="text" name="search_data"
                                            class="form-control form-control-flush"
                                            placeholder="Type your product...">
                                    </div>
                                </form>
                            </div>
                        </li>
                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                            <li class="nav-item">
                                <a href="{{ route('store.wishlist', $store->slug) }}"
                                    class="nav-heart btn  ml-2 bg--gray rounded-pill hover-translate-y-n3 icon-font">
                                    <i class="fas fa-heart"></i>
                                    <span
                                        class="badge badge-pill badge-floating border-dark wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('store.cart', $store->slug) }}"
                                class="nav-heart btn btn-primary ml-2 mr-2 rounded-pill hover-translate-y-n3 ">
                                <i class="fas fa-shopping-basket"></i>
                                <p class="badge badge-pill badge-floating bg-green border-dark shoping_counts"
                                    id="shoping_counts">
                                    {{ !empty($total_item) ? $total_item : '0' }}
                                </p>
                            </a>
                        </li>
                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                            <div class="drop-down">
                                <div id="dropDown" class="drop-down__button ">
                                    <a class="nav-link btn bg--gray hover-translate-y-n3 icon-font d-flex align-items-center justify-content-between"
                                        style="border-radius: 6px;    min-width: 140px;">{{ ucFirst(Auth::guard('customers')->user()->name) }}
                                        <i class="fas fa-sort-down ml-2 mr-0 down_icon"></i>
                                    </a>
                                </div>
                                <div class="drop-down__menu-box">
                                    <ul class="drop-down__menu">
                                        <li data-name="profile" class="drop-down__item">
                                            <a href="{{ route('store.slug', $store->slug) }}" class="nav-link">
                                                {{ __('My Dashboard') }}
                                            </a>
                                        </li>
                                        <li data-name="activity" class="drop-down__item">
                                            <a href="" data-size="lg"
                                                data-url="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}"
                                                data-ajax-popup="true" data-title="{{ __('Edit Profile') }}"
                                                data-toggle="modal" class="nav-link">
                                                {{ __('My Profile') }}
                                            </a>
                                        </li>
                                        <li data-name="activity" class="drop-down__item">
                                            <a href="{{ route('customer.home', $store->slug) }}" class="nav-link">
                                                {{ __('My Orders') }}
                                            </a>
                                        </li>
                                        <li>
                                            @if (Utility::CustomerAuthCheck($store->slug) == false)
                                                <a href="{{ route('customer.login', $store->slug) }}"
                                                    class="nav-link">
                                                    {{ __('Sign in') }}
                                                </a>
                                            @else
                                                <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                    class="nav-link">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="customer-frm-logout"
                                                    action="{{ route('customer.logout', $store->slug) }}"
                                                    method="POST" class="d-none">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <!--  <div class="profile-dropdown custom">
                                <button onclick="myFunction()" class="profile-dropdown-btn dropbtn">
                                    <div class="dropbtn-main d-flex align-items-center">
                                        <div class="user-profile-img">
                                            @if (!empty(Auth::guard('customers')->user()->avatar) &&
                                                file_exists(asset(Storage::url('uploads/profile/' . Auth::guard('customers')->user()->avatar))))
<img src="{{ asset(Storage::url('uploads/profile/' . Auth::guard('customers')->user()->avatar)) }}" alt="user" class="img-fluid">
@else
<img src="{{ asset('assets/img/user.png') }}" alt="user" class="img-fluid">
@endif
                                        </div>
                                        <span>{{ Auth::guard('customers')->user()->name }}</span>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </div>
                                </button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="{{ route('store.slug', $store->slug) }}">
                                        <span>
                                             <img src="{{ asset('assets/img/cube.svg') }}" alt="setting" class="img-fluid">
                                        </span>
                                        {{ __('My Dashboard') }}
                                    </a>
                                    <a href="" data-url="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}" data-size="lg" data-ajax-popup-blur="true" data-title="{{ __('Edit Profile') }}" data-toggle="modal">
                                    <span>
                                        <img src="{{ asset('assets/img/user.svg') }}" alt="user" class="img-fluid">
                                    </span>
                                        {{ __('My Profile') }}
                                    </a>
                                    <a href="{{ route('customer.home', $store->slug) }}">
                                    <span>
                                        <img src="{{ asset('assets/img/layer.svg') }}" alt="layer" class="img-fluid">
                                    </span>
                                        {{ __('My Products') }}
                                    </a>
                                    @if (Utility::CustomerAuthCheck($store->slug) == false)
<a href="{{ route('customer.login', $store->slug) }}">
                                        <span>
                                            <img src="{{ asset('assets/img/signup.svg') }}" alt="login" class="img-fluid">
                                        </span>
                                            {{ __('Sign in') }}
                                        </a>
@else
<a href="#" onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();">
                                        <span>
                                            <img src="{{ asset('assets/img/logout.svg') }}" alt="logout" class="img-fluid">
                                        </span>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="customer-frm-logout" action="{{ route('customer.logout', $store->slug) }}" method="POST" class="d-none">
                                            {{ csrf_field() }}
                                        </form>
@endif
                                </div>
                            </div> -->
                        @else
                            <li class="nav-item">
                                <a href="{{ route('customer.login', $store->slug) }}"
                                    class="nav-link btn  ml-2 bg--gray hover-translate-y-n3 icon-font"
                                    style="border-radius: 6px;">{{ __('Log in') }}</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-language"></i>
                                {{ Str::upper($currantLang) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                @foreach ($languages as $language)
                                    <a href="{{ route('change.languagestore', [$store->slug, $language]) }}"
                                        class="dropdown-item @if ($language == $currantLang) active-language text-primary @endif">
                                        <span> {{ Str::upper($language) }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')
    <footer id="footer-main">
        <div class="container">


                <div class="row pt-md top-footer delimiter-top">

                    @foreach ($getStoreThemeSetting as $key => $storethemesetting)
                        @foreach ($storethemesetting['inner-list'] as $keyy => $theme)
                            @if ($theme['field_slug'] == 'homepage-footer-logo')
                                @if ($storethemesetting['section_enable'] == 'on')
                                    <div class="col-lg-4 mb-5 mb-lg-0">
                                        <a href="{{ route('store.slug', $store->slug) }}">
                                            <img src="{{ $imgpath. $getStoreThemeSetting[7]['inner-list'][0]['field_default_text'] }}"
                                                alt="Footer logo" style="height: 40px;">
                                        </a>
                                    </div>
                                    @if($getStoreThemeSetting[8]['inner-list'][0]['field_default_text'] == 'on')

                                    <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                                        <ul class="list-unstyled f-list">
                                            @foreach ($getStoreThemeSetting as $key => $storethemesetting)
                                                @foreach ($storethemesetting['inner-list'] as $keyy => $theme)
                                                    @if ($theme['field_name'] == 'Enable Quick Link 1')
                                                        @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                            @if ($kk == 1)
                                                                <h6 class="heading mb-3 text-primary">
                                                                    {{ __($title['field_default_text']) }}
                                                                </h6>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @if (!empty($theme['field_slug'] == 'homepage-header-quick-link-name-1') &&
                                                        !empty($storethemesetting['homepage-header-quick-link-name-1']))
                                                        @foreach ($storethemesetting['homepage-header-quick-link-name-1'] as $keys => $th)
                                                            @foreach ($storethemesetting['homepage-header-quick-link-1'] as $link_key => $storethemesettinglink)
                                                                @if ($keys == $link_key)
                                                                    <li>
                                                                        <a class="t-gray" target="_blank"
                                                                            href="{{ $storethemesettinglink }}">
                                                                            {{ $th }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        @if ($theme['field_slug'] == 'homepage-header-quick-link-name-1')
                                                            @for ($i = 0; $i < $storethemesetting['loop_number']; $i++)
                                                                @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                                    @if ($kk == 0)
                                                                        <li>
                                                                            <a class="t-gray" target="_blank"
                                                                                href="{{ $kk == 1 ? $title['field_default_text'] : '' }}">
                                                                                {{ __($title['field_default_text']) }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endfor
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @if($getStoreThemeSetting[10]['inner-list'][0]['field_default_text'] == 'on')
                                    <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                                        <ul class="list-unstyled f-list">
                                            @foreach ($getStoreThemeSetting as $key => $storethemesetting)
                                                @foreach ($storethemesetting['inner-list'] as $keyy => $theme)
                                                    @if ($theme['field_name'] == 'Enable Quick Link 2')
                                                        {{-- @if (isset($storethemesetting['section_enable']) && $storethemesetting['section_enable'] == 'on') --}}
                                                        @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                            @if ($kk == 1)
                                                                <h6 class="heading mb-3 text-primary">
                                                                    {{ __($title['field_default_text']) }}
                                                                </h6>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @if (!empty($theme['field_slug'] == 'homepage-header-quick-link-name-2') &&
                                                        !empty($storethemesetting['homepage-header-quick-link-name-2']))
                                                        @foreach ($storethemesetting['homepage-header-quick-link-name-2'] as $keys => $th)
                                                            @foreach ($storethemesetting['homepage-header-quick-link-2'] as $link_key => $storethemesettinglink)
                                                                @if ($keys == $link_key)
                                                                    <li>
                                                                        <a class="t-gray" target="_blank"
                                                                            href="{{ $storethemesettinglink }}">
                                                                            {{ $th }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        {{-- @DD($theme) --}}

                                                        @if ($theme['field_slug'] == 'homepage-header-quick-link-name-2')
                                                            @for ($i = 0; $i < $storethemesetting['loop_number']; $i++)
                                                                @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                                    @if ($kk == 0)
                                                                        <li>
                                                                            <a class="t-gray" target="_blank"
                                                                                href="{{ $kk == 1 ? $title['field_default_text'] : '' }}">
                                                                                {{ __($title['field_default_text']) }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endfor
                                                        @endif
                                                    @endif
                                                    {{-- @endif --}}
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @if($getStoreThemeSetting[12]['inner-list'][1]['field_default_text'] == 'on')
                                    <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                                        <ul class="list-unstyled f-list">
                                            @foreach ($getStoreThemeSetting as $key => $storethemesetting)
                                                @foreach ($storethemesetting['inner-list'] as $keyy => $theme)
                                                    @if ($theme['field_name'] == 'Enable Quick Link 3')
                                                        @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                            @if ($kk == 0)
                                                                <h6 class="heading mb-3 text-primary">
                                                                    {{ __($title['field_default_text']) }}
                                                                </h6>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @if (!empty($theme['field_slug'] == 'homepage-header-quick-link-name-3') &&
                                                        !empty($storethemesetting['homepage-header-quick-link-name-3']))
                                                        @foreach ($storethemesetting['homepage-header-quick-link-name-3'] as $keys => $th)
                                                            @foreach ($storethemesetting['homepage-header-quick-link-3'] as $link_key => $storethemesettinglink)
                                                                @if ($keys == $link_key)
                                                                    <li>
                                                                        <a class="t-gray" target="_blank"
                                                                            href="{{ $storethemesettinglink }}">
                                                                            {{ $th }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        @if ($theme['field_slug'] == 'homepage-header-quick-link-name-3')
                                                            @for ($i = 0; $i < $storethemesetting['loop_number']; $i++)
                                                                @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                                    @if ($kk == 0)
                                                                        <li>
                                                                            <a class="t-gray" target="_blank"
                                                                                href="{{ $kk == 1 ? $title['field_default_text'] : '' }}">
                                                                                {{ __($title['field_default_text']) }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endfor
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @if($getStoreThemeSetting[14]['inner-list'][1]['field_default_text'] == 'on')
                                    <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                                        <ul class="list-unstyled f-list">
                                            @foreach ($getStoreThemeSetting as $key => $storethemesetting)
                                                @foreach ($storethemesetting['inner-list'] as $keyy => $theme)
                                                    @if ($theme['field_name'] == 'Enable Quick Link 4')
                                                        {{-- @if (isset($storethemesetting['section_enable']) && $storethemesetting['section_enable'] == 'on') --}}
                                                        @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                            @if ($kk == 0)
                                                                <h6 class="heading mb-3 text-primary">
                                                                    {{ __($title['field_default_text']) }}
                                                                </h6>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @if (!empty($theme['field_slug'] == 'homepage-header-quick-link-name-4') &&
                                                        !empty($storethemesetting['homepage-header-quick-link-name-4']))
                                                        @foreach ($storethemesetting['homepage-header-quick-link-name-4'] as $keys => $th)
                                                            @foreach ($storethemesetting['homepage-header-quick-link-4'] as $link_key => $storethemesettinglink)
                                                                @if ($keys == $link_key)
                                                                    <li>
                                                                        <a class="t-gray" target="_blank"
                                                                            href="{{ $storethemesettinglink }}">
                                                                            {{ $th }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        {{-- @DD($theme) --}}

                                                        @if ($theme['field_slug'] == 'homepage-header-quick-link-name-4')
                                                            @for ($i = 0; $i < $storethemesetting['loop_number']; $i++)
                                                                @foreach ($storethemesetting['inner-list'] as $kk => $title)
                                                                    @if ($kk == 0)
                                                                        <li>
                                                                            <a class="t-gray" target="_blank"
                                                                                href="{{ $kk == 1 ? $title['field_default_text'] : '' }}">
                                                                                {{ __($title['field_default_text']) }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endfor
                                                        @endif
                                                    @endif
                                                    {{-- @endif --}}
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                @endif
                            @endif
                        @endforeach
                    @endforeach


                </div>
                @if($getStoreThemeSetting[16]['section_enable'] == 'on')
            <div class="row align-items-center justify-content-md-between py-2 delimiter-top">

                @if ($getStoreThemeSetting[16]['section_enable'] == 'on')
                    <div class="col-md-6">
                        <div class="copyright text-sm font-weight-bold text-center text-md-left">
                            {{ $getStoreThemeSetting[16]['inner-list'][0]['field_default_text'] }}
                        </div>
                    </div>
                @endif

                <div class="col-md-6 footer-social">
                    <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <li class="nav-item d-flex align-items-center">
                            <p class="mb-0">Follow us on :</p>
                        </li>

                        @if (isset($getStoreThemeSetting[17]['homepage-footer-2-social-icon']) ||
                            isset($getStoreThemeSetting[17]['homepage-footer-2-social-link']))
                            @if (isset($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']) &&
                                isset($getStoreThemeSetting[17]['inner-list'][0]['field_default_text']))
                                @foreach ($getStoreThemeSetting[17]['homepage-footer-2-social-icon'] as $icon_key => $storethemesettingicon)
                                    @foreach ($getStoreThemeSetting[17]['homepage-footer-2-social-link'] as $link_key => $storethemesettinglink)
                                        @if ($icon_key == $link_key)
                                            <li class="nav-item storelinkicon">
                                                <a class="t-gray" target="_blank"
                                                    href="{{ $storethemesettinglink }}">
                                                    {!! $storethemesettingicon !!}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        @else
                            @for ($i = 0; $i < $getStoreThemeSetting[17]['loop_number']; $i++)
                                @if (isset($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']) &&
                                    isset($getStoreThemeSetting[17]['inner-list'][0]['field_default_text']))
                                    <li class="nav-item storelinkicon">
                                        <a class="nav-link"
                                            href="{{ $getStoreThemeSetting[17]['inner-list'][1]['field_default_text'] }}"
                                            target="_blank">
                                            {!! $getStoreThemeSetting[17]['inner-list'][0]['field_default_text'] !!}
                                        </a>
                                    </li>
                                @endif
                            @endfor
                        @endif

                    </ul>
                </div>

            </div>
@endif
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

    {{-- <script src="{{asset('assets/theme1/js/all.min.js')}}"></script> --}}
    <script src="{{ asset('assets/theme1/js/purpose.core.js') }}"></script>
    <script src="{{ asset('custom/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/theme1/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/theme1/js/purpose.js') }}"></script>
    <script src="{{ asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script>
        var dataTabelLang = {
            paginate: {
                previous: "{{ 'Previous' }}",
                next: "{{ 'Next' }}"
            },
            lengthMenu: "{{ 'Show' }} MENU {{ 'entries' }}",
            zeroRecords: "{{ 'No data available in table' }}",
            info: "{{ 'Showing' }} START {{ 'to' }} END {{ 'of' }} TOTAL {{ 'entries' }}",
            infoEmpty: " ",
            search: "{{ 'Search:' }}"
        }
    </script>
    <script src="{{ asset('custom/js/custom.js') }}"></script>






    @if (App\Models\Utility::getValByName('gdpr_cookie') == 'on')
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "{{ App\Models\Utility::getValByName('cookie_text') }}"
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
        <script src="{{ asset('custom/js/cookie.notice.js') }}"></script>
    @endif


    @stack('script-page')
    @if (Session::has('success'))
        <script>
            show_toastr('{{ __('Success') }}', '{!! session('success') !!}', 'success');
        </script>
        {{ Session::forget('success') }}
    @endif
    @if (Session::has('error'))
        <script>
            show_toastr('{{ __('Error') }}', '{!! session('error') !!}', 'error');
        </script>
        {{ Session::forget('error') }}
    @endif



    @php
        $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    @endphp
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $store_settings->google_analytic }}"></script>

    {!! $store_settings->storejs !!}

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ $store_settings->google_analytic }}');
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
        fbq('init', '{{ $store_settings->fbpixel_code }}');
        fbq('track', 'PageView');
    </script>



    <script>
        $(document).ready(function() {
            $('#dropDown').click(function() {
                $('.drop-down').toggleClass('drop-down--active');
            });
        });
    </script>


    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript={{ $store_settings->fbpixel_code }}" /></noscript>



    <script type="text/javascript">
        $(function() {
            $(".drop-down__button ").on("click", function(e) {
                $(".drop-down").addClass("drop-down--active");
                e.stopPropagation()
            });
            $(document).on("click", function(e) {
                if ($(e.target).is(".drop-down") === false) {
                    $(".drop-down").removeClass("drop-down--active");
                }
            });
        });
    </script>

</body>

</html>
