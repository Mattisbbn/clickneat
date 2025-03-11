@extends("dashboard.index")
@section("name","Restaurants")
@section("content")

<a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm" href="{{ route("restaurants.create") }}">Créer un restaurant</a>
<div class="p-3 bg-white shadow rounded-3">
    <table class=" w-100 ">

        <thead>
            <tr>
                <td class="fw-semibold">Id</td>
                <td class="fw-semibold">Nom</td>
                <td class="fw-semibold text-center">Action</td>
            </tr>
        </thead>
    
        <tbody>
            @foreach( $restaurants as $restaurant )
                <tr class="border-bottom">
                    <td class="p-1">{{ $restaurant->id }}</td>
                    <td class="p-1">{{ $restaurant->name }}</td>
                    <td class="d-flex p-1 justify-content-center align-items-center">
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("restaurants.show",$restaurant->id) }}">Voir</a>
                        <form method="post" action="{{ route("restaurants.delete",[$restaurant->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button class="text-decoration-none text-black shadow rounded-3 p-2 bg-white border-0 me-2" type="submit">Supprimer</button>
                        </form>
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("restaurants.edit",$restaurant->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
</div>

@endsection