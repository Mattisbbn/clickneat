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
            <a href="#" class="cart-icon" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <svg class="h-full w-7">
                    <use xlink:href="#cart"></use>
                </svg>
            </a>
        </li>
    </ul>

</header>
<aside class="h-[100dvh] w-3/12 fixed bottom-0 right-0 bg-white z-30 shadow-lg">
    <div class="h-[50px] border-b-[1px] border-gray-200 flex justify-between">
        <h2 class="text-2xl font-bold ms-5 my-auto">Votre commande</h2>
        <button class="me-3">X</button>
    </div>

    <div id="cart-restaurants">

    </div>

    <div class="mt-auto">

    </div>
</aside>
