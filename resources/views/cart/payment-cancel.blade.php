<x-guest-layout>
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <i class="fas fa-times-circle text-red-500 text-6xl mb-4"></i>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Paiement annulé</h1>
                <p class="text-gray-600">Votre paiement a été annulé. Votre commande n'a pas été confirmée.</p>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <h3 class="font-medium text-yellow-800 mb-2">Que s'est-il passé ?</h3>
                <p class="text-yellow-700 text-sm">
                    Vous avez annulé le processus de paiement ou une erreur s'est produite.
                    Votre commande est toujours dans votre panier et aucun montant n'a été débité.
                </p>
            </div>

            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Que souhaitez-vous faire ?</h3>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('cart.index') }}" class="bg-clementine-500 hover:bg-clementine-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Retour au panier
                    </a>
                    <a href="{{ route('cart.payment') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                        <i class="fas fa-credit-card mr-2"></i>
                        Réessayer le paiement
                    </a>
                </div>

                <div class="pt-4">
                    <a href="{{ route('landpage.index') }}" class="text-gray-500 hover:text-gray-700 underline">
                        Retour à l'accueil
                    </a>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t text-left">
                <h4 class="font-medium text-gray-700 mb-2">Besoin d'aide ?</h4>
                <p class="text-sm text-gray-600">
                    Si vous rencontrez des difficultés avec le paiement, n'hésitez pas à nous contacter.
                    Nous serons ravis de vous aider à finaliser votre commande.
                </p>
                <a href="{{ route('contact.view') }}" class="text-clementine-500 hover:text-clementine-600 text-sm underline">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
