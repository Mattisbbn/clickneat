<x-admin-layout>

<a class="text-center p-2 bg-white text-black text-decoration-none rounded-3 shadow-sm mx-2 my-2" href="{{ route("restaurants.create") }}">Créer un restaurant</a>
<div class="p-3 bg-white shadow rounded-3 mx-2">
    <table class=" w-100 table table-hover">

        <thead>
            <tr>
                <td class="fw-semibold">Id</td>
                <td class="fw-semibold">Nom</td>
                <td class="fw-semibold">Adresse</td>
                <td class="fw-semibold">Horaires d'ouverture</td>
                <td class="fw-semibold">Horaires de fermeture</td>
                <td class="fw-semibold text-center">Action</td>
            </tr>
        </thead>

        <tbody>
            @foreach( $restaurants as $restaurant )
                <tr class="border-bottom">
                    <td class="p-1">{{ $restaurant->id }}</td>
                    <td class="p-1">{{ $restaurant->name }}</td>
                    <td class="p-1">{{ $restaurant->address }}</td>
                    <td class="p-1">{{ $restaurant->opening_hours }}</td>
                    <td class="p-1">{{ $restaurant->closing_hours }}</td>
                    <td class="d-flex p-1 justify-content-center align-items-center">
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("restaurants.show",$restaurant->id) }}">Voir</a>
                        <form method="post" action="{{ route("restaurants.destroy",[$restaurant->id]) }}">
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

</x-admin-layout>