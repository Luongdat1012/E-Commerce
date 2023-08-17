<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <div class="sale-top-bar text-center bg-dark text-light">
                DEAL HOT - NHẬN VOUCHER 66K, ĐƠN TỪ 666K | MUA NGAY
            </div>
            <nav class="limiter-menu-desktop p-l-45">
                <!-- Logo desktop -->
                <a href="{{route('homePage')}}" class="logo">
                    <img src="{{asset('assets/images/icons/logo-01.png')}}" alt="IMG-LOGO"/>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        @foreach($categories as $category)
                            {{--                            Thêm js click thì add class="active-menu" vào thẻ li--}}
                            <li>
                                <a href="{{route('productsCategory',$category->slug)}}">{{$category->category_name}}</a>
                                @include('front_end.layout.ChildMenu',['categoryChild'=>$category])
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    <div class="search-box">
                        <form action="">
                            <input type="text" name="ip-search" placeholder="Search" class="input-search-box"/>
                            <div class="btn-search-box">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <div class="search-data p-4">
                                <div class="search-data-left">
                                    <h5 class="m-b-20">TRENDING</h5>
                                    <p class="search-tag">san pham 1</p>
                                    <p class="search-tag">san pham 1</p>
                                    <p class="search-tag">san pham 1</p>
                                    <p class="search-tag">san pham 1</p>
                                </div>
                                <div class="search-data-right">
                                    <h5 class="m-b-20 d-inline-block">Tìm kiếm nhiều nhất</h5>
                                    <a class="m-b-20 d-inline-block float-right view-all">View all >></a>
                                    <div class="search-data-right-product">
                                        <div class="owl-carousel owl-theme">
                                            <div class="item">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img1">
                                                        <img src="http://shopltd.com/assets/images/boo-product2.jpg"
                                                             class="rounded" alt="IMG-PRODUCT"/>
                                                        <a href="#"
                                                           class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                            Xem nhanh
                                                        </a>
                                                    </div>
                                                    <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                                        <div
                                                            class="block2-txt-child1 d-flex align-items-center flex-column">
                                                            <a href="product-detail.html"
                                                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                                                Áo phông trắng
                                                            </a>
                                                            <div class="stext-105 cl3">
                                                                <span class="normal-price discount">2000 đ</span>
                                                                <span class="special-price">1000 đ</span>
                                                            </div>
                                                        </div>

                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <a href="#"
                                                               class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                <img class="icon-heart1 dis-block trans-04"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-01.png"
                                                                     alt="ICON"/>
                                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                                                     alt="ICON"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="discount-number">-50%</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img1">
                                                        <img src="http://shopltd.com/assets/images/boo-product2.jpg"
                                                             class="rounded" alt="IMG-PRODUCT"/>
                                                        <a href="#"
                                                           class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                            Xem nhanh
                                                        </a>
                                                    </div>
                                                    <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                                        <div
                                                            class="block2-txt-child1 d-flex align-items-center flex-column">
                                                            <a href="product-detail.html"
                                                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                                                Áo phông trắng
                                                            </a>
                                                            <div class="stext-105 cl3">
                                                                <span class="normal-price discount">2000 đ</span>
                                                                <span class="special-price">1000 đ</span>
                                                            </div>
                                                        </div>

                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <a href="#"
                                                               class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                <img class="icon-heart1 dis-block trans-04"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-01.png"
                                                                     alt="ICON"/>
                                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                                                     alt="ICON"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="discount-number">-50%</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img1">
                                                        <img src="http://shopltd.com/assets/images/boo-product2.jpg"
                                                             class="rounded" alt="IMG-PRODUCT"/>
                                                        <a href="#"
                                                           class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                            Xem nhanh
                                                        </a>
                                                    </div>
                                                    <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                                        <div
                                                            class="block2-txt-child1 d-flex align-items-center flex-column">
                                                            <a href="product-detail.html"
                                                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                                                Áo phông trắng
                                                            </a>
                                                            <div class="stext-105 cl3">
                                                                <span class="normal-price discount">2000 đ</span>
                                                                <span class="special-price">1000 đ</span>
                                                            </div>
                                                        </div>

                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <a href="#"
                                                               class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                <img class="icon-heart1 dis-block trans-04"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-01.png"
                                                                     alt="ICON"/>
                                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                                                     alt="ICON"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="discount-number">-50%</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img1">
                                                        <img src="http://shopltd.com/assets/images/boo-product2.jpg"
                                                             class="rounded" alt="IMG-PRODUCT"/>
                                                        <a href="#"
                                                           class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                            Xem nhanh
                                                        </a>
                                                    </div>
                                                    <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                                        <div
                                                            class="block2-txt-child1 d-flex align-items-center flex-column">
                                                            <a href="product-detail.html"
                                                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                                                Áo phông trắng
                                                            </a>
                                                            <div class="stext-105 cl3">
                                                                <span class="normal-price discount">2000 đ</span>
                                                                <span class="special-price">1000 đ</span>
                                                            </div>
                                                        </div>

                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <a href="#"
                                                               class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                <img class="icon-heart1 dis-block trans-04"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-01.png"
                                                                     alt="ICON"/>
                                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                                                     alt="ICON"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="discount-number">-50%</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img1">
                                                        <img src="http://shopltd.com/assets/images/boo-product2.jpg"
                                                             class="rounded" alt="IMG-PRODUCT"/>
                                                        <a href="#"
                                                           class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                            Xem nhanh
                                                        </a>
                                                    </div>
                                                    <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                                        <div
                                                            class="block2-txt-child1 d-flex align-items-center flex-column">
                                                            <a href="product-detail.html"
                                                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                                                Áo phông trắng
                                                            </a>
                                                            <div class="stext-105 cl3">
                                                                <span class="normal-price discount">2000 đ</span>
                                                                <span class="special-price">1000 đ</span>
                                                            </div>
                                                        </div>

                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <a href="#"
                                                               class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                <img class="icon-heart1 dis-block trans-04"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-01.png"
                                                                     alt="ICON"/>
                                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                     src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                                                     alt="ICON"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="discount-number">-50%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <livewire:frontend.cart.cart-count-component/>
                    </div>

                    <div class="flex-c-m h-full p-lr-19">
                        @auth
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-account zmdi-hc-fw"></i>
                            </div>
                        @else
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11">
                                <a class="text-dark" href="{{route('login')}}">
                                    <i class="zmdi zmdi-account zmdi-hc-fw"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="http://shopltd.com/assets/images/icons/logo-01.png" alt="IMG-LOGO"/></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">
                <i class="zmdi zmdi-search"></i>
            </div>

            {{--          Live wire cart count  --}}
            <livewire:frontend.cart.cart-count-component/>
            <div class="icon-header-item text-dark p-l-10">
                <i class="zmdi zmdi-account zmdi-hc-fw"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
        </div>

        <!-- Search Box mobile -->
        <div class="search-box-mb">
            <div class="header-search-mb m-t-15 d-flex">
                <i class="fa fa-chevron-left p-lr-20" aria-hidden="true"></i>
                <input class="m-r-20 ip-search-mb" type="text" name="ip-search" placeholder="Search"/>
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="tag-search-mb m-lr-20">
                <h6 class="title-search-mb p-t-30 p-b-20">TRENDING</h6>
                <p class="search-tag d-inline-block">san pham 1</p>
                <p class="search-tag d-inline-block">san pham 1</p>
                <p class="search-tag d-inline-block">san pham 1</p>
                <p class="search-tag d-inline-block">san pham 1</p>
            </div>
            <div class="product-search-mb m-lr-20">
                <h6 class="title-search-mb p-t-30 p-b-20">PRODUCTS</h6>
                <div class="row owl-carousel owl-theme">
                    <div class="item">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img1">
                                <img src="http://shopltd.com/assets/images/boo-product2.jpg" class="rounded"
                                     alt="IMG-PRODUCT"/>
                                <a href="#"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Xem nhanh
                                </a>
                            </div>
                            <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                <div class="block2-txt-child1 d-flex align-items-center flex-column">
                                    <a href="product-detail.html"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                        Áo phông trắng
                                    </a>
                                    <div class="stext-105 cl3">
                                        <span class="normal-price discount">2000 đ</span>
                                        <span class="special-price">1000 đ</span>
                                    </div>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                             src="http://shopltd.com/assets/images/icons/icon-heart-01.png" alt="ICON"/>
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                             src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                             alt="ICON"/>
                                    </a>
                                </div>
                            </div>
                            <div class="discount-number">-50%</div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img1">
                                <img src="http://shopltd.com/assets/images/boo-product2.jpg" class="rounded"
                                     alt="IMG-PRODUCT"/>
                                <a href="#"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Xem nhanh
                                </a>
                            </div>
                            <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                <div class="block2-txt-child1 d-flex align-items-center flex-column">
                                    <a href="product-detail.html"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                        Áo phông trắng
                                    </a>
                                    <div class="stext-105 cl3">
                                        <span class="normal-price discount">2000 đ</span>
                                        <span class="special-price">1000 đ</span>
                                    </div>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                             src="http://shopltd.com/assets/images/icons/icon-heart-01.png" alt="ICON"/>
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                             src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                             alt="ICON"/>
                                    </a>
                                </div>
                            </div>
                            <div class="discount-number">-50%</div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img1">
                                <img src="http://shopltd.com/assets/images/boo-product2.jpg" class="rounded"
                                     alt="IMG-PRODUCT"/>
                                <a href="#"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Xem nhanh
                                </a>
                            </div>
                            <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                                <div class="block2-txt-child1 d-flex align-items-center flex-column">
                                    <a href="product-detail.html"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                        Áo phông trắng
                                    </a>
                                    <div class="stext-105 cl3">
                                        <span class="normal-price discount">2000 đ</span>
                                        <span class="special-price">1000 đ</span>
                                    </div>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                             src="http://shopltd.com/assets/images/icons/icon-heart-01.png" alt="ICON"/>
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                             src="http://shopltd.com/assets/images/icons/icon-heart-02.png"
                                             alt="ICON"/>
                                    </a>
                                </div>
                            </div>
                            <div class="discount-number">-50%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account box mobile -->
        <div class="acc-box-mb">
            <div class="acc-box-mb-login">
                <div class="acc-box-mb-login-header p-t-20 m-lr-20">
                    <span class="d-inline-block float-left fs-20">ĐĂNG NHẬP TÀI KHOẢN</span>
                    <i class="fa-solid fa-xmark d-inline-block float-r fs-27"></i>
                </div>
                <div class="account-login-mb m-t-50">
                    <div class="account-login-group">
                        <input type="text" required/>
                        <span class="account-login-group-bar"></span>
                        <label class="account-login-group-lable">Email/ Số điện thoại</label>
                    </div>
                    <div class="account-login-group m-t-35">
                        <input type="password" class="account-login-group-password" required/>
                        <!-- -slash -->
                        <i class="fa fa-eye account-login-group-show-password" aria-hidden="true"></i>
                        <span class="account-login-group-bar"></span>
                        <label class="account-login-group-lable">Password</label>
                    </div>
                    <div class="account-login-forgot-pw m-lr-20 m-b-30">
                        <a href="#" class="text-dark d-inline-block">
                            Quên mật khẩu ?
                        </a>
                        <div class="re-pw d-inline-block float-right">
                            <input type="checkbox" class="d-inline-block" id="re-pw"/>
                            <label for="re-pw" class="d-inline-block">Ghi nhớ mật khẩu</label>
                        </div>
                    </div>
                    <div class="account-login-btn m-lr-20 m-b-20">
                        <a href="#" class="account-login-btn-login d-block w-full">Đăng nhập</a>
                    </div>
                    <p class="m-lr-20 fs-20 text-dark m-b-20">
                        Bạn là khách hàng mới ?
                    </p>
                    <div class="account-login-btn m-lr-20 m-b-20">
                        <a href="#" class="account-login-btn-register d-block w-full">Đăng Ký</a>
                    </div>
                </div>
            </div>
            <div class="acc-box-mb-info d-none">
                <div class="acc-box-mb-login-header p-t-20 m-lr-20">
                    <span class="d-inline-block float-left fs-20">Xin chào <span>Lương Đạt</span></span>
                    <i class="fa-solid fa-xmark d-inline-block float-r fs-27"></i>
                </div>
                <div class="account-user w-full">
                    <div class="m-lr-20 m-t-50">
                        <div class="account-user-item flex-sb fs-16 m-tb-20">
                            <a class="text-dark" href="">Tài khoản</a>
                            <i class="fa-solid fa-fingerprint fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20">
                            <a class="text-dark" href="">Lịch sử đơn hàng</a>
                            <i class="fa-solid fa-bag-shopping fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20">
                            <a class="text-dark" href="">Địa chỉ giao hàng</a>
                            <i class="fa-solid fa-location-dot fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20">
                            <a class="text-dark" href="">Thay đổi mật khẩu</a>
                            <i class="fa-solid fa-pen-to-square fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20">
                            <a class="text-dark" href="">Sản phẩm yêu thích</a>
                            <i class="fa-solid fa-heart fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item">
                            <a href="#" class="d-block w-full text-center fs-16 account-user-item-logout">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <a href="#" class="text-white d-block text-center w-full">Flash sale</a>
            </li>
        </ul>

        <ul class="main-menu-m">
            @foreach($categories as $categoryChild)
                <li>
                    <a href="index.html">{{$categoryChild->category_name}}</a>
                    @if($categoryChild->getCategoryChildren->count())
                        <ul class="sub-menu-m ">
                            @foreach($categoryChild->getCategoryChildren as $item)
                                <li>
                                    <a href="index.html">{{$item->category_name}}</a>
                                    @if($categoryChild->getCategoryChildren->count())
                                        <ul class="sub-menu-m-child">
                                            @foreach($item->getCategoryChildren as $value)
                                                <li><a href="index.html">{{$value->category_name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <span class="arrow-menu-child-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                                    @endif
                                </li>
                            @endforeach

                        </ul>
                        <span class="arrow-main-menu-m">
                   <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
                    @endif

                </li>
            @endforeach

            <li>
                <a href="product.html">Shop</a>
            </li>

            <li>
                <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="blog.html">Blog</a>
            </li>

            <li>
                <a href="about.html">About</a>
            </li>

            <li>
                <a href="contact.html">Contact</a>
            </li>

            <li class="d-flex flex-m flex-sb">
                <a href="#" class="d-block">Wishlist</a>
                <i class="fa-solid fa-heart d-block fs-20 p-r-20"></i>
            </li>
        </ul>
    </div>
    <!-- Menu Account -->
    @if(Route::has('login'))
        <aside class="wrap-sidebar js-sidebar">
            <div class="s-full js-hide-sidebar"></div>
        @auth
            @if(Auth::user()->utype == 'ADM')
                <!-- Account menu after login -->
                    <div class="sidebar flex-col-l p-t-22 p-b-25">
                        <div class="flex-r w-full p-b-15 p-r-10">
                            <div class="fs-25 lh-10 cl2 p-lr-20 js-hide-sidebar flex-sb w-full">
                                <span>Xin chào <span>{{Auth::user()->name}}</span></span>
                                <i class="zmdi zmdi-close"></i>
                            </div>
                        </div>
                        <div class="account-user w-full">
                            <div class="m-lr-20">
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Thông tin cá nhân</a>
                                    <i class="fa-solid fa-fingerprint fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="{{route('user.order')}}">Thông tin đơn hàng</a>
                                    <i class="fa-solid fa-bag-shopping fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Địa chỉ giao hàng</a>
                                    <i class="fa-solid fa-location-dot fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Thay đổi mật khẩu</a>
                                    <i class="fa-solid fa-pen-to-square fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Sản phẩm yêu thích</a>
                                    <i class="fa-solid fa-heart fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="{{route('admin.dashboard')}}">Dashboard</a>
                                    <i class="fa-solid fa-heart fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item">
                                    <a href=""
                                       onclick="event.preventDefault(); document.getElementById('log-out-usr').submit()"
                                       class="d-block w-full text-center fs-16 account-user-item-logout">Đăng
                                        xuất</a>
                                    <form method="POST" id="log-out-usr" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end after login -->
            @else
                <!-- Account menu after login -->
                    <div class="sidebar flex-col-l p-t-22 p-b-25">
                        <div class="flex-r w-full p-b-15 p-r-10">
                            <div class="fs-25 lh-10 cl2 p-lr-20 js-hide-sidebar flex-sb w-full">
                                <span>Xin chào <span>{{Auth::user()->name}}</span></span>
                                <i class="zmdi zmdi-close"></i>
                            </div>
                        </div>
                        <div class="account-user w-full">
                            <div class="m-lr-20">
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Thông tin cá nhân</a>
                                    <i class="fa-solid fa-fingerprint fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Lịch sử đơn hàng</a>
                                    <i class="fa-solid fa-bag-shopping fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Địa chỉ giao hàng</a>
                                    <i class="fa-solid fa-location-dot fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Thay đổi mật khẩu</a>
                                    <i class="fa-solid fa-pen-to-square fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item flex-sb fs-16 m-tb-20">
                                    <a class="text-dark" href="">Sản phẩm yêu thích</a>
                                    <i class="fa-solid fa-heart fs-24 text-dark"></i>
                                </div>
                                <div class="account-user-item">
                                    <a href=""
                                       onclick="event.preventDefault(); document.getElementById('log-out-usr').submit()"
                                       class="d-block w-full text-center fs-16 account-user-item-logout">Đăng
                                        xuất</a>
                                    <form method="POST" id="log-out-usr" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end after login -->
                @endif

                {{--        @else--}}
                {{--            <!-- Login account -->--}}
                {{--                <div class="sidebar flex-col-l p-t-22 p-b-25 ">--}}
                {{--                    <div class="flex-r w-full p-b-15 p-r-10">--}}
                {{--                        <div class="fs-25 lh-10 cl2 p-lr-20 js-hide-sidebar flex-sb w-full">--}}
                {{--                            <span>ĐĂNG NHẬP TÀI KHOẢN</span>--}}
                {{--                            <i class="zmdi zmdi-close"></i>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <div class="account-login w-full">--}}
                {{--                        <form action="{{route('login')}}" method="POST">--}}
                {{--                            @csrf--}}
                {{--                            <div class="account-login-group">--}}
                {{--                                <input type="text" name="email" required autofocus/>--}}
                {{--                                <span class="account-login-group-bar"></span>--}}
                {{--                                <label class="account-login-group-lable">Email</label>--}}
                {{--                            </div>--}}
                {{--                            <div class="account-login-group m-t-35">--}}
                {{--                                <input type="password" name="password" class="account-login-group-password" required/>--}}
                {{--                                <!-- -slash -->--}}
                {{--                                <i class="fa fa-eye account-login-group-show-password" aria-hidden="true"></i>--}}
                {{--                                <span class="account-login-group-bar"></span>--}}
                {{--                                <label class="account-login-group-lable">Password</label>--}}
                {{--                            </div>--}}

                {{--                            <div class="account-login-forgot-pw m-lr-20 m-b-30">--}}
                {{--                                <a href="{{route('password.request')}}" class="text-dark d-inline-block"> Quên mật khẩu ? </a>--}}
                {{--                                <div class="re-pw d-inline-block float-right">--}}
                {{--                                    <input type="checkbox" name="remember" class="d-inline-block" id="re-pw"/>--}}
                {{--                                    <label for="re-pw" class="d-inline-block">Ghi nhớ mật khẩu</label>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <div class="account-login-btn m-lr-20 m-b-20">--}}
                {{--                                <button type="submit" class="account-login-btn-login d-block w-full">Đăng nhập</button>--}}
                {{--                            </div>--}}
                {{--                        </form>--}}
                {{--                        <p class="m-lr-20 fs-20 text-dark m-b-20">--}}
                {{--                            Bạn là khách hàng mới ?--}}
                {{--                        </p>--}}
                {{--                        <div class="account-login-btn m-lr-20 m-b-20">--}}
                {{--                            <a href="{{route('login')}}" class="account-login-btn-register d-block w-full">Đăng--}}
                {{--                                Ký</a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <!-- end Login account-->--}}

            @endif
        </aside>
    @endif
</header>

