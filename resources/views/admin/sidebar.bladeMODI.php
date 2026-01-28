<aside class="main-sidebar sidebar-white-primary    sidebar-no-expand text-sm elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/photo/sidebarAdminPhoto.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-success">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                @can('showProductsSidebar')
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}"
                            class="nav-link {{ Request::is('dashboard/products*') ? 'bg-success bg-gradient' : '' }}   p-1  ">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                            <p> المنتجات</p>
                        </a>
                    </li>
                @endcan


                @can('showSectionsSidebar')
                    {{--                الاقسام     --}}
                    <li class="nav-item">
                        <a href="{{ route('sections.index') }}"
                            class="nav-link  {{ Request::is('dashboard/sections*') ? 'bg-success bg-gradient' : '' }} p-1  ">
                            <i class="fa fa-qrcode" aria-hidden="true"></i>
                            <p> الأقسام </p>
                        </a>
                    </li>
                @endcan
                {{--                الاقسام     --}}
                @can('showOrdersSidebar')
                    <li class="nav-item ">
                        <a href="{{ route('orders.index') }}"
                            class="nav-link d-flex justify-content-between align-items-center {{ Request::is('dashboard/orders*') ? 'bg-success bg-gradient' : '' }} p-1  ">
                            <div class="div">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <p> الطلبيات </p>
                            </div>

                            <livewire:Notifications.NotificationBadge />
                        </a>
                    </li>
                @endcan
                {{--                الاقسام     --}}
                @can('showPermessionsSidebar')
                    <li class="nav-item">
                        <a href="{{ route('Permissions.index') }}"
                            class="nav-link  {{ Request::is('dashboard/Permissions*') ? 'bg-success bg-gradient' : '' }} p-1  ">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <p> الصلاحيات </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('banares.index') }}"
                            class="nav-link  {{ Request::is('dashboard/banares*') ? 'bg-success bg-gradient' : '' }} p-1  ">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                            <p> الأعلانات </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('notifications.index') }}"
                            class="nav-link  {{ Request::is('dashboard/notifications*') ? 'bg-success bg-gradient' : '' }} p-1  ">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                            <p> إشعارات التطبيق </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('promocodes.index') }}"
                            class="nav-link  {{ Request::is('dashboard/promocodes*') ? 'bg-success bg-gradient' : '' }} p-1  ">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <p> بروموكود </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
