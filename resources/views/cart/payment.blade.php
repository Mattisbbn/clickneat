<x-guest-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-8">Paiement de votre commande</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Résumé de la commande -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Résumé de votre commande</h2>

                <div class="mb-4">
                    <h3 class="font-medium text-gray-700">Restaurant</h3>
                    <p class="text-lg">{{ $order->reservation->table->restaurant->name ?? 'Restaurant' }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="font-medium text-gray-700">Table</h3>
                    <p>{{ $order->reservation->table->name }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="font-medium text-gray-700">Horaires</h3>
                    <p>{{ \Carbon\Carbon::parse($order->reservation->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($order->reservation->end_time)->format('H:i') }}</p>
                </div>

                <div class="border-t pt-4">
                    <h3 class="font-medium text-gray-700 mb-3">Articles commandés</h3>
                    <div class="space-y-3">
                        @foreach($order->orderItems as $item)
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-medium">{{ $item->name }}</span>
                                <span class="text-gray-500 ml-2">x{{ $item->quantity }}</span>
                            </div>
                            <span class="font-semibold">{{ number_format($item->price * $item->quantity / 100, 2) }}€</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if($order->note)
                <div class="border-t pt-4 mt-4">
                    <h3 class="font-medium text-gray-700">Note pour la cuisine</h3>
                    <p class="text-gray-600">{{ $order->note }}</p>
                </div>
                @endif

                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between items-center text-xl font-bold">
                        <span>Total</span>
                        <span class="text-clementine-500">{{ number_format($total / 100, 2) }}€</span>
                    </div>
                </div>
            </div>

            <!-- Section de paiement -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Paiement sécurisé</h2>

                <div class="mb-6">
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-lock text-green-500"></i>
                        <span class="text-sm text-gray-600">Paiement sécurisé par Stripe</span>
                    </div>

                    <div class="flex space-x-2 mb-4">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/visa-729c05c240c4bdb47b03ac81d9945bfe.svg" alt="Visa" class="h-8">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg" alt="Mastercard" class="h-8">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg" alt="American Express" class="h-8">
                    </div>
                </div>

                <button
                    id="checkout-button"
                    class="w-full bg-clementine-500 hover:bg-clementine-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center"
                >
                    <i class="fas fa-credit-card mr-2"></i>
                    Payer {{ number_format($total / 100, 2) }}€
                </button>

                <div id="loading" class="hidden text-center mt-4">
                    <i class="fas fa-spinner fa-spin mr-2"></i>
                    Redirection vers le paiement...
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('cart.index') }}" class="text-gray-500 hover:text-gray-700">
                        ← Retour au panier
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('checkout-button').addEventListener('click', function() {
            const button = this;
            const loading = document.getElementById('loading');

            // Désactiver le bouton et afficher le loading
            button.disabled = true;
            button.classList.add('opacity-50');
            loading.classList.remove('hidden');

            // Appel vers votre backend pour créer la session Stripe
            fetch('{{ route("payment.checkout") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.checkout_url) {
                    // Rediriger vers Stripe Checkout
                    window.location.href = data.checkout_url;
                } else {
                    throw new Error(data.error || 'Erreur lors de la création de la session de paiement');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors du paiement. Veuillez réessayer.');

                // Réactiver le bouton
                button.disabled = false;
                button.classList.remove('opacity-50');
                loading.classList.add('hidden');
            });
        });
    </script>
</x-guest-layout>
