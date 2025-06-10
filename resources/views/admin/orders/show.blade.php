<x-admin-layout>
    <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
        <h1 class="text-center mb-4">Commande</h1>
        <div>
            <h4 class="mb-2">Client : {{ $order->user->name }}</h4>
            <h4 class="mb-2">Total : {{ $order->total }}</h4>
            <h4 class="mb-2">Statut : {{ $order->status }}</h4>
            <h4 class="mb-2">Date de création : {{ $order->created_at->format("d/m/Y H:i:s") }}</h4>
            <h4 class="mb-2">Mis à jour le : {{ $order->updated_at->format("d/m/Y H:i:s") }}</h4>
        </div>
    </div>
</x-admin-layout>