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
<aside class="h-[100dvh]  fixed bottom-0 right-0 bg-white z-30 shadow-lg">
    <div class="h-[60px] border-b-[1px] border-gray-200 flex justify-between">
        <h2 class="text-2xl font-bold ms-5 my-auto">Votre commande</h2>
        <button class="me-3">X</button>
    </div>

    <div id="cart-restaurants flex flex-col mx-4">
        @auth
    @php
        $groupedCart = $cart->groupBy(function($item) {
            return $item->item->category->restaurant->name;
        });
    @endphp

    @foreach ($groupedCart as $restaurantName => $items)
    <div class=" mx-4 pt-6">


        <h2 class=" ps-3 text-lg font-bold text-clementine-500">{{ $restaurantName }}</h2>

        @foreach ($items as $cartitem)
            <div class="flex justify-between px-3 pb-3 pt-2">
                <img src="{{ $cartitem->item->image_url }}" class="h-[60px] rounded-lg" alt="">
                <div class="flex flex-col p-2">
                    <p class="font-semibold">{{ $cartitem->item->name }}</p>
                    <span class="text-clementine-500 font-bold">{{ $cartitem->item->price }}€</span>
                </div>
                <div class="p-2">{{ $cartitem->quantity }}</div>

            </div>
            <hr class="mx-3 px-2 border-gray-200">
        @endforeach

    </div>

    @endforeach



@endauth


    </div>

    <div class="mt-auto">

    </div>
</aside>
