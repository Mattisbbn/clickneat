<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>

            @if (Auth::check())
                <a href="#" class="nav-link d-flex">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="border-0 bg-white" type="submit">
                            <i class="bi bi-box-arrow-right ms-2"></i>
                        </button>
                    </form>
                </a>
            @endif
        </ul>
    </div>
</nav>
