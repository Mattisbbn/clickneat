<x-admin-layout>

<a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm mx-2 my-2" href="{{ route("articles.create") }}">Créer un article</a>
<div class="p-3 bg-white shadow rounded-3 overflow-hidden mx-2">
    <table class="w-100 table table-hover">

        <thead>
            <tr>
                <td class="fw-semibold">Id</td>
                <td class="fw-semibold">Nom</td>
                <td class="fw-semibold">Catégorie</td>
                <td class="fw-semibold">Prix</td>
                <td class="fw-semibold">Cout</td>
                <td class="fw-semibold">Description</td>
                <td class="fw-semibold text-center">Action</td>
            </tr>
        </thead>

        <tbody>
            @foreach( $items as $item )
                <tr class="border-bottom">
                    <td class="p-1">{{ $item->id }}</td>
                    <td class="p-1">{{ $item->name }}</td>
                    <td class="p-1">{{ $item->category->name}}</td>
                    <td class="p-1">{{ $item->price }}</td>
                    <td class="p-1">{{ $item->cost }}</td>
                    <td class="p-1">{{ $item->description }}</td>
                    <td class="d-flex p-1 justify-content-center align-items-center">
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("articles.show",$item->id) }}">Voir</a>
                        <form method="post" action="{{ route("articles.destroy",[$item->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button class="text-decoration-none text-black shadow rounded-3 p-2 bg-white border-0 me-2" type="submit">Supprimer</button>
                        </form>
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("articles.edit",$item->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



</x-admin-layout>
