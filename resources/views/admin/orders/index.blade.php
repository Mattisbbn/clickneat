<x-admin-layout>
    <a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm mx-2 my-2" href="{{ route("orders.create") }}">Créer une commande</a>
    <div class="p-3 bg-white shadow rounded-3 overflow-hidden mx-2">
        <table class="w-100 table table-hover">
            <thead>
                <tr>
                    <td class="fw-semibold">Id</td>
                    <td class="fw-semibold">Client</td>
                    <td class="fw-semibold">Total</td>
                    <td class="fw-semibold">Statut</td>
                    <td class="fw-semibold">Date de création</td>
                    <td class="fw-semibold text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach( $orders as $order )
                    <tr class="border-bottom">
                        <td class="p-1">{{ $order->id }}</td>
                        <td class="p-1">{{ $order->user->name }}</td>
                        <td class="p-1">{{ $order->total }}</td>
                        <td class="p-1">{{ $order->status }}</td>
                        <td class="p-1">{{ $order->created_at }}</td>
                        <td class="d-flex p-1 justify-content-center align-items-center">
                            <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("orders.show",$order->id) }}">Voir</a>
                            <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("orders.edit",$order->id) }}">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
