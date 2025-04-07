<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand" href="/"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/" aria-current="page">{{ __('Dashboard') }}</a>
                </li>
            </ul>
            <div class="d-none d-sm-flex align-items-center me-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="d-block d-sm-none">
    <div class="pt-2 pb-3">
        <a class="dropdown-item" href="/" aria-current="page">{{ __('Dashboard') }}</a>
    </div>
    <div class="pt-4 pb-1 border-top">
        <div class="px-4">
            <div class="font-weight-bold text-dark">{{ Auth::user()->name }}</div>
            <div class="font-weight-normal text-muted">{{ Auth::user()->email }}</div>
        </div>
        <div class="mt-3">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
            </form>
        </div>
    </div>
</div>
