@extends("dashboard.index")
@section("title","Articles")
@section("name","Articles")
@section("content")

<a class="text-center p-2 bg-white mb-2 text-black text-decoration-none rounded-3 shadow-sm" href="{{ route("items.create") }}">Créer un article</a>
<div class="p-3 bg-white shadow rounded-3 overflow-hidden ">
    <table class=" w-100  ">

        <thead>
            <tr>
                <td class="fw-semibold">Id</td>
                <td class="fw-semibold">Nom</td>
                <td class="fw-semibold">Restaurant</td>
                <td class="fw-semibold text-center">Action</td>
            </tr>
        </thead>

        <tbody>
            @foreach( $items as $item )
                <tr class="border-bottom">
                    <td class="p-1">{{ $item->id }}</td>
                    <td class="p-1">{{ $item->name }}</td>
                    <td class="p-1">{{ $item->category->restaurant->name}}</td>
                    <td class="d-flex p-1 justify-content-center align-items-center">
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("items.show",$item->id) }}">Voir</a>
                        <form method="post" action="{{ route("items.destroy",[$item->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button class="text-decoration-none text-black shadow rounded-3 p-2 bg-white border-0 me-2" type="submit">Supprimer</button>
                        </form>
                        <a class="text-decoration-none text-black shadow rounded-3 p-2 me-2" href="{{ route("items.edit",$item->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
