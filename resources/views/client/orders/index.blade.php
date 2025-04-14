<x-guest-layout>

    <section class="w-10/12 m-auto">
    <h1 class="text-3xl p-4">Mes commandes</h1>


            <section class="flex flex-wrap">
            @foreach ($orders as $order)
                <x-card class="w-[400px] flex m-4">
                    <div class="p-4 flex flex-col w-full">
                        <div class="flex items-center  justify-between">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center bg-clementine-100 w-12 h-12 rounded-lg p-2 me-4">
                                    <i class="fa-solid fa-utensils text-xl text-clementine-500"></i>
                                </div>
                                <div>
                                    <h2 class="font-bold text-xl">Commande #{{ $order->id }}</h2>
                                    <p class="text-gray-500">{{ $order->created_at->locale('fr')->translatedFormat('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div>
                                <span class="text-clementine-500 font-bold">{{ $order->status }}</span>
                            </div>
                        </div>
                        <hr class="my-6 border-gray-200">
                        <div>
                            <div class="flex items-center mb-4">
                                <img src="{{ $order->restaurant->logo_url }}" class="h-12 w-12 rounded-lg me-4" alt="">
                                <div>
                                    <h3 class="font-bold text-xl">{{ $order->restaurant->name }}</h3>
                                    <p class="text-gray-500">{{ $order->orderItems->count() }} articles</p>
                                </div>
                            </div>

                                @foreach ($order->orderItems as $orderItem)
                                    <div class="flex items-center justify-between">
                                        <p class="!text-gray-600 font-medium mt-2">{{ $orderItem->quantity }}x {{ $orderItem->item->name }}</p>
                                        <p class="!text-gray-600 font-medium mt-2">{{ number_format( $orderItem->price * $orderItem->quantity / 100, 2, ',', ' ') . ' €'}}</p>
                                    </div>
                                @endforeach

                                <div>
                                    <p class="!text-gray-600 font-medium mt-2">Note:
                                         <span class="bg-gray-100 rounded-lg px-2 py-1">{{ $order->note }}</span></p>
                                </div>

                                <hr class="my-6 border-gray-200">

                                <div class="flex items-center justify-between">
                                    <h3 class="!text-gray-600 text-lg font-medium mt-2">Total</h3>
                                    <h3 class="!text-gray-600 text-lg font-medium mt-2">{{ $order->total }}</h3>
                                </div>


                    </div>
                    </div>
                </x-card>
            @endforeach

    </section>
</x-guest-layout>
