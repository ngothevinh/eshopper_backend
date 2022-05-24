<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="http://127.0.0.1:8080/home">Trang chủ</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu -->
                <li class="nav-item">
                    <a href="{{route('menus.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>

                <!-- Danh mục sản phẩm -->
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>

                <!-- Sản phẩm -->
                <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>

                <!-- Slider -->
                <li class="nav-item">
                    <a href="{{route('slider.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>

                <!-- Setting -->
                <li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>

                <!-- User -->
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách user
                        </p>
                    </a>
                </li>

                <!-- Role -->
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách vai trò (Roles)
                        </p>
                    </a>
                </li>

                <!-- Insert data cho bảng permissions -->
                <li class="nav-item">
                    <a href="{{route('permissions.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tạo dữ liệu bảng permission
                        </p>
                    </a>
                </li>

                <!-- Danh sách đơn hàng -->
                <li class="nav-item">
                    <a href="{{route('cart.listCart')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách đơn hàng
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
