<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">İdarəetmə paneli</h5>

                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item">
                    <a href="{{ route('index_page_view') }}"
                        class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>
                            Əsas Səhifə
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu {{ Request::segment(1) == 'products' ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="ph-bag"></i>
                        <span>Məhsullar</span>
                    </a>
                    <ul class="nav-group-sub collapse {{ Request::segment(1) == 'products' ? 'show' : '' }}">
                        
                        <li class="nav-item"><a href="{{route('categories_view')}}"
                            class="nav-link {{ Request::segment(1) == 'products' && Request::segment(2) == 'category-list' ? 'active' : '' }} ">Kateqoriya</a>
                    </li>
                    <li class="nav-item"><a href="{{route('products_view')}}"
                        class="nav-link {{ Request::segment(1) == 'products' && Request::segment(2) == 'product-list' ? 'active' : '' }} ">Siyahı</a>
                </li>


                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{ Request::segment(1) == 'teachers' ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="ph-command"></i>
                        <span>Sifarişlər</span>
                    </a>
                    <ul class="nav-group-sub collapse {{ Request::segment(1) == 'teachers' ? 'show' : '' }}">
                        <li class="nav-item"><a href=""
                                class="nav-link {{ Request::segment(1) == 'teachers' && Request::segment(2) == 'teacher-list' ? 'active' : '' }} ">Siyahı</a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{ Request::segment(1) == 'accounting' ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="ph-money"></i>
                        <span>Maliyyə</span>
                    </a>
                    <ul class="nav-group-sub collapse {{ Request::segment(1) == 'accounting' ? 'show' : '' }}">
                        <li class="nav-item"><a href="{{ route('accountingAll') }}" class="nav-link {{ Request::segment(1) == 'accounting' && Request::segment(2) == 'all' ? 'active' : '' }}">Bütün ödənişlər</a></li>
                        <li class="nav-item"><a href="{{ route('accountingIncomePage') }}" class="nav-link {{ Request::segment(1) == 'accounting' && Request::segment(2) == 'income' ? 'active' : '' }}">Mədaxil</a></li>
                        <li class="nav-item"><a href="{{ route('accountingExpensePage') }}" class="nav-link {{ Request::segment(1) == 'accounting' && Request::segment(2) == 'expense' ? 'active' : '' }}">Məxaric</a></li>
                        <li class="nav-item"><a href="{{ route('accountingFiltrView') }}" class="nav-link {{ Request::segment(1) == 'accounting' && Request::segment(2) == 'filtr' ? 'active' : '' }}">Filtr</a></li>
                        <li class="nav-item"><a href="{{ route('accountingAddView') }}" class="nav-link {{ Request::segment(1) == 'accounting' && Request::segment(2) == 'add' ? 'active' : '' }}">Əlavə et</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
