<x-admin-layout>
    <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
        <h1 class="text-center mb-4">Ingrédient</h1>
        <div>
            <h4 class="mb-2">Nom : {{ $ingredient->name }}</h4>
            <h4 class="mb-2">Date de création : {{ $ingredient->created_at->format("d/m/Y H:i:s") }}</h4>
            <h4 class="mb-2">Mis à jour le : {{ $ingredient->updated_at->format("d/m/Y H:i:s") }}</h4>
        </div>
    </div>
</x-admin-layout>