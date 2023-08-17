    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Quản lý</li>

                    <li>
                        <a href="{{url('admin')}}" class="waves-effect">
                            <i class="fas fa-home"></i>
                            <span> Home </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.order')}}" class="waves-effect">
                            <i class="fas fa-home"></i>
                            <span> Order </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.category.index')}}" class="waves-effect">
                            <i class="fas fa-list-ul"></i>
                            <span> Danh mục </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-tshirt"></i>
                            <span> Sản phẩm </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.product.index')}}">Sản phẩm</a></li>
                            <li><a href="{{route('admin.attribute.index')}}">Quản lý thuộc tính</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.coupon.index')}}" class="waves-effect">
                            <i class="fas fa-tshirt"></i>
                            <span> Mã giảm giá </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
