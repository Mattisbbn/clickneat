
@extends("dashboard.index")
@section("title","Catégorie : ".$category->name)

@section("content")
        <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
            <h1 class="text-center mb-4">Catégorie</h1>
            <div>
                <h4 class="mb-2">Nom : {{ $category->name }}</h4>
                <h4 class="mb-2">Date de création : {{ $category->created_at }}</h4>
                <h4 class="mb-2">Mis à jour le : {{ $category->updated_at }}</h4>
            </div>
        </div>
@endsection