<!-- Checkbox cachée pour gérer l'état -->
<input type="checkbox" id="toggleCart" class="hidden peer" />

<header class="shadow-sm bg-white z-20 p-2 relative flex flex-row justify-between h-[60px] px-[20px]">
    <a href="/">
        <img src="{{ asset('img/logo-header.svg') }}" alt="logo" class="h-full">
    </a>

    <ul class="flex list-none align-middle justify-center gap-2">
        <li>
            <a href="{{ route('profile.edit') }}">
                <svg class="h-full w-7">
                    <use xlink:href="#user"></use>
                </svg>
            </a>
        </li>
        <li>
            <!-- Label qui déclenche le checkbox -->
            <label for="toggleCart" class="cursor-pointer">
                <svg class="h-full w-7">
                    <use xlink:href="#cart"></use>
                </svg>
            </label>
        </li>
    </ul>
</header>

<!-- Aside caché par défaut, visible si peer checked -->
<aside class="fixed top-0 right-0 w-[400px] h-[100dvh] bg-white shadow-lg z-30 flex-col px-4 flex translate-x-full peer-checked:translate-x-0 transition-transform duration-300">

    <!-- Header -->
    <div class="border-b-[1px] py-[15px] border-gray-200 flex justify-between">
        <h2 class="text-2xl font-bold ms-3 my-auto">Votre commande</h2>

        <!-- Fermer le panier -->
        <label for="toggleCart" class="cursor-pointer font-bold text-xl px-3">×</label>
    </div>

    <!-- Contenu scrollable -->
    <div class="overflow-y-auto scrollbar-hide grow">

        @if(isset($cart))
        @auth
        @php
            $groupedCart = $cart->groupBy(function($item) {
                return $item->item->category->restaurant->name;
            });
        @endphp

        @foreach ($groupedCart as $restaurantName => $items)
        <div class="pt-6">
            <h2 class="ps-3 text-lg font-bold text-clementine-500">{{ $restaurantName }}</h2>

            @foreach ($items as $cartitem)
            <div class="flex justify-between px-3 pb-3 pt-2">
                <div class="flex">
                    <img src="{{ $cartitem->item->image_url }}" class="h-[60px] rounded-lg" alt="">
                    <div class="flex flex-col p-2">
                        <p class="font-bold">{{ $cartitem->item->name }}</p>
                        <span class="text-clementine-500 font-bold">{{ $cartitem->item->price }}€</span>
                    </div>
                </div>
                <div class="p-2 flex flex-row gap-2 justify-center align-middle">
                    <form class="flex m-auto" action="{{ route('cart.decrement', $cartitem->item_id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button class="h-6 w-6 text-clementine-500 rounded-full border-2 border-clementine-500" type="submit">-</button>
                    </form>
                     <p class="flex m-auto">{{ $cartitem->quantity }}</p>
                    <form class="flex m-auto" action="{{ route('cart.increment', $cartitem->item_id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button class="h-6 w-6 text-clementine-500 rounded-full border-2 border-clementine-500" type="submit">+</button>
                    </form>
                </div>
            </div>
            <hr class="mx-3 px-2 border-gray-200">
            @endforeach
        </div>
        @endforeach
        @endauth
@endif

        @guest
        <div class="flex w-full h-full">
            <p class="m-auto text-xl">Connectez-vous pour commander</p>
        </div>

        @endguest

    </div>

    <!-- Bouton en bas -->
    <div class="py-3 bg-white border-t border-gray-200">
        <a href="{{ route('cart.index') }}"><x-submit-button class="w-full cursor-pointer disabled:opacity-50">Voir le panier</x-submit-button></a>
    </div>
</aside>
