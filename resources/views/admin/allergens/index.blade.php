<x-admin-layout>

    <a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm my-2 mx-2" href="{{ route("allergens.create") }}">Créer un allergène</a>
    <div class="p-3 bg-white shadow rounded-3 overflow-hidden mx-2 ">
        <table class="w-100 table table-hover">
            <thead>
                <tr>
                    <td class="fw-semibold">Id</td>
                    <td class="fw-semibold">Nom</td>
                    <td class="fw-semibold">Article lié</td>
                    <td class="fw-semibold text-center">Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach( $allergens as $allergen )
                    <tr class="border-bottom">
                        <td class="p-1">{{ $allergen->id }}</td>
                        <td class="p-1">{{ $allergen->name }}</td>
                        <td class="p-1">{{ $allergen->item->name}}</td>
                        <td class="d-flex p-1 justify-content-center align-items-center">
                            <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("allergens.show",$allergen->id) }}">Voir</a>
                            <form method="post" action="{{ route("allergens.destroy",[$allergen->id]) }}">
                                @csrf
                                @method("DELETE")
                                <button class="text-decoration-none text-black shadow rounded-3 p-2 bg-white border-0 me-2" type="submit">Supprimer</button>
                            </form>
                            <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("allergens.edit",$allergen->id) }}">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    </x-admin-layout>
