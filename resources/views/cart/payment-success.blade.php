<x-guest-layout>
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <i class="fas fa-check-circle text-green-500 text-6xl mb-4"></i>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Paiement réussi !</h1>
                <p class="text-gray-600">Votre commande a été confirmée et payée avec succès.</p>
            </div>

            @if($order)
            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Détails de votre commande</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div>
                        <h3 class="font-medium text-gray-700">Numéro de commande</h3>
                        <p class="text-lg font-mono">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-700">Statut</h3>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                            Payé
                        </span>
                    </div>

                    @if($order->reservation && $order->reservation->table)
                    <div>
                        <h3 class="font-medium text-gray-700">Table</h3>
                        <p>{{ $order->reservation->table->name }}</p>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-700">Horaires</h3>
                        <p>{{ \Carbon\Carbon::parse($order->reservation->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($order->reservation->end_time)->format('H:i') }}</p>
                    </div>
                    @endif
                </div>

                <div class="mt-6 pt-4 border-t">
                    <h3 class="font-medium text-gray-700 mb-3">Articles commandés</h3>
                    <div class="space-y-2">
                        @foreach($order->orderItems as $item)
                        <div class="flex justify-between">
                            <span>{{ $item->name }} x{{ $item->quantity }}</span>
                            <span>{{ number_format($item->price * $item->quantity / 100, 2) }}€</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4 pt-2 border-t font-bold text-lg">
                        <div class="flex justify-between">
                            <span>Total payé</span>
                            <span class="text-clementine-500">{{ number_format($order->orderItems->sum(function($item) { return $item->price * $item->quantity; }) / 100, 2) }}€</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="space-y-4">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h3 class="font-medium text-blue-800 mb-2">Prochaines étapes</h3>
                    <p class="text-blue-700 text-sm">
                        Votre commande a été transmise au restaurant. Vous recevrez une notification lorsque votre commande sera prête.
                        Rendez-vous à votre table à l'heure prévue.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('orders.index') }}" class="bg-clementine-500 hover:bg-clementine-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                        Voir mes commandes
                    </a>
                    <a href="{{ route('landpage.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-6 rounded-lg transition duration-200">
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
