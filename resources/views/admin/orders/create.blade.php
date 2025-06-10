<x-admin-layout>

    <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="{{ route("ingredients.store") }}">
        @csrf
        @method("post")
        <div class="d-flex flex-column bg-white shadow p-4 rounded-3">
            <h1 class="text-center mb-4">Créer une commande</h1>
            <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" placeholder="Total" type="number" name="total" id="total">
            <select class="p-2 rounded-3 border-0 mb-4 shadow-sm" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <select class="p-2 rounded-3 border-0 mb-4 shadow-sm" name="status">
                <option value="pending">En attente</option>
                <option value="paid">Payée</option>
                <option value="cancelled">Annulée</option>
            </select>
            <button class="p-2 rounded-3" type="submit">Créer</button>
        </div>
    </form>

</x-admin-layout>