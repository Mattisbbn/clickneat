@php
    $groupedCart = $cart->isNotEmpty()
        ? $cart->groupBy(function ($item) {
            return $item->item->category->restaurant->name;
        })
        : collect();

    $opening_hours = date('H:i', strtotime($cart->first()->item->category->restaurant->opening_hours)); // Heure d'ouverture
    $closing_hours = date('H:i', strtotime($cart->first()->item->category->restaurant->closing_hours)); // Heure de fermeture

    $start = \Carbon\Carbon::createFromFormat('H:i', $opening_hours);
    $end = \Carbon\Carbon::createFromFormat('H:i', $closing_hours);
@endphp


<x-guest-layout>
    <h1 class="text-2xl font-bold text-center p-3">Mon panier</h1>
    <section class="w-10/12 m-auto">

        @if ($cart->isEmpty())
            <x-card class="mt-6">
                <p class="text-center py-4">Votre panier est vide</p>
            </x-card>
        @else
            @foreach ($groupedCart as $restaurantName => $items)
                <div class="pt-6">
                    @foreach ($items as $cartitem)
                        <x-card class="mb-3">
                            <div class="flex">
                                <img src="{{ $cartitem->item->image_url }}" class="h-[80px] rounded-lg" alt="">
                                <div class="flex flex-col p-2">
                                    <p class="font-bold">{{ $cartitem->item->name }}</p>
                                    <p class="text-sm">{{ $cartitem->item->description }}</p>
                                    <span
                                        class="text-clementine-500 font-semibold mt-auto">{{ $cartitem->item->formatedPrice }}</span>
                                </div>
                            </div>
                            <div class="p-2 flex flex-row gap-2 justify-center align-middle">
                                <form class="flex m-auto" action="{{ route('cart.decrement', $cartitem->item_id) }}"
                                    method="post">
                                    @csrf
                                    @method('patch')
                                    <button
                                        class="h-6 w-6 text-clementine-500 rounded-full border-2 border-clementine-500"
                                        type="submit">-</button>
                                </form>
                                <p class="flex m-auto">{{ $cartitem->quantity }}</p>
                                <form class="flex m-auto " action="{{ route('cart.increment', $cartitem->item_id) }}"
                                    method="post">
                                    @csrf
                                    @method('patch')
                                    <button
                                        class="h-6 w-6 text-clementine-500 rounded-full border-2 border-clementine-500"
                                        type="submit">+</button>
                                </form>
                            </div>
                        </x-card>
                    @endforeach
                </div>
            @endforeach

            <form action="{{ route('order.validate') }}" method="post">
                @csrf
                <x-card class="flex mt-6">
                    <i class="fa-solid fa-store text-clementine-500 my-auto text-lg me-4"></i>
                    <div class="flex w-full flex-col">
                        <h2 class="font-bold">{{ $cart->first()->item->category->restaurant->name }}</h2>
                        <select required name="table_id" class="flex w-full rounded-lg">
                            <option disabled selected>Sélectionnez une table</option>
                            @foreach ($tables as $table)
                                <option {{ $table->is_available ? '' : 'disabled' }} value="{{ $table->id }}">
                                    {{ $table->name }} | {{ $table->places }} places | {{ $table->is_exterior ? 'Exterieur' : 'Intérieur' }} {{ $table->is_available ? '' : ' | Non disponible' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </x-card>

                <x-card class="flex mt-6">
                    <i class="fa-solid fa-clock text-clementine-500 my-auto text-lg me-4"></i>
                    <div class="flex w-full flex-col">
                        <h2 class="font-bold">Heure d'arrivée</h2>
                        <select required name="start_time" class="flex w-full rounded-lg">
                            <option disabled selected>Sélectionnez une heure</option>
                            @php
                                $tempStart = clone $start;
                            @endphp
                            @while ($tempStart <= $end)
                                <option value="{{ $tempStart->format('H:i') }}">
                                    {{ $tempStart->format('H:i') }}
                                </option>
                                @php
                                    $tempStart->addMinutes(30);
                                @endphp
                            @endwhile
                        </select>
                    </div>
                    <div class="border-[1px] border-gray-300  mx-4"></div>
                    <i class="fa-solid fa-clock text-clementine-500 my-auto text-lg me-4"></i>
                    <div class="flex w-full flex-col">
                        <h2 class="font-bold">Heure de départ</h2>
                        <select required name="end_time" class="flex w-full rounded-lg">
                            <option disabled selected>Sélectionnez une heure</option>
                            @php
                                $tempStart2 = clone $start;
                            @endphp
                            @while ($tempStart2 <= $end)
                                <option value="{{ $tempStart2->format('H:i') }}">
                                    {{ $tempStart2->format('H:i') }}
                                </option>
                                @php
                                    $tempStart2->addMinutes(30);
                                @endphp
                            @endwhile
                        </select>
                    </div>
                </x-card>

                <x-card class="mt-6 flex flex-col">
                    <h1 class="font-bold mb-4 text-lg">Notes pour la cuisine</h1>
                    <textarea name="note" placeholder="Ex: Sans oignon, sauce à part..." rows="2"
                        class="w-full p-2 border-[1px] border-gray-300 rounded-lg">
                    </textarea>
                </x-card>

                <x-card class="mt-6 flex flex-col">
                    <h1 class="font-bold mb-4 text-lg">Résumé de la commande</h1>
                    <div class="flex justify-between">
                        <h4 class="font-bold">Total</h4>
                        <h4 class="!text-clementine-500 font-bold">{{ $total }}</h4>
                    </div>
                </x-card>

                <x-submit-button class="w-full cursor-pointer my-8 disabled:opacity-50">Commander</x-submit-button>
            </form>
        @endif
    </section>
</x-guest-layout>
