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
                    <a href="{{ route("restaurants.index") }}" class="nav-link {{ request()->is('admin/restaurants*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-shop-window"></i>
                        <p>Restaurants</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("categories.index") }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-square"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("articles.index") }}" class="nav-link {{ request()->is('admin/articles*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-fork-knife"></i>
                        <p>Articles</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("ingredients.index") }}" class="nav-link {{ request()->is('admin/ingredients*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-egg-fried"></i>
                        <p>Ingredients</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("categories.index") }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-egg-fried"></i>
                        <p>Allergenes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("categories.index") }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-egg-fried"></i>
                        <p>Commandes</p>
                    </a>
                </li>


            </ul>
        </nav>
    </div>
</aside>
