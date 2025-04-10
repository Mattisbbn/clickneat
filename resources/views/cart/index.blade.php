@php
    $groupedCart = $cart->groupBy(function ($item) {
        return $item->item->category->restaurant->name;
    });
@endphp

<x-guest-layout>

    <h1 class="text-2xl font-bold text-center p-3">Mon panier</h1>
    <section class="w-10/12 m-auto">

        <x-card>
            <select class="flex w-full">
                <option disabled selected value="">
                    Selectionnez une table
                </option>
            </select>
        </x-card>


        @foreach ($groupedCart as $restaurantName => $items)
            <div class="pt-6">
                @foreach ($items as $cartitem)
                    <x-card>
                        <div class="flex">
                            <img src="{{ $cartitem->item->image_url }}" class="h-[80px] rounded-lg" alt="">
                            <div class="flex flex-col p-2">
                                <p class="font-bold">{{ $cartitem->item->name }}</p>
                                <p class="text-sm">{{ $cartitem->item->description }}</p>
                                <span class="text-clementine-500 font-semibold mt-auto">{{ $cartitem->item->price }}€</span>
                            </div>
                        </div>
                        <div class="p-2 flex flex-row gap-2 justify-center align-middle">
                            <form class="flex m-auto" action="{{ route('cart.decrement', $cartitem->item_id) }}"
                                method="post">
                                @csrf
                                @method('patch')
                                <button class="h-6 w-6 text-clementine-500 rounded-full border-2 border-clementine-500"
                                    type="submit">-</button>
                            </form>
                            <p class="flex m-auto">{{ $cartitem->quantity }}</p>
                            <form class="flex m-auto" action="{{ route('cart.increment', $cartitem->item_id) }}"
                                method="post">
                                @csrf
                                @method('patch')
                                <button class="h-6 w-6 text-clementine-500 rounded-full border-2 border-clementine-500"
                                    type="submit">+</button>
                            </form>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endforeach

        <x-card class="mt-6 flex flex-col">
            <h1 class="font-bold mb-4 text-lg">Notes pour la cuisine</h1>
            <textarea placeholder="Ex: Sans oignon, sauce à part..." rows="2" class="w-full p-2 border-[1px] border-gray-300 rounded-lg">
            </textarea>
        </x-card>



        <x-card class="mt-6 flex flex-col">
            <h1 class="font-bold mb-4 text-lg">Résumé de la commande</h1>

        </x-card>
    </section>
</x-guest-layout>
