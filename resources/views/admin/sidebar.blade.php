<aside class="main-sidebar sidebar-dark-primary sidebar-no-expand text-sm elevation-4" dir="rtl"
    style="font-family: 'Tajawal', sans-serif;">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{ asset('admin/photo/sidebarAdminPhoto.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="width:40px; height:40px; object-fit:cover; border: 2px solid #28a745;">
            </div>
            <div class="info">
                <a href="#" class="d-block text-success fw-semibold fs-6">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @can('showProductsSidebar')
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}"
                            class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}">
                            <i class="fas fa-box-open nav-icon"></i>
                            <p>المنتجات</p>
                        </a>
                    </li>
                @endcan

                @can('showSectionsSidebar')
                    <li class="nav-item">
                        <a href="{{ route('sections.index') }}"
                            class="nav-link {{ Request::is('dashboard/sections*') ? 'active' : '' }}">
                            <i class="fas fa-th-large nav-icon"></i>
                            <p>الأقسام</p>
                        </a>
                    </li>
                @endcan

                @can('showOrdersSidebar')
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}"
                            class="nav-link d-flex align-items-center justify-content-between {{ Request::is('dashboard/orders*') ? 'active' : '' }}">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p class="mb-0">الطلبيات</p>
                            </div>
                            <livewire:Notifications.NotificationBadge />
                        </a>
                    </li>
                @endcan

                @can('showPermessionsSidebar')
                    <li class="nav-item">
                        <a href="{{ route('Permissions.index') }}"
                            class="nav-link {{ Request::is('dashboard/Permissions*') ? 'active' : '' }}">
                            <i class="fas fa-user-shield nav-icon"></i>
                            <p>الصلاحيات</p>
                        </a>
                    </li>
                @endcan

                @if (in_array(auth()->user()->id, [7, 48, 50]))
                    <li class="nav-item">
                        <a href="{{ route('statices.index') }}"
                            class="nav-link {{ Request::is('dashboard/statices') ? 'active' : '' }}">
                            <i class="fas fa-chart-bar nav-icon"></i>
                            <p>الإحصائيات</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('delivery.index') }}"
                            class="nav-link {{ Request::is('dashboard/delivery*') ? 'active' : '' }}">
                            <i class="fas fa-motorcycle nav-icon"></i>
                            <p>الدليفري</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banares.index') }}"
                            class="nav-link {{ Request::is('dashboard/banares*') ? 'active' : '' }}">
                            <i class="fas fa-bullhorn nav-icon  "></i>
                            <p>اعلانات التطبيق</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('notifications.index') }}"
                            class="nav-link {{ Request::is('dashboard/notifications*') ? 'active' : '' }}">
                            <i class="fas fa-bell nav-icon"></i>
                            <p>إشعارات التطبيق</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('promocodes.index') }}"
                            class="nav-link {{ Request::is('dashboard/promocodes*') ? 'active' : '' }}">
                            <i class="fas fa-bullhorn nav-icon  "></i>
                            <p>بروموكود</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('configs.edit') }}"
                            class="nav-link {{ Request::is('dashboard/configs*') ? 'active' : '' }}">
                            <i class="fas fa-cog nav-icon  "></i>
                            <p>الاعدادات</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>

<style>
    html,
    body,
    .wrapper {
        height: 100%;
        min-height: 100%;
    }

    .main-sidebar {
        min-height: 100vh;
        /* full viewport height */
        height: 100vh;
        position: fixed;
        /* force full height */
        /* fix it on screen */
        overflow-y: auto;
        /* scroll if sidebar content is taller than viewport */
        z-index: 1030;
        /* make sure it’s above main content */
    }

    /* Dark theme sidebar */
    .main-sidebar.sidebar-dark-primary {
        background-color: #1e293b;
        /* dark navy-blue */
        color: #cbd5e1;
        /* light slate */
        min-height: 100vh;
        padding: 15px;
    }

    /* User panel */
    .user-panel .info a {
        color: #28a745;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
    }

    .user-panel .info a:hover {
        text-decoration: underline;
    }

    /* Sidebar nav links */
    .nav-sidebar .nav-link {
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 8px;
        color: #cbd5e1;
        transition: background-color 0.3s ease, color 0.3s ease;
        display: flex;
        align-items: center;
    }

    /* Icon style */
    .nav-sidebar .nav-icon {
        font-size: 1.2rem;
        margin-left: 12px;
        /* RTL spacing */
        color: #94a3b8;
        /* muted slate */
        width: 22px;
        text-align: center;
    }

    /* Hover and active */
    .nav-sidebar .nav-link:hover,
    .nav-sidebar .nav-link.active {
        background-color: #28a745;
        color: #ffffff;
    }

    .nav-sidebar .nav-link:hover .nav-icon,
    .nav-sidebar .nav-link.active .nav-icon {
        color: #ffffff;
    }

    /* Fix flex for orders */
    .nav-sidebar .nav-link.d-flex.justify-content-between>div {
        flex-grow: 1;
    }

    /* Notification badge alignment fix */
    .nav-sidebar .nav-link.d-flex.justify-content-between>livewire-notifications-notificationbadge {
        margin-left: auto;
    }
</style>

<!--
Note:
- Uses FontAwesome 5+ icons with "fas" class.
- Sidebar background is dark navy-blue (#1e293b) with green (#28a745) active highlights.
- Text is light slate (#cbd5e1) for readability.
- Icons are muted slate (#94a3b8) normally, turning white on active/hover.
-->
