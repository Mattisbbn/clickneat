<x-admin-layout>
        <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
            <h1 class="text-center mb-4">Article</h1>
            <div>
                <h4 class="mb-2">Nom : {{ $item->name }}</h4>
                <h4 class="mb-2">Catégorie : {{ $item->category->name }}</h4>
                <h4 class="mb-2">Prix : {{ $item->formatedPrice }}</h4>
                <h4 class="mb-2">Cout : {{ $item->formatedCost }}</h4>
                <h4 class="mb-2">Description : {{ $item->description }}</h4>
                <h4 class="mb-2">Actif : {{ $item->is_active ? "Oui" : "Non" }}</h4>
                <h4 class="mb-2">Date de création : {{ $item->created_at }}</h4>
                <h4 class="mb-2">Mis à jour le : {{ $item->updated_at }}</h4>
            </div>
        </div>
</x-admin-layout>