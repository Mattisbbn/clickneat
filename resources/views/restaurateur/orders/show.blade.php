<x-restaurateur>

    <section class="w-8/12 mx-auto ">

        <div class="flex flex-col">
            <div class="flex justify-between items-center my-4">
                <h2 class="text-2xl font-bold !text-gray-800">Commande #{{ $order->id }}</h2>
                <a href="{{ route('restaurateur.orders.index') }}" class="text-white p-2 rounded-lg bg-clementine-500 text-md font-semibold">Voir toutes les commandes</a>
            </div>
            <x-card></x-card>
        </div>

    </section>



 </x-restaurateur>
