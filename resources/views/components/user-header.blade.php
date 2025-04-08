<header class="shadow-sm bg-white z-20 p-2 relative flex flex-row justify-between h-[60px]  px-[20px]">
    <a href="/">
        <img src="{{ asset('img/logo-header.svg') }}" alt="logo" class=" h-full">
    </a>

    <ul class="flex list-none align-middle justify-center gap-2">
            <li>
                <a href="{{ route('profile.edit') }}" >
                    <svg class="h-full w-7">
                        <use xlink:href="#user"></use>
                    </svg>
                </a>
            </li>


        <li>
            <a href="#" class="" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <svg class="h-full w-7">
                    <use xlink:href="#cart"></use>
                </svg>
            </a>
        </li>
    </ul>

</header>
