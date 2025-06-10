<x-admin-layout>
        <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
            <h1 class="text-center mb-4">Allergène</h1>
            <div>
                <h4 class="mb-2">Nom : {{ $allergen->name }}</h4>
                <h4 class="mb-2">Article lié : {{ $allergen->item->name }}</h4>
                <h4 class="mb-2">Date de création : {{ $allergen->created_at->format("d/m/Y H:i:s") }}</h4>
                <h4 class="mb-2">Mis à jour le : {{ $allergen->updated_at->format("d/m/Y H:i:s") }}</h4>
            </div>
        </div>
</x-admin-layout>