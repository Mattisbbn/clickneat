<x-admin-layout>

<a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm my-2 mx-2" href="{{ route("categories.create") }}">Créer une catégorie</a>
<div class="p-3 bg-white shadow rounded-3 overflow-hidden mx-2 ">
    <table class="w-100 table table-hover">
        <thead>
            <tr>
                <td class="fw-semibold">Id</td>
                <td class="fw-semibold">Nom</td>
                <td class="fw-semibold">Restaurant</td>
                <td class="fw-semibold text-center">Action</td>
            </tr>
        </thead>

        <tbody>
            @foreach( $categories as $category )
                <tr class="border-bottom">
                    <td class="p-1">{{ $category->id }}</td>
                    <td class="p-1">{{ $category->name }}</td>
                    <td class="p-1"><a href="{{ route("restaurants.show",$category->restaurant->id) }}">{{ $category->restaurant->name}}</a></td>
                    <td class="d-flex p-1 justify-content-center align-items-center">
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("categories.show",$category->id) }}">Voir</a>
                        <form method="post" action="{{ route("categories.destroy",[$category->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button class="text-decoration-none text-black shadow rounded-3 p-2 bg-white border-0 me-2" type="submit">Supprimer</button>
                        </form>
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("categories.edit",$category->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



</x-admin-layout>
