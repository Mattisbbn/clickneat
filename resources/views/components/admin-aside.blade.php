<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="/" class="brand-link">
            <span class="brand-text fw-light">Click&Eat</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">


                <li class="nav-item">
                    <a href="{{ route("restaurants.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-shop-window"></i>
                        <p>Restaurants</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("categories.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Categories</p>
                    </a>
                </li>


            </ul>
        </nav>
    </div>
</aside>
