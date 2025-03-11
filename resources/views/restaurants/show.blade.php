
@extends("dashboard.index")
@section("title","Catégorie : ".$restaurant->name)

@section("content")


    <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
        <h1 class="text-center mb-4">Restaurant : {{$restaurant->name}}</h1>
        <div>
            <h4 class="mb-2">Nom : {{ $restaurant->name }}</h4>
            <h4 class="mb-2">Date de création : {{ $restaurant->created_at }}</h4>
            <h4 class="mb-2">Mis à jour le : {{ $restaurant->updated_at }}</h4>
            <h4 class="mb-4 mt-4">Liste des catégories :</h4>
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route("categories.show",[$category->id]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route("restaurants.index") }}">Retour à la page restaurants</a>
    
       
    
    </div>
   
@endsection





{{-- @section("content")
        <div class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center">
            <h1 class="text-center mb-4">Catégorie</h1>
            <div>
                <h4 class="mb-2">Nom : {{ $category->name }}</h4>
                <h4 class="mb-2">Date de création : {{ $category->created_at }}</h4>
                <h4 class="mb-2">Mis à jour le : {{ $category->updated_at }}</h4>
            </div>
        </div>
@endsection --}}