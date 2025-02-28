<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">

            <img
                src="{{ asset("img/AdminLTELogo.png") }}"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">

            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false"
            >

                <li class="nav-item">
                    <a href="{{ route("dashboard") }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("restaurants.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Restaurants</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("categories") }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Categories</p>
                    </a>
                </li>
               {{-- <li class="nav-item menu-open">
                   <a href="#" class="nav-link active">
                       <i class="nav-icon bi bi-speedometer"></i>
                       <p>
                           Dashboard
                           <i class="nav-arrow bi bi-chevron-right"></i>
                       </p>
                   </a>
                   <ul class="nav nav-treeview">
                       <li class="nav-item">
                           <a href="./index.html" class="nav-link active">
                               <i class="nav-icon bi bi-circle"></i>
                               <p>Dashboard v1</p>
                           </a>
                    </li> --}}

                   </ul>

        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
