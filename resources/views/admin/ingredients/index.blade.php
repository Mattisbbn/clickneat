<x-admin-layout>
        <a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm mx-2 my-2" href="{{ route("ingredients.create") }}">Créer un ingredient</a>
        <div class="p-3 bg-white shadow rounded-3 overflow-hidden mx-2">
            <table class="w-100 table table-hover">
                <thead>
                    <tr>
                        <td class="fw-semibold">Id</td>
                        <td class="fw-semibold">Nom</td>
                        <td class="fw-semibold">Article associé</td>
                        <td class="fw-semibold text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $ingredients as $ingredient )
                        <tr class="border-bottom">
                            <td class="p-1">{{ $ingredient->id }}</td>
                            <td class="p-1">{{ $ingredient->name }}</td>
                            <td class="p-1">{{ $ingredient->item->name }}</td>
                            <td class="d-flex p-1 justify-content-center align-items-center">
                                <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("ingredients.show",$ingredient->id) }}">Voir</a>
                                <form method="post" action="{{ route("ingredients.destroy",[$ingredient->id]) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="text-decoration-none text-black shadow rounded-3 p-2 bg-white border-0 me-2" type="submit">Supprimer</button>
                                </form>
                                <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("ingredients.edit",$ingredient->id) }}">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-admin-layout>