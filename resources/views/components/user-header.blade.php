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
        <h2 class="text-xl font-bold text-clementine-500 px-4 py-2">{{ $restaurantName }}</h2>

        @foreach ($items as $cartitem)
            <div class="flex px-4 py-3 justify-between">
                <img src="{{ $cartitem->item->image_url }}" class="h-[60px] rounded-lg" alt="">
                <div class="flex flex-col">
                    <p>{{ $cartitem->item->name }}</p>
                    <span class="text-clementine-500 font-bold">{{ $cartitem->item->price }}€</span>
                </div>
                <div>{{ $cartitem->quantity }}</div>
            </div>
            <div class="border-b-[1px] mx-4 w-full"></div>
        @endforeach


    @endforeach
@endauth


    </div>

    <div class="mt-auto">

    </div>
</aside>
