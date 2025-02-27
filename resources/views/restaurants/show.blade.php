
@extends("dashboard.index")

@section("content")
    <h1 class="text-center">Restaurant : {{$restaurant->name}}</h1>
    <ul>
        <li>Nom : {{ $restaurant->name }}</li>
        <li>ID : {{ $restaurant->id }}</li>
        <li>Crée le : {{ $restaurant->created_at }}</li>
    </ul>

    <a href="{{ route("restaurants.index") }}">Retour à la page restaurants</a>

    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route("categories.show",[$category->id]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

@endsection



