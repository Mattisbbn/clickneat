<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
            <i class="bi bi-list"></i>
          </a>
        </li>

      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
          </a>
        </li>

        <li class="nav-item">
            @auth
                <form method="post" action="{{ route("logout") }}">
                    @csrf
                    <button type="submit" class="nav-link">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            @endauth
          </li>

      </ul>
      <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
  </nav>